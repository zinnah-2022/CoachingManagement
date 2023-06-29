<?php

namespace App\Http\Controllers\admin\note;

use App\Http\Controllers\Controller;
use App\Models\classnote;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class classnoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject=DB::table('subjects')->get();
        return view('backend.admin.pages.ClassNote.subject', compact('subject'));
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
        classnote::create($request->all());
        Toastr::success('Lessen', 'Note create Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject=DB::table('subjects')->where('id', $id)->first();
        $quizes=DB::table('quizes')->where('subject_id', $id)->get();
        return view('backend.admin.pages.ClassNote.create', compact('quizes','subject'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classnotes=classnote::with('subject','quize')->where('subject_id', $id)->get();
        return view('backend.admin.pages.ClassNote.view', compact('classnotes',));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('classnotes')->where('id', $id)->delete();
    }

}
