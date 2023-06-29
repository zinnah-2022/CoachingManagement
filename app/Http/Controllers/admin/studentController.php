<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('users')->where('roll', '0')->get();
        return view('backend/admin/pages/student/allstudent', compact('students'));
    }

    public function groupby()
    {

        $groups = DB::table('users')->where('id', '>', '1')->select('day', 'time')->groupBy('day', 'time')->get();
        return view('backend/admin/pages/student/groupby', compact('groups'));
    }

    public function active()
    {
        $active = DB::table('users')->where('status', '1')->orderBy('id', 'DESC')->get();
        return view('backend/admin/pages/student/activestudent', compact('active'));

    }

    public function activeStudent(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back();

    }

    public function studentPending()
    {
        $pending = DB::table('users')->where('id', '>', '1')->where('status', '0')->orderBy('id', 'DESC')->get();
        return view('backend/admin/pages/student/pending', compact('pending'));
    }

//    public function monthlyPay()
//    {
//        $monthly = DB::table('users')->whereDay('date', Carbon::now()->day)->where('status', '1')->orderBy('id', 'DESC')->get();
//        return view('backend/admin/pages/payment/monthlypay', compact('monthly'));
////        whereMonth('month' ,'!=',Carbon::now()->month)
//
//
//    }

    public function __construct()
    {
        $monthly = DB::table('users')->whereDay('date', Carbon::now()->day)->where('status', '1')->orderBy('id', 'DESC')->get();

       foreach ($monthly as $user){
           if (DB::table('unpaids')->where('user_id',"=", $user->id)->
           where('unpaid_date',"=", date("Y-m-d") )->exists()) {

           }else{
               DB::table('users')->where('id', $user->id)->increment('month', 1);
               DB::table('unpaids')->insert([
                   'user_id' => $user->id,
                   'amount' => 500,
                   'unpaid_date' => date("Y-m-d"),
                   'time'=>$user->time,
                   'day'=>$user->day,
               ]);
           }
       }



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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function groupByView($time)
    {
        $groupbyview = DB::table('users')->where('id', '>', 1)->where('time', $time)->where('status', '1')->get();
        return view('backend/admin/pages/student/groupbyview', compact('groupbyview'));

    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('unpaids')->where('id', $id)->delete();

    }

    public function userDelete($id)
    {
        $teacher = DB::table('users')->where("id", $id)->first();
        $image_path = public_path('user/image/') . $teacher->image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        DB::table('users')->where('id', $id)->delete();
    }

    public function sms($id)
    {
        $texts = DB::table('messages')->first();

        $sms = DB::table('users')->where('id', $id)->first();
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "QAx0geyIkK5h4u39Ny77";
        $senderid = "8809612443871";
        $number = $sms->email;
        $message = $sms->name . ' ' . $texts->unpaid;

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
        return $response;
    }

    public function groupSMS($id)
    {
        $groupSMS = DB::table('users')->where('id', $id)->first();
        $textsms = DB::table('messages')->first();

        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "QAx0geyIkK5h4u39Ny77";
        $senderid = "8809612443871";
        $number = $groupSMS->email;
        $message =$textsms->close;

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
        return $response;


    }

    public function AllGroupSMS($id)
    {
        $users = DB::table('users')->where('time', $id)->where('status', 1)->pluck('email');
        $sms = DB::table('messages')->first();

    }
}
