<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class registerController extends Controller
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
        $maketime=DB::table('createtimes')->get();
        $makeday=DB::table('daymakes')->get();
        return view('auth.register', compact('maketime', 'makeday'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'max:11', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:50'],
            'date' => ['required', 'string', 'max:50'],
            'day' => ['required', 'string', 'max:50'],
            'time' => ['required', 'string', 'max:50'],
            'image' => ['mimes:jpeg,jpg,png|required|max:30000'],
        ]);

        if ($request->image != null){
            $image=$request->file('image');
              $imageName = time().'.'.$image->extension();
              $publicPath=public_path('user/image');
                $img = Image::make($image->getRealPath());
                $img->resize(120, 120, function ($ind){
                    $ind->aspectRatio();
                })->save($publicPath .'/'.$imageName);


            DB::table('users')->insert([
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'name' => $request['name'],
                'subject' => $request['subject'],
                'day' => $request['day'],
                'time' => $request['time'],
                'date' => $request->date,
                'image' => $imageName,

            ]);

            session(['email'=>$request->email, 'password'=>$request->password,'roll'=>'0']);

            return redirect()->route('home');

        }else{
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
