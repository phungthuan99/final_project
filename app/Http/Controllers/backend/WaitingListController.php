<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Arr;
use App\Models\Waiting_list;
class WaitingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->all() != null && $request['page'] == null){
            foreach($request->all() as $key => $value){
                if($key == 'fullname'){
                    $data['waiting_list']=Waiting_list::where("$key",'LIKE',"%$value%")->paginate(10);
                }
            }
        }else{
            $data['waiting_list'] = Waiting_list::paginate(10);

        }
        return view('backend.pages.waiting_list.waiting_list',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $list = Waiting_list::find($id);
        $data = Arr::except(request()->all(), ["_token ,'_method'"]);

        if($data['status'] == 2 ){
            $data['status'] = 1;
        }else{
            $data['status'] = 2;
        }

        $list->update($data);

        return redirect()->back();
    }
}
