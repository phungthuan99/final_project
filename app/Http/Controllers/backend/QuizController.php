<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Level, Question_test, QuizTest};
use App\Http\Requests\backend\Quiz\{QuizRequest};
use Arr;
use Str;
use Auth;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function edit($id)
    {
        $data['QuizTest'] = QuizTest::find($id);

        $quiz_already_exist = array();
        foreach (QuizTest::where('level_id', $data['QuizTest']->level_id)->get() as $value) {
            $quiz_already_exist[] = $value->quiz;
        }
        $quiz=array();
        for ($i = 1; $i < 25; $i++) {
            if (array_search($i, $quiz_already_exist) === false || $i == $data['QuizTest']->quiz) {
                $quiz[] = $i;
            }
        }
        $data['quiz'] = $quiz;

        return view('backend.pages.quiz.editquiz', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $update_quiz = QuizTest::find($id);
        $quiz_id['quiz_id'] = $request['quiz'];
        
        foreach (Question_test::where([['quiz_id', $update_quiz->quiz], ['level_id', $update_quiz->level_id]])->get() as $key => $value) {
            $value->update($quiz_id);
        }

        $update_quiz->update($data);
        return redirect()->back()->with('thongbao', 'Sửa Buổi Quiz Thành Công');
    }


    public function destroy($id)
    {

        foreach (Question_test::where([['quiz_id', QuizTest::find($id)->quiz], ['level_id', QuizTest::find($id)->level_id]])->get() as $key => $value) {
            Question_test::destroy($value->id);
        }
        QuizTest::destroy($id);
        return redirect()->back()->with('thongbao', 'Xóa Buổi Quiz Thành Công');
    }
}
