<?php

namespace App\Http\Controllers;

use App\Payment;
use App\TimeKeeping;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Salary;

class StatisticalController extends Controller
{
    public function index()
    {
        $data = User::all()->toArray();
    	return view('layout.Statistical.list', compact(['data']));
    }

    public function detail($id=null, $month=null, $year=null){

        if(!empty($month) && !empty($year)){
            $data = TimeKeeping::with('User')->select('*')->where('user_id', $id)->where('month', $month)->where('year', $year)->get()->toArray();
            $salary = Salary::select('*')->where('user_id', $id)->where('month', $month)->where('year', $year)->first();
        }
        else {
            $data = TimeKeeping::with('User')->select('*')->where('user_id', $id)->where('month', date('m'))->where('year', date('Y'))->get()->toArray();
            $salary = Salary::select('*')->where('user_id', $id)->where('month', date('m'))->where('year', date('Y'))->first();
        }

        return view('layout.Statistical.detail', compact(['data', 'salary', 'month', 'year']));
    }

    public function listRevenue($month=null, $year=null)
    {
         // Thống kê số giờ hát theo tháng /năm
       $timeHourGoSing = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('timeHourGoSing');
         $timeMinGoSing = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('timeMinGoSing');
            $timemin = $timeMinGoSing;
            $hour = floor($timemin/60);
            $min = $timemin%60;

            $timeHourGoSing = $timeHourGoSing + $hour;
            $timeMinGoSing =  $min;

       // Thống kê số giờ bay theo tháng /năm
         $timeHourGoFly = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('timeHourGoFly');
         $timeMinGoFly = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('timeMinGoFly');
              $timemin = $timeMinGoFly;
              $hour = floor($timemin/60);
              $min = $timemin%60;

              $timeHourGoFly = $timeHourGoFly + $hour;
              $timeMinGoFly =  $min;


        // // Thống kê tổng số giờ hát của tháng
        // $timeHourGoSing_Month =  DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('timeHourGoSing');
        // $timeMinGoSing_Month = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('timeMinGoSing');

         
        //     $timemin = $timeMinGoSing_Month;
        //     $hour = floor($timemin/60);
        //     $min = $timemin%60;

        //     $timeHourGoSing_Month = $timeHourGoSing_Month + $hour;
        //     $timeMinGoSing_Month =  $min;

         // // Thống kê tổng số giờ bay của tháng 
         // $timeHourGoFly_Month = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('timeHourGoFly');
         // $timeMinGoFly_Month = DB::table('timekeepings')->where('month', date('m'))->where('year', date('Y'))->sum('timeMinGoFly');
         //        $timemin = $timeMinGoFly_Month;
         //        $hour = floor($timemin/60);
         //        $min = $timemin%60;

         //        $timeHourGoFly_Month = $timeHourGoFly_Month + $hour;
         //        $timeMinGoFly_Month =  $min;


        // Thống kê tổng tiền trả NV tháng / năm: 
        $totalMoneyUser = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('totalMoney');

         // Thống kê quản lý  thu về tháng/ năm: 
          $totalMoney = DB::table('timekeepings')->where('month', $month)->where('year', $year)->sum('totalMoneyAdmin');
          $totalMoneyAdmin = $totalMoney - $totalMoneyUser;

            return view('layout.Statistical.listRevenue', compact('timeHourGoSing', 'timeMinGoSing', 'timeHourGoFly', 'timeMinGoFly', 'totalMoneyUser', 'totalMoneyAdmin', 'totalMoney', 'month', 'year'));
    }


}
