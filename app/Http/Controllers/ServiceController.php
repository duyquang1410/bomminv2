<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::all()->toArray();
    	return view('layout.Service.list', compact([
            'data'
        ]));
    }

    public function store(Request $request)
    {
    	$return = array();
    	$service = new Service();
    	$service->name = $request->name;
    	$service->price = $request->price;
    	$service->note = $request->note;
    	if($service->save()){
    		$return['message'] = "success";
    		return response()->json($return);
    	}else {
    		$return['message'] = "error";
    		return response()->json($return);
    	}
    }

    public function edit($id=null)
    {
        $data = Service::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id=null)
    {
        $return = array();
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->priceAdmin = $request->priceAdmin;
        $service->note = $request->note;
        if($service->save()){
            $return['message'] = "success";
            return response()->json($return);
        }else {
            $return['message'] = "error";
            return response()->json($return);
        }
        $return['message'] = "error";
        return response()->json($return);
    }

    public function destroy($id=null)
    {
        $return = array();
        $data = Service::findOrFail($id);
        if(!empty($data)){
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
}
