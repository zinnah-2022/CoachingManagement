<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class payController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paid=DB::table('users')->join('pays','users.id','=','pays.user_id')
            ->get();

//        print_r($unpaid);
        return view('backend/admin/pages/payment/paid', compact('paid'));
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
    public function store(Request $request, $id)
    {
        $texts=DB::table('messages')->first();
        $AllUser=DB::table('unpaids')->where('id', $id)->first();
        if(DB::table('pays')->where('user_id', "=",$AllUser->user_id)->
            whereMonth('pay_date',"=",$AllUser->unpaid_date)->exists()){
            toastr()->warning('Payment Already Exists ?');
        }else{
            DB::table('unpaids')->where('id', $id)->delete();
        DB::table('pays')->insert([
            'user_id'=>$AllUser->user_id,
            'amount'=>500,
            'pay_date'=> date("Y-m-d")
        ]);
        $sms=DB::table('users')->where('id',$AllUser->user_id )->first();

        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "QAx0geyIkK5h4u39Ny77";
        $senderid = "8809612443871";
        $number = $sms->email;
        $message = 'Dear Mr./Ms'.' '.$sms->name .' '.$texts->paid;

        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        return redirect()->back();
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
