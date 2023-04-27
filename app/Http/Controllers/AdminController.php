<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.admin.index', compact('admins'));
    }
    public function recycle(){
        $admins = Admin::onlyTrashed()->paginate (10);
        return response()->view('cms.admin.recycle', compact('admins'));
    }
    public function restoreAdmin($id){
        $admins = Admin::onlyTrashed()->findOrFail($id)->restore();
        $admins = Admin::orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.admin.index', compact('admins'));
    }
    public function force($id){
        $admin = Admin::onlyTrashed()->findOrFail($id)->forceDelete();
        $admins = Admin::orderBy('id', 'desc')->paginate(10);

        return response()->view('cms.admin.index', compact('admins'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'firstname' => 'string|min:3|max:20',
            'lastname' => 'string|min:3|max:20',
            'email' => 'string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $admins->first_name = $request->get('first_name');
            $admins->last_name = $request->get('last_name');
            $admins->gender = $request->get('gender');
            $admins->status = $request->get('status');
            $admins->mobile = $request->get('mobile');
            $admins->date = $request->get('date');
            $admins->save();


            return response()->json([
                'icon' => 'success',
                'title' => 'Admin Created Succefully'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.show',compact('admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.edit',compact('admins'));
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
        $validator = Validator($request->all(), [
            'firstname' => 'string|min:3|max:20',
            'lastname' => 'string|min:3|max:20',
            'email' => 'string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $admins->first_name = $request->get('first_name');
            $admins->last_name = $request->get('last_name');
            $admins->gender = $request->get('gender');
            $admins->status = $request->get('status');
            $admins->mobile = $request->get('mobile');
            $admins->date = $request->get('date');
            $admins->save();
            return ['redirect'=>route('admins.index')];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Admin::destroy($id);
    }
}