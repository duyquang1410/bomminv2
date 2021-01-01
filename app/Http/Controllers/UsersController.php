<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Student;
use App\Teacher;
use App\User;
use File, Count;
use Illuminate\Http\Request;
use DateTime, DB;
use hasFile;
use App\RegisterCourse;
use Auth;
use App\Exercise;
use App\Homework;
use App\Service;
use App\TimeKeeping;
use App\Salary;
use App\suggestMoney;
use App\Product;
use App\Room;
use App\Payment;
class UsersController extends Controller
{
    public function index()
    {
        //$user = User::with('Student')->where('role',1)->orderBy('id', 'DESC')->get()->toArray();
        $data = User::all()->toArray();
        return view('layout.User.list', compact(['data']));
    }
    /*
     * Author: quangnd
     * Action: Add data user
     * Date: 9/2/2020
     */
    public function store(Request $request)
    {
        $user = new User();
        $return = array();
        if($request->fullname){
            $user->fullname = $request->fullname;
        }else{
            $user->fullname = "";
        }
        $user->username = $request->username;
        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
            $user->passtext = $request->password;
        }else {
            $user->password = bcrypt($request->phone);
            $user->passtext = $request->phone;
        }
        //$user->confirmPassword = bcrypt($request->confirmPassword);

        $user->email = $request->email;
        $user->role = $request->role;
        $user->address      = $request->address;
        $user->status       = $request->status;
        $user->gender       = $request->gender;
        $user->phone       = $request->phone;
        $user->birthday     = $request->birthday;
        $user->information  = $request->information;
        $user->facebook     = $request->facebook;
        $user->zalo     = $request->zalo;
        if($request->hasFile('avatar'))
        {
                $file = $request->file('avatar');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/uploads/user';
                if($file->move($path, $filename))
                {
                    $user->avatar = $filename;
                }
        }
        if($user->save())
        {
            $return['message'] = "success";
           return response()->json($return);
        }else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    /**
     * Author: quangnd
     * Action: edit user
     * Date: 21/7/2020
     */
    public function edit($id=null)
    {
        $return = array();
        $data = User::findOrFail($id);
        if(!empty($data)){
            return response()->json($data);
        }else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    public function update(Request $request, $id=null)
    {
       $user = User::findOrFail($id);
        $return = array();
        if($request->fullname){
            $user->fullname = $request->fullname;
        }else{
            $user->fullname = "";
        }
        if($request->username){
            $user->username = $request->username;
        }
        // if(!empty($request->password)){
        //     $user->password = bcrypt($request->password);
        //     $user->passtext = $request->password;
        // }else {
        //     $user->password = bcrypt($request->phone);
        //     $user->passtext = $request->phone;
        // }
        if($request->email){
            $user->email = $request->email;
        }
        if($request->role){
            $user->role = $request->role;
        }
        if($request->address){
            $user->address      = $request->address;
        }
        $user->status       = $request->status;
        $user->gender       = $request->gender;
        if($request->phone){
            $user->phone       = $request->phone;
        }
        if($request->birthday){
            $user->birthday     = $request->birthday;
        }
        if($request->information){
            $user->information  = $request->information;
        }
        if($request->facebook){
            $user->facebook     = $request->facebook;
        }
        if($request->zalo){
            $user->zalo     = $request->zalo;
        }
        if($request->hasFile('avatar'))
        {
                $file = $request->file('avatar');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/uploads/user';
                if($file->move($path, $filename))
                {
                    $user->avatar = $filename;
                }
        }
        if($user->save())
        {
            $return['message'] = "success";
           return response()->json($return);
        }else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    /**
     * Author: quangnd
     * Action : destroy
     */
    public function destroy($id=null)
    {
        $return = array();
       $data = User::findOrFail($id);
       if(!empty($data)){
            if($data->delete()){
                $return['message'] = "success";
            }else {
                $return['message'] = "error";
            }
       }
       else {
        $return['message'] = "error";
       }
        return response()->json($return);
    }


        /**
     * Action : quangnd
     * Đổi mật khẩu nhân viên
     */
     public function changePassword(Request $request, $id=null)
    {
        $return = array();
        $data = User::findOrFail($id);
        if(empty($request->password)){
            $return['message'] = "error";
            $return['msg_password'] = "Mật khẩu không được để trống";
        }
        else {
            $return['msg_password'] = 0;
        }

        if(empty($request->confirmPassword)){
            $return['message'] = "error";
            $return['msg_confirmPassword'] = "Nhập lại Mật khẩu không được để trống";
        }
        else {
            $return['msg_confirmPassword'] = 0;
        }

        if(empty($request->password) || empty($request->confirmPassword)){
            $return['message'] = "error";
            return response()->json($return);
        }
        if($request->confirmPassword != $request->password){
             $return['message'] = "error";
             $return['msg_confirmPassword'] = "Nhập lại mật khẩu không khớp";
            return response()->json($return);
        }
        if(!empty($data)){
            $data->password = bcrypt($request->password);
            if(empty($request->confirmPassword)){
                $data->confirmPassword = bcrypt($request->password);
            }
            else {
                $data->confirmPassword = bcrypt($request->confirmPassword);
            }
            $data->passtext = $request->password;
        }
        if($data->save()){
            $return['message'] = "success";
            return response()->json($return);
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
        return response()->json($return);
    }

        /*
         * Author: quangnd
         * Action: edit data user
         * Date: 9/2/2020
         */
    public function editStudent($id=null)
    {
        $data = User::findOrFail($id)->toArray();

        if(!empty($data)){
            if(!empty($data['role']) && $data['role']==1){
                $student = Student::where(['user_id'=>$data['id']])->first();
            }
        }
        return response()->json([$data, $student]);
        //return view('backend.User.edit', compact(['data']));
    }
    /*
     * Author: quangnd
     * Action: delete data user
     * Date: 9/2/2020
     */
    function destroyStudent($id=null)
    {
        $return = array();
        if(!empty($id)){
            $data  = User::findOrFail($id);
            if(!empty($data)){
                if(!empty($data['role']) && $data['role']==1){
                    $student = Student::where(['user_id'=>$data['id']])->first();
                    if(file_exists(public_path('/uploads/users/'.$student->avatar)))
                    {
                        File::delete(public_path('/uploads/users/'.$student->avatar));
                    }
                    if(!empty($student)){
                        if($student->delete()){
                            if($data->delete()) {
                               $return['message'] = "success";
                            }
                        }
                        else {
                            $return['message'] = "error";
                        }
                    }
                    else {
                        if($data->delete()) {
                            $return['message'] = "success";
                        }else {
                             $return['message'] = "error";
                        }
                    }
                }
                else {
                    $return['message'] = "warning";
                }
            }
        }
       return $return;
    }

    // Detail data user :
    public function detail($id=null)
    {
        $detail = User::findOrFail($id);

        return response()->json($detail);
    }
    /*
     * Author: quangnd
     * Action: Action multi data user
     * Date: 9/2/2020
     */
    public function action(Request $request){
        $data = $request->all();
        if(!empty($data['selectitem']) && $data['selectitem']==0){
            toastr()->error('Bạn cần chọn thao tác', 'Thông báo');
            return back();
        }
        if(!empty($request->checkitem)){
            $countCheckItem = count($request->checkitem);
            if(empty($countCheckItem)){
                toastr()->error('Bạn chưa chọn bản ghi nào', 'Thông báo');
                return back();
            }
        }
        if(!empty($data['selectitem']) && !empty($request->checkitem))
        {
            switch($data['selectitem']){
                case "1":{
                    break;
                }
                case "4":{
                    $countTotal = 0;
                    $checkitem = $request->checkitem;
                    foreach($checkitem as $item){
                        $dataCheckitem = User::findOrFail($item);
                        if(!empty($dataCheckitem)) {
                            if($dataCheckitem->delete()){
                                $countTotal++;
                            }
                        }
                    }
                    if($countTotal==0) {
                        toastr()->error('Không có Tài khoản nào được xóa', 'Thông báo');
                        return back();
                    }else {
                        toastr()->success('Xóa thành công '.$countTotal.' tài khoản', 'Thông báo');
                        return back();
                    }
                    break;
                }
                default:{
                    toastr()->error('Thao tác không thành công', 'Thông báo');
                    return back();
                }
            }
        }else {
            toastr()->error('Thao tác không thành công', 'Thông báo');
            return back();
        }
    }


    /**
     *  Author: quangnd
     *  Action : Kiểm tra user đã tồn tại chưa
     */
    public function checkUser($user=null)
    {
        $data = User::select('*')->where('username', $user)->get()->toArray();
        return $data;
    }
    /**
     *  Danh sách lương NV của nhân viên
     */
    public function listSalary(){
        $data = Salary::select('*')->where('user_id', Auth::user()->id)->get()->toArray();
        // echo "<pre>";
        // print_r($salary);
        // die;
        return view('layout.User.listSalary', compact(['data']));
    }

    /**
     *  Thông tin nhân viên
     */
    public function infoAccount(){
        return view('layout.Mobile.User.infoAccount');
    }

    /**
     *  Chi tiết lương NV
     */
    public function detailSalary($id){
        $salary = Salary::findOrFail($id);
        if(!empty($salary)){
            $data = TimeKeeping::select('*')->where('month', $salary['month'])
            ->where('year', $salary['year'])
            ->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get()->toArray();
        }
        else {
            $data = array();
            $salary = array();
        }
        return view('layout.Mobile.User.detailSalary', compact(['data', 'salary']));
    }

    /**
     *  Tạm ứng  ( góc nhìn nhân viên )
     */
    public function suggestMoney(Request $request)
    {
        $return = array();
        $suggestMoney = new suggestMoney();
        $suggestMoney->user_id = Auth::user()->id;
        if(!empty($request->month)){
            $suggestMoney->month = $request->month;
        }else {
            $suggestMoney->month = date('m');
        }
        if(!empty($request->year)){
            $suggestMoney->year = $request->year;
        }else {
            $suggestMoney->year = date('Y');
        }
        $suggestMoney->numberMoney = $request->numberMoney;
        $suggestMoney->note = $request->note;
        $suggestMoney->status = 0;
        $suggestMoney->created_at = new DateTime();

        // truy vấn vào bảng lương xem tháng đó nhân viên đó đã được thanh toán chưa : nếu thanh toán rồi sẽ không được ứng lương tháng này nữa , còn không thì được ứng
        $salary = Salary::select('*')->where('month', $suggestMoney->month)->where('year', $suggestMoney->year)->where('user_id', $suggestMoney->user_id)->where('status', 1)->first();
        if(!empty($salary)){
            $return['message'] = "warning";
            return response()->json($return);
        }
        else {
            if($suggestMoney->save()){
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
     *  pleaseRespond ( Xin ứng lương lại )
     *  user : quangnd
     */
    public function pleaseRespond($id=null){
        $suggestMoney = suggestMoney::findOrFail($id);
        $return = array();
        if(!empty($suggestMoney)){
            // truy vấn vào bảng lương xem tháng đó nhân viên đó đã được thanh toán chưa : nếu thanh toán rồi sẽ không được ứng lương tháng này nữa , còn không thì được ứng
            $salary = Salary::select('*')->where('month', $suggestMoney->month)->where('year', $suggestMoney->year)->where('user_id', $suggestMoney->user_id)->where('status', 1)->first();
            if(!empty($salary)){
                $return['message'] = "warning";
                return response()->json($return);
            }
            $suggestMoney->user_id = Auth::user()->id;
            $suggestMoney->status =  0;
            if($suggestMoney->save()){
                $return['message'] = "success";
                return response()->json($return);
            }
            else {
                $return['message'] = "error";
            }
        }
    }

    // Nhân viên xóa ứng lương ( Chưa được ứng )
    public function userDelSuggestMoney($id=null){
        $return = array();
        $data = suggestMoney::findOrFail($id);
        if($data['status']==2 || $data['status']==0){
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
     * Menu
     */
    public function memberMenu()
    {
        return view('layout.Mobile.User.menu');
    }

    /**
     * list danh sách Ứng lương
     */
    public function listSuggestMoney()
    {
        $data = suggestMoney::select('*')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get()->toArray();
        return view('layout.User.listSuggestMoney', compact('data'));
    }

    /**
     * Hủy ứng lương
     */
    public function cancelSuggestMoney($id=null)
    {
        $return = array();
        $data = suggestMoney::findOrFail($id);
        if(!empty($data)){
                $data->status = 2;
                if($data->save()){
                    $return['message'] = "success";
                    return response()->json($return);
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    /**
     * list danh sách Ứng lương (admin)
     */
    public function adminListSuggestMoney()
    {
        $data = suggestMoney::with('User')->orderBy('id', 'DESC')->get()->toArray();
        return view('layout.User.adminListSuggestMoney', compact('data'));
    }

    /**
     * quangnd
     * Action : ứng lương cho NV salaryPayment (admin)
     * Date: 26/7/2020
     */
    public function salaryPayment($id=null){
        $return = array();
        if(!empty($id)){
            $data = suggestMoney::findOrFail($id);
            $salary = Salary::select('*')->where('month', $data['month'])->where('year', $data['year'])->where('user_id', $data['user_id'])->first();

            if(empty($salary)){
                // Chưa có bảng lương , tạo bảng lương:
                $salary = new Salary();
                $salary['user_id'] = $data['user_id'];
                $salary['month'] = $data['month'];
                $salary['year'] = $data['year'];
                $salary['suggest_Money'] = $data['numberMoney'];
                $salary['total_Money'] = 0;
                $salary['realField_Money'] = 0 - $salary['suggest_Money'];
                if($salary->save()){
                    $data['status'] = 1;
                    if($data->save()){
                         $return['message'] = "success";
                         return $return;
                    }
                }
            }else{
                if($salary['status']==1){
                     $return['message'] = "warning";
                    return response()->json($return);
                }
                else {
                    $salary['suggest_Money'] = $salary['suggest_Money']+$data['numberMoney'];
                    $salary['realField_Money'] = $salary['total_Money'] - $salary['suggest_Money'];
                    //return $salary;
                    if($salary->save()){
                        $data['status'] = 1;
                        $data['updated_at'] = new DateTime();
                        if($data->save()){
                            $return['message'] = "success";
                            return $return;
                        }
                    }
                }
            }
        }
        else {
            $return['message'] = "error";
            return $return;
        }
    }
    /**
     *  Xóa ứng lương ( bản ghi đã hủy ứng )
     *  deleteSuggestUser
     */
    public function deleteSuggestUser($id=null)
    {
        $return = array();
        $data = suggestMoney::findOrFail($id);
        if($data['status']==2||$data['status']==0){
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
     * quangnd
     * Danh sách các dịch vụ
     * Date: 26/7 /2020
     */
    public function listSevice(){
        $data = Service::all()->toArray();
        return view('layout.Mobile.Admin.service', compact(['data']));
    }

    public function postMobileSevice(Request $request){
        $return = array();
        $service = new Service();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->note = $request->note;
        if($service->save()){
            $return['message'] = "success";
            return response()->json($return);
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }


    public function deleteMobileSevice($id=null){
        $return = array();
        if(!empty($id)){
            $data = Service::findOrFail($id);
            if($data->delete()){
                $return['message'] = "success";
                return response()->json($return);
            }else {
                $return['message'] = "error";
                return response()->json($return);
            }
        }
        $return['message'] = "error";
        return response()->json($return);
    }

    /**
     *  quangnd
     *  Danh sách nhân viên
     * Date : 27/7/2020
     */
    public function adminListUser(){
        $data = User::select('*')->orderBy('id', 'DESC')->get()->toArray();
        return view('layout.Mobile.Admin.listUser', compact(['data']));
    }

    /**
     *  quangnd
     *  Danh sách lương nhân viên
     *  Date : 27/7/2020
     */
    public function adminListSalary($month=null, $year=null)
    {
        if(!empty($month) && !empty($year)){
             $data = Salary::with('User')->select('*')->where('month', $month)->where('year', $year)->get()->toArray();
        }else {
             $data = Salary::with('User')->select('*')->where('month', date('m'))->where('year', date('Y'))->get()->toArray();
            $id = date('m');
        }
        return view('layout.User.adminListSalary', compact(['data', 'month', 'year']));
    }

    /**
     * Thanh toán lương cho nhân viên thro tháng
     */
    public function sendPaymentSalary($id=null)
    {
        $return = array();
        $data = Salary::findOrFail($id);
        if(!empty($data)){
            $data['status'] = 1;
            $data['realField_Money'] = $data['total_Money'] - $data['suggest_Money'];
            if($data->save()){
                $return['message'] = "success";
                return response()->json($return);
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    // Hủy thanh toán lương cho nhân viên :
    public function cancelSendPaymentSalary($id=null)
    {
        $return = array();
        $data = Salary::findOrFail($id);
        if(!empty($data)){
            $data['status'] = 0;
            $data['realField_Money'] = $data['total_Money'] - $data['suggest_Money'];
            if($data->save()){
                $return['message'] = "success";
                return response()->json($return);
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    // Xóa thanh toán lương của 1 nhân viên
   public function adminDeletePayment($id=null){
       $return = array();
       $data = Salary::findOrFail($id);
       if(!empty($data)){
           if($data->delete()){
               $return['message'] = "success";
               return response()->json($return);
           }
       }
       else {
           $return['message'] = "error";
           return response()->json($return);
       }
    }


    /** Sửa thanh toán lương của 1 nhân viên
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function adminEditPayment($id=null){
        if(!empty($id)){
            $data = Salary::findOrFail($id);
            return $data;
        }
    }

    /**  Update thanh toán lương của 1 nhân viên
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function adminUpdatePayment($id=null, Request $request){
        $return = array();
        if(!empty($id)){
            $salary = Salary::findOrFail($id);
            $salary->month = $request->month;
            $salary->year = $request->year;
            $salary->total_Money = $request->total_Money;
            $salary->suggest_Money = $request->suggest_Money;
            $salary->realField_Money = $request->realField_Money;

            if($salary->save()){
                $return['message'] = "success";
                return response()->json($return);
            }else {
                $return['message'] = "error";
                return response()->json($return);
            }
        }
        $return['message'] = "error";
        return response()->json($return);
    }

    // Danh sách chấm công ( Theo tháng hiện tại )
    public function adminListTimekeepingMonth(){
        $data = TimeKeeping::with('User')->select('*')->where('month', date('m'))->orderBy('id', 'DESC')->get()->toArray();
        if(empty($data)){
            $data = array();
        }
        // Thống kê số giờ hát tháng :
        $timeHourGoSing = DB::table('timekeepings')->where('month', date('m'))->sum('timeHourGoSing');
        $timeMinGoSing = DB::table('timekeepings')->where('month', date('m'))->sum('timeMinGoSing');
        $timemin = $timeMinGoSing;
        $hour = floor($timemin/60);
        $min = $timemin%60;

        $timeHourGoSing = $timeHourGoSing + $hour;
        $timeMinGoSing =  $min;

        // Thống kê số giờ bay tháng
        $timeHourGoFly = DB::table('timekeepings')->where('month', date('m'))->sum('timeHourGoFly');
        $timeMinGoFly = DB::table('timekeepings')->where('month', date('m'))->sum('timeMinGoFly');
        $timemin = $timeMinGoFly;
        $hour = floor($timemin/60);
        $min = $timemin%60;

        $timeHourGoFly = $timeHourGoFly + $hour;
        $timeMinGoFly =  $min;

        // Thống kê tổng tiền hát trả cho NV
        $totalMoneyGoSing = DB::table('timekeepings')->where('month', date('m'))->sum('totalMoneyGoSing');

        // Thống kê tổng tiền bay trả cho NV
        $totalMoneyGoFly = DB::table('timekeepings')->where('month', date('m'))->sum('totalMoneyGoFly');

        // Thống kê tổng tiền hát còn lại:
        $totalMoneyGoSingAdmin = DB::table('timekeepings')->where('month', date('m'))->sum('totalMoneyGoSingAdmin');
        $totalMoneyGoSingAdmin = $totalMoneyGoSingAdmin - $totalMoneyGoSing;

        // Thống kê tổng tiền bay còn lại:
        $totalMoneyGoFlyAdmin = DB::table('timekeepings')->where('month', date('m'))->sum('totalMoneyGoFlyAdmin');
        $totalMoneyGoFlyAdmin = $totalMoneyGoFlyAdmin - $totalMoneyGoFly;

        // Thống kê tổng tiền thu về :
        $totalAdmin = $totalMoneyGoSingAdmin + $totalMoneyGoFlyAdmin;

        // Thống kê tổng tiền trả NV :
        $totalUser = $totalMoneyGoSing +  $totalMoneyGoFly;
        return view('layout.User.listTimeKeeping', compact(['data', 'timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'totalMoneyGoSing', 'totalMoneyGoFly', 'totalMoneyGoSingAdmin', 'totalMoneyGoFlyAdmin', 'totalAdmin', 'totalUser']));

    }

    // Danh sách chấm công (Theo ngày của tháng hiện tại )
     public function adminListTimekeeping($id=null)
    {

         if(!empty($id)){
            $data = TimeKeeping::with('User')->select('*')->where('day', $id)->where('month', date('m'))->orderBy('id', 'DESC')->get()->toArray();
         }else {
             $data = TimeKeeping::with('User')->select('*')->where('day', date('d'))->where('month', date('m'))->orderBy('id', 'DESC')->get()->toArray();
         }

         // Thống kê số giờ hát ngày :
         $timeHourGoSing = DB::table('timekeepings')->where('day', $id)->where('month', date('m'))->sum('timeHourGoSing');
         $timeMinGoSing = DB::table('timekeepings')->where('day', $id)->where('month', date('m'))->sum('timeMinGoSing');
            $timemin = $timeMinGoSing;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing = $timeHourGoSing + $hour;
            $timeMinGoSing =  $min;

         // Thống kê số giờ bay
            $timeHourGoFly = DB::table('timekeepings')->where('day', $id)->where('month', date('m'))->sum('timeHourGoFly');
            $timeMinGoFly = DB::table('timekeepings')->where('day', $id)->where('month', date('m'))->sum('timeMinGoFly');
                $timemin = $timeMinGoFly;
                $hour = floor($timemin/60);
                $min = $timemin%60;

                $timeHourGoFly = $timeHourGoFly + $hour;
                $timeMinGoFly =  $min;

         // Thống kê tổng tiền hát trả cho NV
            $totalMoneyGoSing = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('totalMoneyGoSing');

         // Thống kê tổng tiền bay trả cho NV
            $totalMoneyGoFly = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('totalMoneyGoFly');

         // Thống kê tổng tiền hát còn lại:
        $totalMoneyGoSingAdmin = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('totalMoneyGoSingAdmin');
        $totalMoneyGoSingAdmin = $totalMoneyGoSingAdmin - $totalMoneyGoSing;

         // Thống kê tổng tiền bay còn lại:
         $totalMoneyGoFlyAdmin = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('totalMoneyGoFlyAdmin');
         $totalMoneyGoFlyAdmin = $totalMoneyGoFlyAdmin - $totalMoneyGoFly;

         // Thống kê tổng tiền thu về :
         $totalAdmin = $totalMoneyGoSingAdmin + $totalMoneyGoFlyAdmin;

         // Thống kê tổng tiền trả NV :
         $totalUser = $totalMoneyGoSing +  $totalMoneyGoFly;
        return view('layout.User.listTimeKeeping', compact(['data', 'id', 'timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'totalMoneyGoSing', 'totalMoneyGoFly', 'totalMoneyGoSingAdmin', 'totalMoneyGoFlyAdmin', 'totalAdmin', 'totalUser']));
    }

    /**
     *  Lấy toàn bộ dữ liệu chấm công ( admin )
     */
    public function adminAllTimekeeping(){
        $data = TimeKeeping::with('User')->orderBy('id', 'DESC')->get()->toArray();
        if(empty($data)){
            $data = array();
        }
//        echo "<pre>";
//        print_r($data);
//        die;
        return view('layout.User.listAllTimeKeeping', compact(['data']));
    }

    // Xóa dữ liệu chấm công , check in, checkout:
    public function adminDeleteTimeKeeping($id=null){
        $return = array();
        if(!empty($id)){
            $data = TimeKeeping::findOrFail($id);
            if($data->delete()){
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

    // Duyệt chấm công
    public function confirmTimekeeping($id=null)
    {
        $return = array();
        if(!empty($id)){
            $data =TimeKeeping::findOrFail($id);
            if($data['adminStatus']==1){
                $return['message'] = "error";
                return response()->json($return);
            }
            $data['adminStatus'] = 1;
            if($data->save()){
                // Kiểm tra trong bảng lương đã tồn tại tháng lương của NV trong năm đó chưa :
                $month = $data['month'];
                $year = $data['year'];

                $salary = Salary::select('*')->where('month', $month)->where('year', $year)->where('user_id', $data['user_id'])->get()->toArray();
                if(!empty($salary)){
                    $salary = Salary::findOrFail($salary[0]['id']);
                    $salary->total_Money = $salary['total_Money'] + $data['totalMoney'];
                    $salary->realField_Money = $salary->total_Money - $salary['suggest_Money'];
                    if($salary->save()){
                        $return['message'] = "success";
                        return response()->json($return);
                    }
                    else {
                        $return['message'] = "error";
                        return response()->json($return);
                    }
                }
                else {
                    $salary = new Salary();
                    $salary->user_id = $data['user_id'];
                    $salary->month = $data['month'];
                    $salary->year = $year;
                    $salary->total_Money = $data['totalMoney'];
                    $salary->suggest_Money = 0;
                    $salary->realField_Money = $salary->total_Money;
                    $salary->status = 0;
                    if($salary->save()){
                        $return['message'] = "success";
                        return response()->json($return);
                    }
                    else {
                        $return['message'] = "error";
                        return response()->json($return);
                    }
                }
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }


    // Hủy duyệt chấm công
    public function cancelConfirmTimekeeping($id=null)
    {
        $return = array();
        if(!empty($id)){
            $data =TimeKeeping::findOrFail($id);
            $data['adminStatus'] = 0;            if($data->save()){
                // Kiểm tra trong bảng lương đã tồn tại tháng lương của NV trong năm đó chưa :
                $month = $data['month'];
                $year = $data['year'];

                $salary = Salary::select('*')->where('month', $month)->where('year', $year)->where('user_id', $data['user_id'])->get()->toArray();
                if(!empty($salary)){
                    $salary = Salary::findOrFail($salary[0]['id']);
                    $salary->total_Money = $salary['total_Money'] - $data['totalMoney'];
                    $salary->realField_Money = $salary->total_Money - $salary['suggest_Money'];
                    if($salary->save()){
                        $return['message'] = "success";
                        return response()->json($return);
                    }
                    else {
                        $return['message'] = "error";
                        return response()->json($return);
                    }
                }
                else {
                    $salary = new Salary();
                    $salary->user_id = $data['user_id'];
                    $salary->month = $data['month'];
                    $salary->year = $year;
                    $salary->total_Money = $data['totalMoney'];
                    $salary->suggest_Money = 0;
                    $salary->realField_Money = $salary->total_Money;
                    $salary->status = 0;
                    if($salary->save()){
                        $return['message'] = "success";
                        return response()->json($return);
                    }
                    else {
                        $return['message'] = "error";
                        return response()->json($return);
                    }
                }
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }


    /**
     *  Duyệt dữ liệu chấm công
     * adminStatusTimeKeeping
     */
    function adminStatusTimeKeeping($id=null){
        $return = array();
        if(!empty($id)){
            $data =TimeKeeping::findOrFail($id);
            if($data['adminStatus']==1){
                $return['message'] = "error";
                return response()->json($return);
            }
            $data['adminStatus'] = 1;
            if($data->save()){
                // Kiểm tra trong bảng lương đã tồn tại tháng lương của NV trong năm đó chưa :
                $month = $data['month'];
                $year = date('Y', strtotime($data['checkin']));

                $salary = Salary::select('*')->where('month', $month)->where('year', $year)->where('user_id', $data['user_id'])->get()->toArray();
                if(!empty($salary)){
                    $salary = Salary::findOrFail($salary[0]['id']);
                    $salary->total_Money = $salary['total_Money'] + $data['totalmoney'];
                    $salary->realField_Money = $salary->total_Money - $salary['suggest_Money'];
                    if($salary->save()){
                        $return['message'] = "success";
                        return response()->json($return);
                    }
                    else {
                        $return['message'] = "error";
                        return response()->json($return);
                    }
                }
                else {
                    $salary = new Salary();
                    $salary->user_id = $data['user_id'];
                    $salary->month = $data['month'];
                    $salary->year = $year;
                    $salary->total_Money = $data['totalmoney'];
                    $salary->suggest_Money = 0;
                    $salary->realField_Money = $salary->total_Money;
                    $salary->status = 0;
                    if($salary->save()){
                        $return['message'] = "success";
                        return response()->json($return);
                    }
                    else {
                        $return['message'] = "error";
                        return response()->json($return);
                    }
                }
            }
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }

    }

    // Không duyệt chấm công
    public function adminEmptyStatusTimeKeeping($id=null){
        $return = array();
        if(!empty($id)){
            $data = TimeKeeping::findOrFail($id);
            // Nếu ở trạng thái 1 là đã duyệt và đã bay vào bảng lương :
            if($data['adminStatus'] == 1){
                $data['adminStatus'] = 2;
                if($data->save()){
                    $month = $data['month'];
                    $year = date('Y', strtotime($data['checkin']));
                    $salary = Salary::select('*')->where('month', $month)->where('year', $year)->where('user_id', $data['user_id'])->get()->toArray();
                    if(!empty($salary)){
                        $salary = Salary::findOrFail($salary[0]['id']);
                        $salary->total_Money = $salary['total_Money'] - $data['totalmoney'];
                        $salary->realField_Money = $salary->total_Money - $salary['suggest_Money'];
                        if($salary->save()){
                            $return['message'] = "success";
                            return response()->json($return);
                        }
                        else {
                            $return['message'] = "error";
                            return response()->json($return);
                        }
                    }
                }
            }
            $data['adminStatus'] = 2;
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

    /**
     *  Quản lý phòng hát
     *  Date : 29/7/2020
     */
    public function singingRoom()
    {
        $product = Product::all()->toArray();
        $room = Room::all()->toArray();
        return view('layout.singingRoom.index', compact('product', 'room'));
    }


    public function listMonthYear($month, $year)
    {

        $month = !empty($month)?$month:date('m');
        $year = !empty($year)?$year:date('Y');

        $data = TimeKeeping::with('User')->select('*')->where('month', $month)->where('year', $year)->orderBy('id', 'DESC')->get()->toArray();
        if(empty($data)){
            $data = array();
        }
        // Thống kê số giờ hát tháng :
        $timeHourGoSing = DB::table('timekeepings')->where('month',  $month)->where('year', $year)->sum('timeHourGoSing');
        $timeMinGoSing = DB::table('timekeepings')->where('month',  $month)->where('year', $year)->sum('timeMinGoSing');
        $timemin = $timeMinGoSing;
        $hour = floor($timemin/60);
        $min = $timemin%60;

        $timeHourGoSing = $timeHourGoSing + $hour;
        $timeMinGoSing =  $min;

        // Thống kê số giờ bay tháng
        $timeHourGoFly = DB::table('timekeepings')->where('month',  $month)->where('year', $year)->sum('timeHourGoFly');
        $timeMinGoFly = DB::table('timekeepings')->where('month',  $month)->where('year', $year)->sum('timeMinGoFly');
        $timemin = $timeMinGoFly;
        $hour = floor($timemin/60);
        $min = $timemin%60;

        $timeHourGoFly = $timeHourGoFly + $hour;
        $timeMinGoFly =  $min;

        // Thống kê tổng tiền hát trả cho NV
        $totalMoneyGoSing = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('totalMoneyGoSing');

        // Thống kê tổng tiền bay trả cho NV
        $totalMoneyGoFly = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('totalMoneyGoFly');

        // Thống kê tổng tiền hát còn lại:
        $totalMoneyGoSingAdmin = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('totalMoneyGoSingAdmin');
        $totalMoneyGoSingAdmin = $totalMoneyGoSingAdmin - $totalMoneyGoSing;

        // Thống kê tổng tiền bay còn lại:
        $totalMoneyGoFlyAdmin = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('totalMoneyGoFlyAdmin');
        $totalMoneyGoFlyAdmin = $totalMoneyGoFlyAdmin - $totalMoneyGoFly;

        // Thống kê tổng tiền thu về :
        $totalAdmin = $totalMoneyGoSingAdmin + $totalMoneyGoFlyAdmin;

        // Thống kê tổng tiền trả NV :
        $totalUser = $totalMoneyGoSing +  $totalMoneyGoFly;

         return view('layout.User.listMonth', compact(['data', 'timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'totalMoneyGoSing', 'totalMoneyGoFly', 'totalMoneyGoSingAdmin', 'totalMoneyGoFlyAdmin', 'totalAdmin', 'totalUser', 'month', 'year']));
    }


    public function listDayMonthYear($day, $month, $year)
    {
        $id = $day;
        $day = !empty($day)?$day:date('d');
        $month = !empty($month)?$month:date('m');
        $year = !empty($year)?$year:date('Y');

         if(!empty($day) && !empty($month) && !empty($year)){
            $data = TimeKeeping::with('User')->select('*')->where('day', $day)->where('month', $month)->where('year', $year)->orderBy('id', 'DESC')->get()->toArray();
         }else {
             $data = TimeKeeping::with('User')->select('*')->where('day', date('d'))->where('month', date('m'))->where('year', date('Y'))->orderBy('id', 'DESC')->get()->toArray();
         }

         // Thống kê số giờ hát ngày :
         $timeHourGoSing = DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('timeHourGoSing');
         $timeMinGoSing = DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('timeMinGoSing');
            $timemin = $timeMinGoSing;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing = $timeHourGoSing + $hour;
            $timeMinGoSing =  $min;

         // Thống kê số giờ bay
            $timeHourGoFly = DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('timeHourGoFly');
            $timeMinGoFly =  DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('timeMinGoFly');
                $timemin = $timeMinGoFly;
                $hour = floor($timemin/60);
                $min = $timemin%60;

                $timeHourGoFly = $timeHourGoFly + $hour;
                $timeMinGoFly =  $min;

         // Thống kê tổng tiền hát trả cho NV
            $totalMoneyGoSing = DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('totalMoneyGoSing');

         // Thống kê tổng tiền bay trả cho NV
            $totalMoneyGoFly =DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('totalMoneyGoFly');

         // Thống kê tổng tiền hát còn lại:
        $totalMoneyGoSingAdmin = DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('totalMoneyGoSingAdmin');
        $totalMoneyGoSingAdmin = $totalMoneyGoSingAdmin - $totalMoneyGoSing;

         // Thống kê tổng tiền bay còn lại:
         $totalMoneyGoFlyAdmin = DB::table('timekeepings')->where('day', $day)->where('month', $month)->where('year', $year)->sum('totalMoneyGoFlyAdmin');
         $totalMoneyGoFlyAdmin = $totalMoneyGoFlyAdmin - $totalMoneyGoFly;

         // Thống kê tổng tiền thu về :
         $totalAdmin = $totalMoneyGoSingAdmin + $totalMoneyGoFlyAdmin;

         // Thống kê tổng tiền trả NV :
         $totalUser = $totalMoneyGoSing +  $totalMoneyGoFly;
        return view('layout.User.listTimeKeeping', compact(['data', 'id', 'day', 'month', 'year', 'timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'totalMoneyGoSing', 'totalMoneyGoFly', 'totalMoneyGoSingAdmin', 'totalMoneyGoFlyAdmin', 'totalAdmin', 'totalUser']));
    }
}
?>
