<?php

namespace App\Http\Controllers\admin\exam;

use App\Http\Controllers\Controller;
use App\Models\option;
use App\Models\quesion;
use App\Models\quize;
use App\Models\Results;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class quizeController extends Controller
{


    public function index()
    {
        $sbjs = DB::table('subjects')->get();
        return view('backend/admin/pages/exam/subject/view', compact('sbjs'));
    }

    public function lessonStore(Request $request)
    {
        $u = new quize;
        $u->subject_id = $request->subject_id;
        $u->quiz_name = $request->quiz_name;
        $u->quiz_time = $request->quiz_time;
        $u->status = '1';
        $u->save();
        return redirect()->back();
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $ques = quesion::create($data);
        if (count($request->option) > 0) {
            foreach ($request->option as $item => $v) {
                $datad = array(
                    'quesion_id' => $ques->id,
                    'option' => $request->option[$item]
                );
                option::insert($datad);
            }
        } else {
            Toastr::error('Lessen', 'Option Not Data');
        }

        return redirect()->back();
    }


    public function show($id)
    {
        $quizes = DB::table('subjects')->where('id', $id)->first();
        $quizzesName = quize::with('quesion')->where('subject_id', $id)->get();
        return view('backend/admin/pages/exam/quiz/create', compact('quizzesName', 'quizes'));


    }


    public function showResult()
    {
        $viewMark = Results::with('user')->paginate(12);
        return view('backend/admin/pages/exam/result/view', compact('viewMark'));
    }

    public function showLesson($id)
    {
        $quizId = quize::find($id);
        return view('backend.admin.pages.exam.question.create', compact('quizId'));
    }

    public function quesionView($id)
    {
        $quize = quize::find($id);
        if ($quize->id == 8) {
            $questions = quesion::with('option')->paginate(40);
            return view('backend.admin.pages.exam.question.view', compact('questions', 'quize'));

        } else {
            $questions = quesion::with('option')->where('quize_id', $id)->paginate(40);
            return view('backend.admin.pages.exam.question.view', compact('questions', 'quize'));

        }
    }
    public function QPrint($id){
        $quize = quize::find($id);
        if ($quize->id == 8) {
            $questions = quesion::with('option')->inRandomOrder()-> take(30)->get();
            return view('backend.admin.pages.exam.question.print', compact('questions', 'quize'));

        } else {
            $questions = quesion::with('option')->where('quize_id', $id)->inRandomOrder()-> take(30)->get();
            return view('backend.admin.pages.exam.question.print', compact('questions', 'quize'));

        }
    }


}
