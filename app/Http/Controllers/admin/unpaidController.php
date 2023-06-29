<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\unpaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class unpaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unpaid=DB::table('users')->join('unpaids','users.id','=','unpaids.user_id')
            ->get();
        return view('backend/admin/pages/payment/unpaid', compact('unpaid',));


    }
    public function payment($id)
    {
        $unpaid=DB::table('users')->join('unpaids','users.id','=','unpaids.user_id')
            ->where('time', $id)->get();
        return view('backend/admin/pages/payment/payment', compact('unpaid',));


    }
    public function unpaidBatch(){
        $groups=DB::table('users')->join('unpaids','users.id','=','unpaids.user_id')
            ->select('day','time')->groupBy('day','time')->get();
        return view('backend/admin/pages/payment/monthlypay', compact('groups'));
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
    public function destroy($id)
    {
        //
    }
}
