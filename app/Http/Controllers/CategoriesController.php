<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use File;
use App\Datatype;
use Auth;

class CategoriesController extends Controller
{
	public function index()
	{
		$category = Category::all()->toArray();
		$datatypes = Datatype::all()->toArray();
		return view('backend.category.index', compact(['category', 'datatypes']));
	}

	public function create()
	{
		$category  = Category::all()->toArray();
		return view('backend.categories.create', compact(['category']));
	}

	/*
	 * Author: quangnd
	 * Action: Thêm mới cây danh mục
	 * Date: 17/2/2020
	 */
	public function store(Request $request)
	{
        $return = array();
		$category = new Category();
        $category->user_id = Auth::user()->id;
		$category->parent_id = $request->parent_id;
        $category->statusOn = $request->statusOn;
		$category->type = $request->type;
		$category->sortOrder = $request->sortOrder;
		$category->title = $request->title;
		$category->slug  = str_slug($request->title);
		$category->description = $request->description;
		$category->content = $request->content;
		$category->linkToCategoryId = $request->linkToCategoryId;
		$category->tag = json_encode($request->tags);
		if(isset($request->status)){
           $category->status = $request->status;
        }else {
            $category->status = 1;
        }
    	// Xử lý upload file :
        $desktopIcon = $request->file('desktopIcon');
		if($request->hasFile('desktopIcon'))
		{
			$filename = time().'.'.$desktopIcon->getClientOriginalName();
			$filepath = public_path().'/uploads/category/';
            if($desktopIcon->move($filepath, $filename)){
                $category->desktopIcon = $filename;
            }
		}
		if($category->save()) {
			$return['message'] = "success";
		}
		else
		{
			$return['message'] = "error";
		}
        return response()->json($return);
	}

	// xóa danh mục sp :
	public function edit($id=null)
	{

		$list_category = Category::all()->toArray();
		$category = Category::findOrFail($id);
		return response()->json($category);

		//return view('backend.categories.update', compact(['list_category', 'category']));
	}


	public function update(Request $request, $id=null)
	{
        $return = array();
        $category = Category::findOrFail($id);

        if(!empty($category)){
            $category->user_id = Auth::user()->id;
            $category->parent_id = $request->parent_id;
            $category->statusOn = $request->statusOn;
            $category->type = $request->type;
            $category->sortOrder = $request->sortOrder;
            $category->title = $request->title;
            $category->slug  = str_slug($request->title);
            $category->description = $request->description;
            $category->content = $request->content;
            $category->linkToCategoryId = $request->linkToCategoryId;
            $category->tag = json_encode($request->tags);
            if(isset($request->status)){
                $category->status = $request->status;
            }else {
                $category->status = 1;
            }
            // Xử lý upload file :
            $desktopIcon = $request->file('desktopIcon');
            $mobileIcon = $request->file('mobileIcon');
            $defaultImg = $request->file('defaultImg');
            if($request->hasFile('desktopIcon'))
            {
                $filename = time().'.'.$desktopIcon->getClientOriginalName();
                $filepath = public_path().'/uploads/category/';
                if($desktopIcon->move($filepath, $filename)){
                    $category->desktopIcon = $filename;
                }
            }
            if($category->save()) {
                $return['message'] = "success";
            }
            else
            {
                $return['message'] = "error";
            }
        }
        else {
            $return['message'] = "warning";
        }
        return response()->json($return);
	}

	// Xóa danh mục sản phẩm :
	public function destroy($id=null)
	{
        $return = array();
		$category = Category::findOrFail($id);
		// Dem xem no co thang con hay không :
		$category_parent = Category::select('*')->where('parent_id', $category->id)->get();
		if(count($category_parent)>0)
		{
            $return['message'] = "warning";
            $return['title'] = "Không xóa được vì có danh mục con";
            return response()->json($return);
		}
		else
		{
			if(file_exists(public_path().'/uploads/category/'.$category['desktopIcon']))
            {
                File::delete(public_path('uploads/category/'.$category['desktopIcon']));
            }
         if($category->delete())
         {
			$return['message'] = "success";
            $return['title'] = "Xóa thành công chuyên mục";
         }
         else {
				$return['message'] = "error";
                $return['title'] = "Xóa chuyên mục không thành công";
			}
		}
        return response()->json($return);
	}

	// Hiện danh mục
	public function post_display($id=null)
	{
	    $category = Category::findOrFail($id);

		$category['status'] = 1;
		if($category->save())
		{
			toastr()->success('Lưu thành công', 'Thông báo');
			return back();
		}
		else
		{
			toastr()->error('Lưu thất bại', 'Thông báo');
			return back();
		}

	}

	// ẩn danh mục bài viết
	public function post_hidden($id=null)
	{
		$category = Category::findOrFail($id);

		$category['status'] = 0;
		if($category->save())
		{
			toastr()->success('Lưu thành công', 'Thông báo');
			return back();
		}
		else
		{
			toastr()->error('Lưu thất bại', 'Thông báo');
			return back();
		}
	}
	/**
     *  Author: quangnd
     * Action : Ẩn hiện cây chuyên mục
     * Date: 20/2/2020
     */
	public function changeStatus($id=null){

	    $category = Category::findOrFail($id);
	    if(!empty($category)) {
	        if($category['status']==1) {
	            $category['status'] = 0;
            }
	        else {
	            $category['status'] = 1;
            }
        }
	    if($category->save()){
	        toastr()->success('Lưu thành công', 'Thông báo');
	        return back();
        }else {
	        toastr()->error('Lưu thất bại', 'Thông báo');
	        return back();
        }
    }

    /*
     * Author: quangnd
     * Action: xứ lý nhiều chức năng multi
     * Date : 23/2/2020
     */
    public function changeProcess(Request $request){
        $data = $request->all();
        $return = array();
        if(isset($data)) {
            if(!empty($data['action']) && $data['action']==0) {
               $return['message'] = "error";
               $return['title'] = "Bạn cần phải chọn Thao tác";
                return response()->json($return);
            }
            if(empty($data['checkitem'])) {
                $return['message'] = "error";
                $return['title'] = "Bạn cần phải chọn Chuyên mục cần cập nhật";
                return response()->json($return);
            }
            switch ($data['action']){
                case "1":{
                    if(!empty($data['checkitem'])) {
                        $dem = 0;
                        foreach($data['checkitem'] as $items){
                            $cate = Category::findOrFail($items);
                            if(!empty($cate)){
                                $cate['status'] = 1;
                                if($cate->save()){
                                    $dem++;
                                }
                            }
                        }
                       if($dem>0){
                           $return['message'] = "success";
                           $return['title'] = 'Bạn có '.$dem.' chuyên mục cập nhật hiện thị';

                       }else {
                            $return['message'] = "error";
                            $return['title'] = 'Không có chuyên mục cập nhật hiện thị';
                       }
                    }
                    break;
                }
                case "2":{
                    if(!empty($data['checkitem'])) {
                        $dem = 0;
                        foreach($data['checkitem'] as $items){
                            $cate = Category::findOrFail($items);
                            if(!empty($cate)){
                                $cate['status'] = 0;
                                if($cate->save()){
                                    $dem++;
                                }
                            }
                        }
                        if($dem>0){
                           $return['message'] = "success";
                           $return['title'] = 'Bạn có '.$dem.' chuyên mục cập nhật ẩn';
                        }else {
                             $return['message'] = "error";
                             $return['title'] = 'Không có chuyên mục nào cập nhật ẩn';
                        }
                    }
                    break;
                }
                case "3":{
                    if(!empty($data['checkitem'])) {
                        $dem = 0;
                        foreach($data['checkitem'] as $items){
                            $cate = Category::findOrFail($items);
                            // Dem xem no co thang con hay không :
                            $category_parent = Category::select('*')->where('parent_id', $cate->id)->get();
                            if(count($category_parent)>0)
                            {
                                $return['message'] = "warning";
                                $return['title'] = "Không xóa được vì có danh mục con";
                                return response()->json($return);
                            }

                            if(!empty($cate)){
                                if(file_exists(public_path().'/uploads/category/'.$cate['desktopIcon']))
                                    {
                                        File::delete(public_path('uploads/category/'.$cate['desktopIcon']));
                                    }
                                if($cate->delete()){
                                    $dem++;
                                }
                            }
                        }
                        if($dem>0){
                            $return['message'] = "success";
                            $return['title'] = 'Bạn đã xóa '.$dem.' chuyên mục thành công';
                        }else {
                            $return['message'] = "error";
                             $return['title'] = 'Không có chuyên mục nào được xóa';
                        }
                    }
                    break;
                }
                default:{
                   $return['message'] = "error";
                   $return['title'] = 'Bạn cần phải chọn thao tác';
                   break;
                }
            }
        }
        else{
            $return['message'] = "error";
            $return['title'] = 'Thao tác không thành công';
        }
        return response()->json($return);
    }


    /**
     *  Author : quangnd
     *  Action: Thêm chuyên mục con cho item 
     */
    public function storeChild(Request $request, $id=null)
    {
        return $request->all();
        $return = array();
        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->parent_id = $request->parent_id;
        $category->statusOn = $request->statusOn;
        $category->type = $request->type;
        $category->sortOrder = $request->sortOrder;
        $category->title = $request->title;
        $category->slug  = str_slug($request->title);
        $category->description = $request->description;
        $category->content = $request->content;
        $category->linkToCategoryId = $request->linkToCategoryId;
        $category->tag = json_encode($request->tags);
        if(isset($request->status)){
           $category->status = $request->status;
        }else {
            $category->status = 1;
        }
        // Xử lý upload file :
        $desktopIcon = $request->file('desktopIcon');
        if($request->hasFile('desktopIcon'))
        {
            $filename = time().'.'.$desktopIcon->getClientOriginalName();
            $filepath = public_path().'/uploads/category/';
            if($desktopIcon->move($filepath, $filename)){
                $category->desktopIcon = $filename;
            }
        }
        if($category->save()) {
            $return['message'] = "success";
            $return['title'] = "Thêm mới thành công";
        }
        else
        {
            $return['message'] = "error";
            $return['title'] = "Thêm mới thất bại";
        }

        return response()->json($return);
    }



}
?>