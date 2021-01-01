<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Service;
use App\TimeKeeping;
use DateTime;
use DB;

class TimeKeepingController extends Controller
{
    /**
     *  Chấm công nhân viên
     */
    public function timeKeeping(){
        if(Auth::user()->role==2){
            $service = Service::all()->toArray();
            $timeKeeping = TimeKeeping::with('User')->select('*')->where('user_id', Auth::user()->id)->where('status', 1)->get()->toArray();
            // echo "<pre>";
            // print_r($timeKeeping);
            // die;
            if(!empty($timeKeeping) && count($timeKeeping)>0){
                return view('layout.Mobile.User.checkOut', compact(['timeKeeping']));
            }
            else {
                return view('layout.Mobile.User.timeKeeping', compact(['service']));
            }
        }
        else {
            return redirect()->route('login');
        }
    }

    /**
     *  Thực hiện Chấm công nhân viên : checkin
     */
    public function checkin(Request $request){
        $return = array();
        $checkin = new TimeKeeping();
        $checkin->user_id = Auth::user()->id;
        $checkin->checkin = new DateTime();
        $checkin->address_cv = $request->address_cv;
        $checkin->service_id = $request->service_id;
        $checkin->month = date('m');
        $checkin->day = date('d');
        $checkin->status = 1;
        $checkin->created_at = new DateTime();
        $checkin->updated_at = null;

        // truy vấn vào bảng lương xem tháng này nhân viên đó đã được thanh toán chưa : nếu thanh toán rồi sẽ không được checkin tháng này nữa , còn không thì được checkin
        $salary = Salary::select('*')->where('month', $checkin->month)->where('year', date('Y'))->where('user_id', $checkin->user_id)->where('status', 1)->first();
        if(!empty($salary)){
            $return['message'] = "error";
            return response()->json($return);
        }else{
            if($checkin->save()){
                $return['message'] = "success";
            }else {
                $return['message'] = "error";
            }
            return response()->json($return);
        }
    }


    function toMoney($val,$r=0)
    {
        $n = $val;
        $c = is_float($n) ? 1 : number_format($n,$r);
        $d = '.';
        $t = ',';
        $sign = ($n < 0) ? '-' : '';
        $i = $n=number_format(abs($n),$r);
        $j = (($j = strlen($i)) > 2) ? $j % 2 : 0;
        return  $sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;
    }

    /**
     * Checkout
     * Author: quangnd
     * Date
     */
    public function checkout($id=null)
    {
        $return = array();
        if(!empty($id)){
            $checkout = TimeKeeping::with('Service')->findOrFail($id);
            $checkout['price'] = $checkout['service']['price'];

            // 1 là check in , 2 là checkout
            $checkout['status'] = 2;
            $checkout['checkout'] = new DateTime();
            $checkout['updated_at'] = new DateTime();

            $time_checkin =  date('H:i', strtotime($checkout['checkin']));
            $time_checkout =  date('H:i', strtotime($checkout['updated_at']));

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
            $checkout['hour'] = $hour;
            $checkout['min'] = $min;

            // Số tiền theo phút :
            $total_min =  ($checkout['min']*$checkout['service']['price'])/60;
            // Tính tiền theo giờ và công việc
            $total_hour = $checkout['hour']*$checkout['service']['price'];
            $totalmoney =  ($total_hour+$total_min);
            $totalmoney = round($totalmoney,-3);
            $checkout['totalmoney'] = $totalmoney;
            $checkout['adminStatus'] = 0;

            if($checkout->save()){
                $return['message'] = "success";
                return response()->json($return);
            }else {
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
     *  Danh sách công
     */
    public function listTimeKeeping($id=null){
        if(!empty($id)){
            $data = TimeKeeping::with('Service', 'User')->select('*')->where('day', $id)->orderBy('id', 'DESC')->get()->toArray();
        }else {
            $data = TimeKeeping::with('Service', 'User')->select('*')->where('day', date('d'))->orderBy('id', 'DESC')->get()->toArray();
        }
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('layout.TimeKeeping.list');
       // return view('layout.Mobile.User.listTimeKeeping', compact(['data', 'id']));
    }

    /**
     *  Danh sách công nhân viên
     */
    public function listUserTimeKeeping($month=null, $year=null){
        if(!empty($month) && !empty($year)){
             $data = TimeKeeping::select('*')->where('user_id', Auth::user()->id)->where('month', $month)->where('year', $year)->orderBy('id', 'DESC')->get()->toArray();
        }
        else {
               $month = date('m');
               $year = date('Y');
               $data = TimeKeeping::select('*')->where('user_id', Auth::user()->id)->where('month', $month)->where('year', $year)->orderBy('id', 'DESC')->get()->toArray();
        }

        // Thống kê tổng số giờ hát của tháng
        $timeHourGoSing =  DB::table('timekeepings')->where('month', $month)->where('year', $year)->where('user_id', Auth::user()->id)->sum('timeHourGoSing');
        $timeMinGoSing = DB::table('timekeepings')->where('month', $month)->where('year', $year)->where('user_id', Auth::user()->id)->sum('timeMinGoSing');

         
            $timemin = $timeMinGoSing;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing = $timeHourGoSing + $hour;
            $timeMinGoSing =  $min;

         // Thống kê tổng số giờ bay của tháng 
         $timeHourGoFly = DB::table('timekeepings')->where('month', $month)->where('year', $year)->where('user_id', Auth::user()->id)->sum('timeHourGoFly');
            $timeMinGoFly = DB::table('timekeepings')->where('month', $month)->where('year', $year)->where('user_id', Auth::user()->id)->sum('timeMinGoFly');
                $timemin = $timeMinGoFly;
                $hour = floor($timemin/60);
                $min = $timemin%60;

                $timeHourGoFly = $timeHourGoFly + $hour;
                $timeMinGoFly =  $min;

        return view('layout.User.listUserTimeKeeping', compact(['data', 'month', 'year', 'timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly']));
    }

    /**
     *  Author : quangnd
     *  Action: Chi tiết công
     * Date : 24/7/2020
     */
    public function detailTimeKeeping($id=null)
    {
        $return = array();
        if(!empty($id)){
            $data = TimeKeeping::with('Service', 'User')->findOrFail($id);
            return response()->json($data);
        }else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    /**
     *  Khai báo giờ làm việc ( đi hát , đi bay )
     */
    public function postTimeKeeping(Request $request)
    {
        $return = array();
        $errorCheckTime = TimeKeeping::select('*')->where('day', $request->day)->where('month', date('m'))->where('year', date('Y'))->where('user_id', Auth::user()->id)->get()->toArray();
        if(!empty($errorCheckTime)){
            $return['message'] = "warning";
            return response()->json($return);
        }
        if(!empty($request->timeMinGoSing) && $request->timeMinGoSing != 30 && $request->timeMinGoSing !=0){
            $return['message'] = 'info';
            return response()->json($return);
        }

        if(!empty($request->timeMinGoFly) && $request->timeMinGoFly != 30 && $request->timeMinGoFly !=0){
            $return['message'] = 'info';
            return response()->json($return);
        }

        $timeKeeping = new TimeKeeping();

        $timeKeeping->user_id = Auth::user()->id;
        $timeKeeping->timeHourGoSing = $request->timeHourGoSing;
        $timeKeeping->timeMinGoSing = $request->timeMinGoSing;
        $timeKeeping->timeHourGoFly = $request->timeHourGoFly;
        $timeKeeping->timeMinGoFly = $request->timeMinGoFly;
        $timeKeeping->priceGoSing = $request->priceGoSing;
        $timeKeeping->priceGoFly = $request->priceGoFly;

        $timeKeeping->priceAdminGoSing = $request->priceAdminGoSing;
        $timeKeeping->priceAdminGoFly =$request->priceAdminGoFly;
        $timeKeeping->statusGoSing = 0;
        $timeKeeping->statusGoFly = 0;

        if(!empty($request->day)){
            $timeKeeping->day = $request->day;
        }else {
            $timeKeeping->day = date('d');
        }
        if(!empty($request->month)){
            $timeKeeping->month = $request->month;
        }else {
            $timeKeeping->month = date('m');
        }
        if(!empty($request->year)){
            $timeKeeping->year = $request->year;
        }else {
            $timeKeeping->year = date('Y');
        }

        // Đi hát

        // Tổng tiền đi hát của nhân viên theo giờ  :
        $totalMoneyHour =  $timeKeeping->timeHourGoSing*$timeKeeping->priceGoSing;
        // Tổng tiền đi hát của nhân viên theo phút  :
        $totalMoneyMin =  ($timeKeeping->timeMinGoSing*$timeKeeping->priceGoSing)/60;
        // Tổng tiền đi hát nhân viên có thể nhận :
        $timeKeeping->totalMoneyGoSing = $totalMoneyHour + $totalMoneyMin;
        $timeKeeping->totalMoneyGoSing = round($timeKeeping->totalMoneyGoSing,-3);

        // Đi bay

         // Tổng tiền đi bay của nhân viên theo giờ  :
        $totalMoneyHourGoFly =  $timeKeeping->timeHourGoFly*$timeKeeping->priceGoFly;
        // Tổng tiền đi bay của nhân viên theo phút  :
        $totalMoneyMinGoFly =  ($timeKeeping->timeMinGoFly*$timeKeeping->priceGoFly)/60;
        // Tổng tiền đi bay nhân viên có thể nhận :
        $timeKeeping->totalMoneyGoFly = $totalMoneyHourGoFly + $totalMoneyMinGoFly;
        $timeKeeping->totalMoneyGoFly = round($timeKeeping->totalMoneyGoFly,-3);

        // Tổng tiền :
        $timeKeeping->totalMoney = $timeKeeping->totalMoneyGoSing + $timeKeeping->totalMoneyGoFly;


        /* ========================= */

        // Đi hát ( Quản trị viên )

         // Tổng tiền hát của quản trị viên theo giờ  :
        $totalMoneyHourAdmin =  $timeKeeping->timeHourGoSing*$timeKeeping->priceAdminGoSing;
        // Tổng tiền hát của quản trị viên theo phút  :
        $totalMoneyMinAdmin =  ($timeKeeping->timeMinGoSing*$timeKeeping->priceAdminGoSing)/60;
        // Tổng tiền đi hát quản trị viên có thể nhận :
        $timeKeeping->totalMoneyGoSingAdmin = $totalMoneyHourAdmin + $totalMoneyMinAdmin;
        $timeKeeping->totalMoneyGoSingAdmin = round($timeKeeping->totalMoneyGoSingAdmin,-3);

        // Đi bay ( Quản trị viên )
         // Tổng tiền bay của quản trị viên theo giờ  :
        $totalMoneyHourAdminFly =  $timeKeeping->timeHourGoFly*$timeKeeping->priceAdminGoFly;
        // Tổng tiền bay của quản trị viên theo phút  :
        $totalMoneyMinAdminFly=  ($timeKeeping->timeMinGoFly*$timeKeeping->priceAdminGoFly)/60;
        // Tổng tiền đi bay quản trị viên có thể nhận :
        $timeKeeping->totalMoneyGoFlyAdmin = $totalMoneyHourAdminFly + $totalMoneyMinAdminFly;
        $timeKeeping->totalMoneyGoFlyAdmin = round($timeKeeping->totalMoneyGoFlyAdmin,-3);

        // Tổng tiền quản trị viên có thể nhận:
        $timeKeeping->totalMoneyAdmin =  $timeKeeping->totalMoneyGoSingAdmin + $timeKeeping->totalMoneyGoFlyAdmin;
        $timeKeeping->totalMoneyAdmin = round($timeKeeping->totalMoneyAdmin,-3);

        $timeKeeping->created_at = new DateTime();
        if($timeKeeping->save()){
            $return['message'] = "success";
            return response()->json($return);
        }
        else {
            $return['message'] = "error";
             return response()->json($return);
        }
    }


    // Lấy thời gian để nhân viên cập nhật
    public function editTimeKeeping($id=null)
    {
       if(!empty($id)){
            $data = TimeKeeping::findOrFail($id);
            return response()->json($data);
       }
    }

    // Cập nhật khai báo giờ làm việc nhân viên 
    public function updateTimeKeeping($id=null, Request $request)
    {
        $return = array();
        if(!empty($id)){
            $timeKeeping = TimeKeeping::findOrFail($id);

            $timeKeeping->timeHourGoSing = $request->timeHourGoSing;
            $timeKeeping->timeMinGoSing = $request->timeMinGoSing;
            $timeKeeping->timeHourGoFly = $request->timeHourGoFly;
            $timeKeeping->timeMinGoFly = $request->timeMinGoFly;

        if(!empty($request->timeMinGoSing) && $request->timeMinGoSing != 30 && $request->timeMinGoSing !=0){
            $return['message'] = 'info';
            return response()->json($return);
        }

          if(!empty($request->timeMinGoFly) && $request->timeMinGoFly != 30 && $request->timeMinGoFly !=0){
            $return['message'] = 'info';
            return response()->json($return);
        }

            if(!empty($request->day)){
                $timeKeeping->day = $request->day;
            }else {
                $timeKeeping->day = date('d');
            }
            if(!empty($request->month)){
                $timeKeeping->month = $request->month;
            }else {
                $timeKeeping->month = date('m');
            }
            if(!empty($request->year)){
                $timeKeeping->year = $request->year;
            }else {
                $timeKeeping->year = date('Y');
            }

        // Đi hát

        // Tổng tiền đi hát của nhân viên theo giờ  :
        $totalMoneyHour =  $timeKeeping->timeHourGoSing*$timeKeeping->priceGoSing;
        // Tổng tiền đi hát của nhân viên theo phút  :
        $totalMoneyMin =  ($timeKeeping->timeMinGoSing*$timeKeeping->priceGoSing)/60;
        // Tổng tiền đi hát nhân viên có thể nhận :
        $timeKeeping->totalMoneyGoSing = $totalMoneyHour + $totalMoneyMin;
        $timeKeeping->totalMoneyGoSing = round($timeKeeping->totalMoneyGoSing,-3);

        // Đi bay

         // Tổng tiền đi bay của nhân viên theo giờ  :
        $totalMoneyHourGoFly =  $timeKeeping->timeHourGoFly*$timeKeeping->priceGoFly;
        // Tổng tiền đi bay của nhân viên theo phút  :
        $totalMoneyMinGoFly =  ($timeKeeping->timeMinGoFly*$timeKeeping->priceGoFly)/60;
        // Tổng tiền đi bay nhân viên có thể nhận :
        $timeKeeping->totalMoneyGoFly = $totalMoneyHourGoFly + $totalMoneyMinGoFly;
        $timeKeeping->totalMoneyGoFly = round($timeKeeping->totalMoneyGoFly,-3);

        // Tổng tiền :
        $timeKeeping->totalMoney = $timeKeeping->totalMoneyGoSing + $timeKeeping->totalMoneyGoFly;

        /* ========================= */

        // Đi hát ( Quản trị viên )

         // Tổng tiền hát của quản trị viên theo giờ  :
        $totalMoneyHourAdmin =  $timeKeeping->timeHourGoSing*$timeKeeping->priceAdminGoSing;
        // Tổng tiền hát của quản trị viên theo phút  :
        $totalMoneyMinAdmin =  ($timeKeeping->timeMinGoSing*$timeKeeping->priceAdminGoSing)/60;
        // Tổng tiền đi hát quản trị viên có thể nhận :
        $timeKeeping->totalMoneyGoSingAdmin = $totalMoneyHourAdmin + $totalMoneyMinAdmin;
        $timeKeeping->totalMoneyGoSingAdmin = round($timeKeeping->totalMoneyGoSingAdmin,-3);

        // Đi bay ( Quản trị viên )
         // Tổng tiền bay của quản trị viên theo giờ  :
        $totalMoneyHourAdminFly =  $timeKeeping->timeHourGoFly*$timeKeeping->priceAdminGoFly;
        // Tổng tiền bay của quản trị viên theo phút  :
        $totalMoneyMinAdminFly=  ($timeKeeping->timeMinGoFly*$timeKeeping->priceAdminGoFly)/60;
        // Tổng tiền đi bay quản trị viên có thể nhận :
        $timeKeeping->totalMoneyGoFlyAdmin = $totalMoneyHourAdminFly + $totalMoneyMinAdminFly;
        $timeKeeping->totalMoneyGoFlyAdmin = round($timeKeeping->totalMoneyGoFlyAdmin,-3);

        // Tổng tiền quản trị viên có thể nhận:
        $timeKeeping->totalMoneyAdmin =  $timeKeeping->totalMoneyGoSingAdmin + $timeKeeping->totalMoneyGoFlyAdmin;
        $timeKeeping->totalMoneyAdmin = round($timeKeeping->totalMoneyAdmin,-3);

        if($timeKeeping->save()){
             $return['message'] = "success";
            return response()->json($return);
        }

        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }
}
