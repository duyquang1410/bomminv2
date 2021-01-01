<?php
namespace App\Http\Controllers;
use App\Displaytype;
use Auth, DateTime;
use Illuminate\Http\Request;

class DisplaytypesController extends Controller
{
   
   public function index()
   {
   	 $data = Displaytype::all()->toArray();
   	 return view('backend.Displaytype.index', compact(['data']));
   }

   /**
     * Update the specified user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */

   public function store(Request $request)
   {
   		$data = new Displaytype();

   		$data->code = $request->input('code');
   		$data->title = $request->input('title');
   		$data->user_id = Auth::user()->id;
   		$data->created_at = new DateTime();
   		if($data->save()){
   			toastr()->success('Thêm mới thành công', 'Thông báo');
   			return back();
   		}
   		else {
   			toastr()->error('Thêm mới thất bại', 'Thông báo');
   			return back();
   		}
   }



    public function edit($id=null)
    {

      
    	$dataEdit = Displaytype::findOrFail($id);
    	return response()->json($dataEdit);
    }


    public function update(Request $request, $id=null)
    {
    	$dataUpdate = Displaytype::findOrFail($id);
    	$dataUpdate->code = $request->input('code');
    	$dataUpdate->title = $request->input('title');
    	$dataUpdate->updated_at = new DateTime();

    	if($dataUpdate->save()){
    		toastr()->success('Cập nhật thành công', 'Thông báo');
    		return back();
    	}
    	else {
    		toatsr()->error('Cập nhật thất bại', 'Thông báo');
    		return back();
    	}
    }

   public function destroy($id=null)
   {
   		$data = Displaytype::findOrFail($id);
   		if($data->delete()){
   			toastr()->success('Xóa thành công', 'Thông báo');
   			return back();
   		}
   		else {
   			toastr()->error('Xóa thất bại', 'Thông báo');
   			return back();
   		}
   }
}

?>