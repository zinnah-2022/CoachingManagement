<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\classnote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class conotomics extends Controller
{
    public function index(){
        $enotes=DB::table('quizes')->where('subject_id', '4')->get();
        return view('backend.user.pages.economic.quize', compact('enotes'));

    }
    public function show($id){
        $enoteView=DB::table('classnotes')->where('quize_id', $id)->orderBy('id','DESC')->paginate(10);
        return view('backend.user.pages.economic.category', compact('enoteView'));
    }

    public function post($id){
        $post=classnote::with('quize')->where('id', $id)->first();
        return view('backend.user.pages.economic.show', compact('post'));
    }
}
