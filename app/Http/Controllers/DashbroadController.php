<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TimeKeeping;
use DB;
use Auth;
class DashbroadController extends Controller
{
    public function index()
    {
      $timekeeping = TimeKeeping::with('User')->select('*')->orderBy('id', 'DESC')->limit(10)->get()->toArray();

      // Thống kê số giờ hát hôm nay
       $timeHourGoSing = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('timeHourGoSing');
         $timeMinGoSing = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('timeMinGoSing');
            $timemin = $timeMinGoSing;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing = $timeHourGoSing + $hour;
            $timeMinGoSing =  $min;

       // Thống kê số giờ bay hôm nay
         $timeHourGoFly = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('timeHourGoFly');
         $timeMinGoFly = DB::table('timekeepings')->where('day', date('d'))->where('month', date('m'))->sum('timeMinGoFly');
              $timemin = $timeMinGoFly;
              $hour = floor($timemin/60);
              $min = $timemin%60;

              $timeHourGoFly = $timeHourGoFly + $hour;
              $timeMinGoFly =  $min;


        // Thống kê tổng số giờ hát của tháng
        $timeHourGoSing_Month =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('timeHourGoSing');
        $timeMinGoSing_Month = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('timeMinGoSing');

         
            $timemin = $timeMinGoSing_Month;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing_Month = $timeHourGoSing_Month + $hour;
            $timeMinGoSing_Month =  $min;

         // Thống kê tổng số giờ bay của tháng 
         $timeHourGoFly_Month = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('timeHourGoFly');
         $timeMinGoFly_Month = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('timeMinGoFly');
                $timemin = $timeMinGoFly_Month;
                $hour = floor($timemin/60);
                $min = $timemin%60;

                $timeHourGoFly_Month = $timeHourGoFly_Month + $hour;
                $timeMinGoFly_Month =  $min;

		// Thống kê tổng tiền trả NV tháng này: 
 		$totalMoneyUser = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('totalMoney');

         // Thống kê quản lý  thu về tháng này: 
          $totalMoneyAdmin = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('totalMoneyAdmin');
          $totalMoneyAdmin = $totalMoneyAdmin - $totalMoneyUser;


       	// Thống kê Tổng số nhân viên 
         $totalUser = User::all()->count();

       return view('layout.Dashbroad.index', compact(['timekeeping', 'timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'timeHourGoSing_Month', 'timeMinGoSing_Month', 'timeHourGoFly_Month', 'timeMinGoFly_Month', 'totalMoneyUser', 'totalMoneyAdmin', 'totalUser']));
    }


    // Tổng quan dành cho user ( Nhân viên )

    public function userDashbroad()
    {
    	if(Auth::user()->role==2){
    	
    		// Thống kê tổng số giờ hát của tháng này
	        $timeHourGoSing =  DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', Auth::user()->id)->sum('timeHourGoSing');
	        $timeMinGoSing = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', Auth::user()->id)->sum('timeMinGoSing');

         
            $timemin = $timeMinGoSing;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing = $timeHourGoSing + $hour;
            $timeMinGoSing =  $min;

         	// Thống kê tổng số giờ bay của tháng này
         	$timeHourGoFly = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', Auth::user()->id)->sum('timeHourGoFly');
            $timeMinGoFly = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->where('user_id', Auth::user()->id)->sum('timeMinGoFly');
                $timemin = $timeMinGoFly;
                $hour = floor($timemin/60);
                $min = $timemin%60;

                $timeHourGoFly = $timeHourGoFly + $hour;
                $timeMinGoFly =  $min;

    		// Thống kê tạm ứng tháng này
    		$suggest_Money =  DB::table('salarys')->where('month', date('m'))->where('user_id', Auth::user()->id)->sum('suggest_Money');

            // Thống kê tổng lương tháng này, chưa tính chưa duyệt
            $totalMoney = DB::table('salarys')->where('month', date('m'))->where('user_id', Auth::user()->id)->sum('realField_Money');

			return view('layout.Dashbroad.userIndex', compact(['timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'totalMoney', 'suggest_Money']));
    	}
    	else {
    		return redirect()->route('login');
    	}
    }
}

?>