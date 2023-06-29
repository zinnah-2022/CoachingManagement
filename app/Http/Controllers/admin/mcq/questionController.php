<?php

namespace App\Http\Controllers\admin\mcq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class questionController extends Controller
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
        DB::table('questions')->insert([
            'lessen_id'=>$request->lessen_id,
            'title'=>$request->title,
            'option1'=>$request->option1,
            'option2'=>$request->option2,
            'option3'=>$request->option3,
            'option4'=>$request->option4,
            'ans'=>$request->ans,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lessen=DB::table('lessens')->where('id', $id)->first();
        return view('backend/admin/pages/mcq/question', compact('lessen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lemcq=DB::table('lessens')->where('id', $id)->first();
        $mcq=DB::table('questions')->where('lessen_id', $id)->inRandomOrder()->take(30)->get();
        return view('backend/admin/pages/mcq/questionview', compact('mcq', 'lemcq'));
    }


    public function qtView($id){
        $singleview=DB::table('questions')->where('lessen_id', $id)->get();
        return view('backend/admin/pages/mcq/singview', compact('singleview'));
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
        DB::table('questions')->where('id', $id)->delete();

    }
}
