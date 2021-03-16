<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Imports\NamesImport;
use Maatwebsite\Excel\Facades\Excel;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->has('file')){
            $validated = $request->validate([
                'file' => 'required',
            ]);

            Excel::import(new NamesImport($request->group_id), $request->file('file'));

        } else {
            $validated = $request->validate([
                'name' => 'required',
            ]);

            Participant::create([
                'group_id' => $request->group_id,
                'name' => strtoupper($request->name),
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Participant $participants)
    {
        $group = Group::findOrFail($id);
        $participants = $participants->where('group_id',$group->id)->paginate(10);
        return view('names.index',compact('group','participants'));
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
    public function destroy($id)
    {
        //
    }
}
