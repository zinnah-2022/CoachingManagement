<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\classnote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class noteviewController extends Controller
{
    public function index(){
        $quizes=DB::table('quizes')->where('subject_id', '1')->get();
        return view('backend.user.pages.note.quize', compact('quizes'));

    }
    public function show($id){
        $noteView=DB::table('classnotes')->where('quize_id', $id)->orderBy('id','DESC')->paginate(10);
        return view('backend.user.pages.note.category', compact('noteView'));
    }

    public function post($id){
        $post=classnote::with('quize')->where('id', $id)->first();
        return view('backend.user.pages.note.show', compact('post'));
    }



}
