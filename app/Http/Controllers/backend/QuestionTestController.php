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
use Illuminate\Support\Facades\Auth as FacadesAuth;

class QuestionTestController extends Controller
{
    public function index(Request $request)
    {

        if ($request['level'] != null) {
            $data['get_all_level'] = Level::OrderBy('level', 'asc')->where('level', $request['level'])->withcount('Countquestion_quiz')->paginate(10);
        } else {
            $data['get_all_level'] = Level::OrderBy('level', 'asc')->withcount('Countquestion_quiz')->paginate(10);
        }
        return view('backend.pages.quiz.index', $data);
    }

    public function show($id)
    {
        $data['get_all_Question_test'] = QuizTest::OrderBy('quiz', 'asc')->where('level_id', $id)->paginate(10);
        $data['level'] = Level::where('id', $id)->first()->level;
        $data['questions_test'] = Question_test::all();
        $data['create_level'] = $id;
        return view('backend.pages.quiz.detail', $data);
    }

    public function destroy($id)
    {
        Question_test::destroy($id);
        return redirect()->back()->with('thongbao', 'Xóa Câu Hỏi Thành Công');
    }

    public function create(Request $request)
    {
        $data['level'] = $request['level'];
        $data['quiz'] = $request['quiz'];
        return view('backend.pages.quiz.create', $data);
    }

    public function store(QuizRequest $request)
    {
        $data = Arr::except($request, ['_token'])->toarray();
        $data['status'] = 1;
        $data['user_id'] = Auth::User()->id;
        // check dấu nháy kép.đơn trong câu
        $data['question'] = addslashes($data['question']);
        $answer['A'] = addslashes($request['answer1']);
        $answer['B'] = addslashes($request['answer2']);
        $answer['C'] = addslashes($request['answer3']);
        $answer['D'] = addslashes($request['answer4']);
        $answer_json = null;

        foreach ($answer as $key => $value) {
            if ($key != 'D') {
                $answer_json .= " \"$key\" " . ':' . " \"$value\" ,";
            } else {
                $answer_json .= " \"$key\" " . ':' . " \"$value\" ";
            }
        }
        $answer_json = '{' .  $answer_json . '}';
        $data['answer'] = $answer_json;

        Question_test::create($data);
        return redirect()->back()->with('thongbao', 'Lưu Câu Hỏi Thành Công');
    }


    public function edit($id)
    {
        $data['Question_test'] = Question_test::where('id', $id)->first();
        return view('backend.pages.quiz.edit', $data);
    }

    public function update(QuizRequest $request, $id)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        // check dấu nháy kép.đơn trong câu
        $data['question'] = addslashes($data['question']);
        $answer['A'] = addslashes($request['answer1']);
        $answer['B'] = addslashes($request['answer2']);
        $answer['C'] = addslashes($request['answer3']);
        $answer['D'] = addslashes($request['answer4']);
        $answer_json = null;
        foreach ($answer as $key => $value) {
            if ($key != 'D') {
                $answer_json .= " \"$key\" " . ':' . " \"$value\" ,";
            } else {
                $answer_json .= " \"$key\" " . ':' . " \"$value\" ";
            }
        }
        $answer_json = '{' .  $answer_json . '}';
        $data['answer'] = $answer_json;

        $data['status'] = 1;

        $data['user_id'] = Auth::User()->id;
        Question_test::find($id)->update($data);
        return redirect()->back()->with('thongbao', 'Sửa Câu Hỏi Thành Công');
    }
}
