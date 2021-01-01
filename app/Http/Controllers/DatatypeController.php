<?php

namespace App\Http\Controllers;

use App\Datatype;
use Auth, DateTime;
use Illuminate\Http\Request;

class DatatypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Datatype::all()->toArray();
    
        return view('backend.Datatype.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Datatype();
        $data->title = $request->input('title');
        $data->code = $request->input('code');
        $data->note = $request->input('note');
        $data->user_id = 1;
        $data->created_at = new DateTime();

        if($data->save()){
            toastr()->success('Thêm mới thành công', 'Thông báo');
            return back();
        }
        else {
            toatsr()->error('Thêm mới thất bại', 'Thông báo');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Datatype  $datatype
     * @return \Illuminate\Http\Response
     */
    public function show(Datatype $datatype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datatype  $datatype
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
       $data = Datatype::findOrFail($id);
       return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datatype  $datatype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null)
    {
        $data = Datatype::findOrFail($id);
        $data->title = $request->input('title');
        $data->code = $request->input('code');
        $data->note = $request->input('note');
        $data->user_id = Auth::user()->id;
        $data->updated_at = new DateTime();

        if($data->save()){
            toastr()->success('Cập nhật thành công', 'Thông báo');
            return back();
        }
        else {
            toatsr()->error('Cập nhật thất bại', 'Thông báo');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datatype  $datatype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        $data = Datatype::findOrFail($id);


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