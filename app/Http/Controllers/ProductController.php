<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class ProductController extends Controller
{
    public function store(Request $request){
       $product = new Product();
       $product->title = $request->title;
       $product->price = $request->price;
       $product->priceEntry = $request->priceEntry;
       $product->total = $request->total;
       if(!empty($request->totalAmountEntered)){
           $product->totalAmountEntered = $request->totalAmountEntered;
       }else {
           $product->totalAmountEntered = $request->total*$request->priceEntry;
       }
       $product->user_id = Auth::user()->id;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = public_path().'/uploads/product';
            if($file->move($path, $filename))
            {
                $product->image = $filename;
            }
        }
        if($product->save())
        {
            $return['message'] = "success";
            return response()->json($return);
        }else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }

    public function edit($id=null){
       if(!empty($id)){
           $data = Product::findOrFail($id);
           return response()->json($data);
       }
    }

    public function update(Request $request, $id=null){
        $return = array();
        if(!empty($id)){
            $product = Product::findOrFail($id);
            $product->title = $request->title;
            $product->priceEntry = $request->priceEntry;
            $product->price = $request->price;
            $product->total = $request->total;
            if(!empty($request->totalAmountEntered)){
                $product->totalAmountEntered = $request->totalAmountEntered;
            }else {
                $product->totalAmountEntered = $request->priceEntry*$request->total;
            }

            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/uploads/product';
                if($file->move($path, $filename))
                {
                    $product->image = $filename;
                }
            }
            if($product->save())
            {
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

    public function destroy($id=null){
        $return = array();
        if(!empty($id)){
            $product = Product::findOrFail($id);
            if(!empty($product->image))
            {
                if(file_exists(public_path('/uploads/'.$product->image)))
                {
                    File::delete(public_path('/uploads/'.$product->image));
                }
            }
            if($product->delete()){
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
     * Nhập hàng
     */
    public function importProduct(Request $request, $id=null){
        $return = array();
        if(!empty($id)){
                $data = Product::findOrFail($id);
                $data->total = $data->total+$request->total;
                // Tổng tiền nhập :
                $data->totalAmountEntered = $data->totalAmountEntered + $request->totalAmountEntered;
                if($data->save()){
                    $return['message'] = "success";
                    return response()->json($return);
                }

        }
        $return['message'] = "error";
        return response()->json($return);
    }

    /**
     *  Chi tiết
     */
    public function detail($id=null){
        $return = array();
        if(!empty($id)){
            $data = Product::findOrFail($id);
            return response()->json($data);
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }
}
