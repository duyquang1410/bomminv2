<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Session;
use App\Product;
use App\Payment;
use App\Room;

class ShoppingcartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart($id=null)
    {
        $return = array();
        if(!empty($id)){
            $product = Product::findOrFail($id)->toArray();
            $price = floatval(preg_replace("/[^-0-9.]/","",$product['price']));
            Cart::add(['id' => $product['id'], 'name' => $product['title'], 'qty' => 1, 'price' => $price, 'options' => ['image' => $product['image']]]);

            $return['message'] = "success";
            return response()->json($return);
        }
        else {
            $return['message'] = "error";
            return response()->json($return);
        }
    }


    public function loadCartData(){
        $output = "12";
        echo $output;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        return view('frontend.home.showCart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
//        return $request->qty[3];  (
        $return = array();
        foreach($request->qty as $key => $item)
        {
           if(!empty($item)){
                $dem = 0;
			   foreach(Cart::content() as $rowId => $cart){
				   if($cart->id == $key){
						   Cart::update($rowId, $item);
                           $dem++;
				   }
			   }
               if($dem==0){
                    $product = Product::findOrFail($key)->toArray();
                    $price = floatval(preg_replace("/[^-0-9.]/","",$product['price']));
                    Cart::add(['id' => $product['id'], 'name' => $product['title'], 'qty' => $item, 'price' => $price, 'options' => ['image' => $product['image']]]);
               }
           }
        }
        $return['message'] = "success";
        return response()->json($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCart()
    {
        $return = array();
        if(Cart::content()){
            Cart::destroy();
            $return['message'] = "success";
            return response()->json($return);
        }
        else {
                $return['message'] = "error";
                return response()->json($return);
        }
    }

    /**
     * Xóa sản phẩm trong giỏ hàng .
     */
    public function removeCart($rowId=null)
    {
        $return = array();
        if(!empty($rowId)){
            if(Cart::remove($rowId)){
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
     * Cập nhật số lượng trong giỏ hàng .
     */

    public function updateRorIdCart($rowId=null)
    {
        $return = array();
        if(!empty($rowId)){
            if(Cart::remove($rowId, -1)){
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

}
