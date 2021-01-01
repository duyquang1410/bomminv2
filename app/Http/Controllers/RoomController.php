<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class RoomController extends Controller
{
    public function store(Request $request){
        $return = array();
        $room = new Room();
        $room->title = $request->title;
        $room->price = $request->price;
        $room->status = 0;
        $room->created_at = new DateTime();
        $room->updated_at = new DateTime();
        if($room->save()){
            $return['message'] = "success";
            return response()->json($return);
        }
        else{
            $return['message'] = "error";
            return response()->json($return);
        }
    }


    public function edit($id=null)
    {
       if(!empty($id)){
            $data = Room::findOrFail($id);
            return response()->json($data);
       }
    }


    public function update(Request $request, $id=null)
    {
        $return = array();
        $room = Room::findOrFail($id);
        if(!empty($room)){
            $room->title = $request->title;
            $room->price = $request->price;
            if($room->save()){
                $return['message'] = "success";
                return response()->json($return);
            }
            else{
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
     * Xóa phòng
     */

    public function destroy($id=null)
    {
        $return = array();
        if(!empty($id)){
            $data = Room::findOrFail($id);
            if($data->delete()){
                 $return['message'] = "success";
                return response()->json($return);
            }
            else {
                 $return['message'] = "error";
                 return response()->json($return);
            }
        }
        $return['message'] = "error";
        return response()->json($return);
    }

    /**
     * Hủy phòng
     */

    public function cancelRoom($id=null){
        $return = array();
        if(!empty($id)){
            $data = Room::findOrFail($id);
            if(!empty($data)){
                $data['status'] = 0;
                if($data->save()){
                    $payment = Payment::select('*')->where('room_id', $id)->where('status', 1)->first();
                    if(!empty($payment)){
                        if($payment->delete()){
                            $return['message'] = "success";
                            return response()->json($return);
                        }
                    }
                }
            }
            $return['message'] = "error";
            return response()->json($return);
        }
        $return['message'] = "error";
        return response()->json($return);
    }
}
