<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'backPreventButton'],function(){
Route::get('/', function (Request $request) {
    if ($request->session()->exists('email')){
        if ($request->session()->exists('roll'=='0')){
            return redirect()->route('userHome');
        }else{
            return redirect()->route('adminHome');
        }
    }else{
        return view('auth/login');
    }


});
Route::get('/all/session', function (Request $request){
    $request->session()->flush();
});
Route::get('/admin', function () {
    return view('backend/admin/master');
});
Route::get('/student', function () {
    return view('backend/user/master');
});

Route::get('/user/register', [App\Http\Controllers\admin\registerController::class, 'create'])->name('registerUser');
Route::post('/user/register', [App\Http\Controllers\admin\registerController::class, 'store']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [App\Http\Controllers\admin\adminController::class, 'index'])->name('adminHome');
        Route::get('/student', [App\Http\Controllers\admin\studentController::class, 'index'])->name('student1');
        Route::get('/student/active', [App\Http\Controllers\admin\studentController::class, 'active'])->name('active');
        Route::get('/group', [App\Http\Controllers\admin\studentController::class, 'groupby'])->name('groupby');
        Route::get('/group/view/{time}', [App\Http\Controllers\admin\studentController::class, 'groupByView'])->name('groupByView');
        Route::post('/group/view/update/active/{id}', [App\Http\Controllers\admin\studentController::class, 'activeStudent']);
        Route::post('/group/view/update/pending/delete/{id}', [App\Http\Controllers\admin\studentController::class, 'userDelete']);
        Route::get('/student/monthly/unpaid/', [App\Http\Controllers\admin\unpaidController::class, 'index'])->name('unpaid');
        Route::get('/student/monthly/payment/{id}', [App\Http\Controllers\admin\unpaidController::class, 'payment'])->name('payment');
        Route::get('/student/monthly/batch/unpaid', [App\Http\Controllers\admin\unpaidController::class, 'unpaidBatch'])->name('unpaidBatch');
        Route::post('/student/monthly/paid/success/{id}', [App\Http\Controllers\admin\payController::class, 'store'])->name('paid');
        Route::get('/student/monthly/paid/current/month', [App\Http\Controllers\admin\payController::class, 'index'])->name('paidList');
        Route::get('/student/inactive/al', [App\Http\Controllers\admin\studentController::class, 'studentPending'])->name('studentPending');
        Route::get('/student/message/unpaid', [App\Http\Controllers\admin\messageController::class, 'create'])->name('messageUnpaid');
        Route::post('/student/message/unpaid', [App\Http\Controllers\admin\messageController::class, 'store']);
        Route::resource('daymake', App\Http\Controllers\admin\daymakeController::class);
        Route::resource('maketime', App\Http\Controllers\admin\timeController::class);
        Route::resource('onlineexam', App\Http\Controllers\admin\onlineController::class);
        Route::post('/exam/active/{id}', [App\Http\Controllers\admin\onlineController::class, 'update']);
        Route::post('/student/monthly/delete/{id}', [App\Http\Controllers\admin\studentController::class, 'destroy']);


//    sms
        Route::post('/student/monthly/sms/{id}', [App\Http\Controllers\admin\studentController::class, 'sms'])->name('sms');
        Route::get('/student/active/sms/{id}', [App\Http\Controllers\admin\studentController::class, 'groupSMS'])->name('groupSMS');
        Route::get('/group/sms/all/{id}', [App\Http\Controllers\admin\studentController::class, 'AllGroupSMS'])->name('allgroupsms');
//MCQ
        Route::resource('lessen', App\Http\Controllers\admin\mcq\examController::class);
        Route::resource('question', App\Http\Controllers\admin\mcq\questionController::class);
        Route::get('/question/view/{id}', [App\Http\Controllers\admin\mcq\questionController::class, 'qtView'])->name('qtView');
        Route::post('/question/delete/{id}', [App\Http\Controllers\admin\mcq\questionController::class, 'destroy']);
        Route::resource('qdelete', App\Http\Controllers\admin\mcq\examController::class);
//        exam

        Route::get('/exam/question/quize/result', [\App\Http\Controllers\admin\exam\quizeController::class, 'showResult'])->name('showResult');
        Route::get('/exam/question/quize/subject', [\App\Http\Controllers\admin\exam\quizeController::class, 'index'])->name('indexSubject');
        Route::get('/exam/question/quize/lesson/show/{id}', [\App\Http\Controllers\admin\exam\quizeController::class, 'show'])->name('lessonView');
        Route::post('/exam/question/quize/lesson/show/{id}', [\App\Http\Controllers\admin\exam\quizeController::class, 'lessonStore']);
        Route::get('/exam/question/quize/lesson/mcq/{id}', [\App\Http\Controllers\admin\exam\quizeController::class, 'quesionView'])->name('viewMCW');
        Route::get('/exam/question/quize/lesson/mcq/create/{id}', [\App\Http\Controllers\admin\exam\quizeController::class, 'showLesson'])->name('showLesson');
        Route::post('/exam/question/quize/lesson/mcq/create/{id}', [\App\Http\Controllers\admin\exam\quizeController::class, 'store']);
        Route::get('/exam/question/quize/lesson/mcq/print/{id}', [\App\Http\Controllers\admin\exam\quizeController::class, 'QPrint'])->name('QPrint');

//Class Note
        Route::prefix('class')->group(function (){
            Route::resource('notes',\App\Http\Controllers\admin\note\classnoteController::class);
            Route::resource('noteUpdate',\App\Http\Controllers\admin\note\classNoteUpdateController::class);
            Route::resource('editor', \App\Http\Controllers\admin\editor\editorController::class);
        });
//        student Edit
        Route::prefix('pending')->group(function (){
            Route::resource('ustd', \App\Http\Controllers\admin\sEditController::class);
        });
    });

//    user
    Route::get('/user', [App\Http\Controllers\user\userController::class, 'index'])->name('userHome');
    Route::get('/user/profile', [App\Http\Controllers\user\userController::class, 'profile'])->name('profile');
    Route::get('/alluser/mcq/onlineexam', [App\Http\Controllers\user\examController::class, 'subCategory']);

    Route::prefix('/user/mcq/online')->group(function () {
        Route::resource('exam', \App\Http\Controllers\user\examController::class);
        Route::post('/user/exam/start', [App\Http\Controllers\user\examController::class, 'examPost'])->name('examPost');

    });
    Route::prefix('html')->group(function (){
        Route::resource('editor', \App\Http\Controllers\admin\editor\editorController::class);
    });
//ict
    Route::get('/user/subject/notes/ict', [App\Http\Controllers\user\noteviewController::class,'index'])->name('noteIndex');
    Route::get('/user/subject/notes/ict/view/{id}', [App\Http\Controllers\user\noteviewController::class,'show'])->name('noteShow');
    Route::get('/user/subject/notes/ict/show/{id}', [App\Http\Controllers\user\noteviewController::class,'post'])->name('postShow');

//    economics
    Route::get('/user/subject/notes/economics', [App\Http\Controllers\user\conotomics::class,'index'])->name('economicIndex');
    Route::get('/user/subject/notes/economics/view/{id}', [App\Http\Controllers\user\conotomics::class,'show'])->name('economicShow');
    Route::get('/user/subject/notes/economics/show/{id}', [App\Http\Controllers\user\conotomics::class,'post'])->name('economicPost');

});
});
