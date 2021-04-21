<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Level, Question_test, QuizTest};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class detail_question_test extends Controller
{
    public function edit($id)
    {
        $data['Question_test'] = Question_test::where('id', $id)->first();
        return view('backend.pages.quiz.detail_Question_test', $data);
    }
    public function show($id)
    {
        $data['quiz'] = QuizTest::find($id);
        $data['level'] = Level::find($data['quiz']->level_id)->level;
        $data['level_id'] = Level::find($data['quiz']->level_id)->id;
        $data['get_all_Question_test'] = Question_test::where([['quiz_id', $data['quiz']->quiz], ['level_id', $data['quiz']->level_id]])->get();
        return view('backend.pages.quiz.detail_Question_test_by_quiz', $data);
    }

    public function create(Request $request)
    {
        $data['level'] = Level::where('level', $request['level'])->first()->id;
        $quiz_already_exist = array();
        foreach (QuizTest::where('level_id', $data['level'])->get() as $value) {
            $quiz_already_exist[] = $value->quiz;
        }
        $quiz=array();
        for ($i = 1; $i < 25; $i++) {
            if (array_search($i, $quiz_already_exist) === false) {
                $quiz[] = $i;
            }
        }
        $data['quiz'] = $quiz;
        return view('backend.pages.quiz.create_quiz', $data);
    }

    public function store(Request $request)
    {

        $data = $request = Arr::except($request, ['_token'])->toarray();
        $data['user_id'] = Auth::user()->id;
        $data['time'] = 10;
        $data['status'] = 1;
        QuizTest::create($data);
        return redirect()->back()->with('thongbao', 'Tạo Buổi Quiz thành công');
    }
}
