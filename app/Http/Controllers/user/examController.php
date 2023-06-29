<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Exams;
use App\Models\quesion;
use App\Models\Results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class examController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bubjectNmae=DB::table('subjects')->get();
        $lessonName=DB::table('quizes')->get();
        return  view('backend.user.pages.exam.search',['subject'=>$bubjectNmae],['lessons'=>$lessonName]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID=Auth::user()->id;
        $result=DB::table('results')->where('user_id', $userID )->latest()->first();
        $exam=Exams::with('quesion')->where('user_id', '=',$userID )->get();

        return view('backend.user.pages.result.view', compact('result','exam'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $quize=DB::table('quizes')->where('id', $request->lesson_id)->first();
        if ($request->lesson_id==19){
            $questions=quesion::with('option')->where('subject_id', $request->subject_id)->inRandomOrder()->limit($request->Number)->get();
            return view('backend.user.pages.exam.view', compact('questions', 'quize'));

        }else{
            $questions=quesion::with('option')->where('subject_id', $request->subject_id)
                ->where('quize_id', $request->lesson_id)->inRandomOrder()->limit($request->Number)->get();
            return view('backend.user.pages.exam.view', compact('questions', 'quize'));

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
    public function subCategory(){
        $book_category_list=DB::table('quizes')->get();
        return response()->json($book_category_list);
    }


    public function examPost(Request $request)
    {
        $userId=Auth::user()->id;
        DB::table('exams')->where('user_id','=',$userId)->delete();
        $date=date('Y-m-d');
        $yes=0;
        $no=0;
        $data=$request->all();
        for($i=1; $i<=$request->index;$i++){
            if(isset($data['questions_id'.$i])){
                $exam=new Exams;
                $question=quesion::where('id',$data['questions_id'.$i])->get()->first();
                if($question->answer==$data['ans'.$i])
                {
                    $result[$data['questions_id'.$i]]='Yes';
                    $exam->is_ans="yes";
                    $yes++;
                }else{
                    $result[$data['questions_id'.$i]]='No';
                    $exam->is_ans="No";
                    $no++;
                }

                $exam->user_id= $userId;
                $exam->quize_id= $question->quize_id;
                $exam->quesion_id=$data['questions_id'.$i];
                $exam->ans=$data['ans'.$i];

                $exam->save();

            }

        }
        $res=new Results;
        $res->user_id= $userId;
        $res->quize_id=$request->quize_id;
        $res->date= $date;
        $res->total_mark=$yes+$no;
        $res->yes_ans=$yes;
        $res->no_ans=$no;
        $res->save();
        return redirect()->route('exam.create');


    }

}
