<?php

namespace App\Http\Controllers;

use App\Models\CompanyBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = CompanyBranch::orderBy('id', 'desc')->paginate(10);
        return response()->view('cms.companybranch.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.companybranch.create');

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
            'name' => 'string|min:3|max:20',
            'name' => 'string|min:3|max:20',
            'email' => 'string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $companies = new CompanyBranch();
            $companies->email = $request->get('email');
            $companies->password = Hash::make($request->get('password'));
            $companies->name = $request->get('name');
            $companies->status = $request->get('status');
            $companies->description = $request->get('description');
            $companies->save();
            return response()->json([
                'icon' => 'success',
                'title' => 'Company Created Succefully'
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
        $companies = CompanyBranch::findOrFail($id);
        return response()->view('cms.companybranch.show',compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = CompanyBranch::findOrFail($id);
        return response()->view('cms.companybranch.edit',compact('companies'));
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
            'name' => 'string|min:3|max:20',
            'status' => 'nullable',
            'description' => 'nullable',
            'password' => 'nullable',
            'email' => 'nullable'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'icon' => 'error',
                'title' => $validator->getMessageBag()->first(),
            ], 400);
        } else {
            $companies = CompanyBranch::findOrFail($id);
            $companies->email = $request->get('email');
            $companies->password = Hash::make($request->get('password'));
            $companies->name = $request->get('name');
            $companies->status = $request->get('status');
            $companies->description = $request->get('description');
            $companies->save();
            return ['redirect'=>route('companybranches.index')];

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
        $isDeleted = CompanyBranch::destroy($id);

    }
}