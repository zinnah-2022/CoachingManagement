<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
public function authenticated(Request $request, $user)
{

    if (Auth::user()->roll == '1'){
        return redirect('dashboard/admin');
    }else{
        return redirect('dashboard/user');
    }
}


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    protected function credentials(Request $request)
//    {
//        if(is_numeric($request->get('email'))){
//            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
//        }
//        return $request->only($this->username(), 'password');
//    }
}
