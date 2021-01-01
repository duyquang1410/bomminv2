<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\Product;
use App\Room;
use Illuminate\Http\Request;
use App\Payment;
use DateTime;
use Auth;
use Cart;
use Session;

class PaymentController extends Controller
{
    /**
     *  quangnd
     * Bắt đầu tính tiền phòng
     */
    public function startDate($id=null){

        $return = array();
        // Truy vấn vào bảng phòng , cập nhật trạng thái phòng đó , đã có khách
        $room = Room::findOrFail($id);
        $room->status = 1;
        if($room->save()){
            $data = new Payment();
            if(!empty($id)){
                $data->room_id = $id;
                $data['price'] = $room['price'];
                $data->startDate = new DateTime();
                $data->status = 1;
                $data->user_id = Auth::user()->id;
                if($data->save()){
                    $return['message'] = "success";
                    return response()->json($return);
                }
                else {
                    $return['message'] = "error";
                    return response()->json($return);
                }
            }
            else {
                $return['message'] = "error";
                return response()->json($return);
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    /**
     * Quản lý thanh toán phòng
     * date : 30/7/2020
     */
    public function buyPaymentRoom($id=null){
        $data = array();
        if(!empty($id)){
            $data = Payment::with('Room')->findOrFail($id);
        }

        // Lấy dữ liệu sản phẩm :
        $product = Product::select('*')->where('status', 1)->get()->toArray();
        return view('layout.singingRoom.paymentRoom', compact(['data', 'product']));
    }

    // Thanh toán tiền phòng hát

    function paymentRoom($id=null){

        $return = array();
        if(!empty($id)){
            $data = Payment::select('*')->where('room_id', $id)->where('status', 1)->first();
            $data['endDate'] = new DateTime();
             $data['updated_at'] = new DateTime();
            $data->day = date('d');
            $data->month = date('m');
            $data->year = date('Y');

            // Số giờ
            $time_checkin =  date('Y-m-d H:i', strtotime($data['startDate']));
            $time_checkout =  date('Y-m-d H:i', strtotime($data['updated_at']));

            $checkin_begin  = strtotime($time_checkin);
            $checkin_end = strtotime($time_checkout);

            $difference = $checkin_end - $checkin_begin;
            if($difference / 3600 > 0){
                $hour = $difference / 3600;
                $hour = (int)$hour;

                $difference = $difference - ($hour * 3600);
            }else{
                $hour = "00";
            }
            if($difference / 60 > 0){
                $min = $difference / 60;

                $difference = $difference - ($min * 60);

            }else{
                $min = "00";
            }
            $data['totalTimeHour'] = $hour;
            $data['totalTimeMin'] = $min;

           
            // Số tiền theo phút :
            $total_min =  ($data['totalTimeMin']*$data['price'])/60;
            // Tính tiền theo giờ
            $total_hour = $data['totalTimeHour']*$data['price'];
            $totalmoney =  ($total_hour+$total_min);
            $totalmoney = round($totalmoney,-3);
            $data['totalMoneySing'] = $totalmoney;

            if($data->save()){
                $return['message'] = "success";
                $return['id'] = $data->id;
                return response()->json($return);
            }
            else {
                $return['message'] = "error";
                return response()->json($return);
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }


    public function exportFile($id=null){

        $data = array();
        if(!empty($id)){
            $data = Payment::findOrFail($id);
        }
        return view('layout.singingRoom.exportFile', compact(['data']));

    }

    // Thanh toán phòng hát
    public function paymentBuyNow($id=null)
    {
        $return = array();
        $data = Payment::findOrFail($id);
        $data->totalMoneyFood = Cart::subtotal(2,'.','');
        $data->totalMoney = Cart::subtotal(2,'.','') + $data['totalMoneySing'];
        $data->status = 2; // Đã thanh toán
        $data->day = date('d');
        $data->month = date('m');
        $data->year = date('Y');
        if($data->save()){
            // BillDetail :
            foreach(Cart::content() as $cart){
                $bill_deatils = new BillDetail();
                $bill_deatils->payment_id = $data['id'];
                $bill_deatils->product_id = $cart->id;
                $bill_deatils->title = $cart->name;
                $bill_deatils->qty = $cart->qty;
                $bill_deatils->price = $cart->price;
                $bill_deatils->created_at = new DateTime();
                if($bill_deatils->save()){
                    $product = Product::findOrFail($cart->id);
                    // SP đã bán
                    $product->totalSold =  $product->totalSold + $cart->qty;
                    // Tổng SP còn lại
                    $product->totalRest = $product['total'] - $product->totalSold;
                    $product->save();
                }
            }
            $room = Room::findOrFail($data->room_id);
            $room->status = 0;
            if($room->save()){
                Cart::destroy();
                $return['message'] = "success";
                return response()->json($return);
            }
            else {
                $return['message'] = "error";
                return response()->json($return);
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    // Chi tiết thanh toán
    public function detailPayment($id=null){
        $data = Payment::with('Room', 'BillDetail')->findOrFail($id);
        return response()->json($data);
    }
}
