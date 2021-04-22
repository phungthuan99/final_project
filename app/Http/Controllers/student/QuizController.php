<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Student, Schedule, Classes, QuizTest, Homeworks_history, Question_test};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function index()
    {
        // dd(Classes::find(12)->getSchedule());
        $data['profile'] = Student::find(Auth::guard('student')->user()->id)->class_id;

        $quiz=array();
        if (Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->finish_date >= now()) {
            foreach (QuizTest::where('level_id', Classes::find(Student::find(Auth::guard('student')->user()->id)->class_id)->level_id)->OrderBy('quiz', 'asc')->get() as $key => $value) {
                $quiz[] = $value;
            }
        }
        // lấy ngày của buổi quiz
        foreach (Schedule::where('class_id', Student::find(Auth::guard('student')->user()->id)->class_id)->get() as $key => $schedule) {
            $date_quiz[] = $schedule;
        }

        // check nút làm bài
        $student_id_and_quiz_and_level_id = array();
        foreach (Homeworks_history::all() as $Homeworks_history) {
            if (new Carbon($Homeworks_history->timeout) <= now()) {
                $student_id_and_quiz_and_level_id[] = $Homeworks_history->student_id . ',' . $Homeworks_history->level_id . ',' . $Homeworks_history->quiz;
            }
        }


        $data['date_quiz'] = $date_quiz;
        $data['quiz'] = $quiz;
        $data['student_id_and_quiz_and_level_id'] = $student_id_and_quiz_and_level_id;
        $class_id = Auth::guard('student')->user()->class_id;
        $id = Auth::guard('student')->user()->id;
        $data['feedback'] = DB::table('feedback')
                                ->where('student_id', $id)
                                ->where('class_id', $class_id)
                                ->get();
        $data['sessions'] = Schedule::where('class_id',Auth::guard('student')->user()->class_id)->where('time','<',now())->get();


        if(count($data['sessions']) <= 16){
            return view('student.pages.quiz.index', $data);
        }
        else if(count($data['feedback']) > 0){
            return view('student.pages.quiz.index', $data);
        }
        else{
            return redirect('student/feedback');
        }

        
    }

    public function edit(Request $request)
    {
        // inset vào bảng lịch sử làm bài
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $data['student_id'] = Auth::guard('student')->user()->id;
        $startTime = date("Y-m-d H:i:s");
        $data['timeout'] = date('Y-m-d H:i:s', strtotime(
            '+10 minutes',
            strtotime($startTime)
        ));
        $data['timetart'] = $startTime;


        $question_and_answer = null;
        $correct_answer = null;
        $selected_answer = null;
        $question = array();
        $i = 1;
        $count = count(Question_test::where([['quiz_id', $data['quiz']], ['level_id', $data['level_id']]])->get());
        foreach (Question_test::where([['quiz_id', $data['quiz']], ['level_id', $data['level_id']]])->get() as $question_test) {
            // lấy ra all
            $question[] = $question_test;
            if ($i < $count) {
                // lấy câu hỏi và đáp án (inset vào lịch sử làm bài)
                $question_and_answer .= " \"$question_test->question\" " . ':' . $question_test->answer . ',';

                // tạo câu trả lời của hv mặc định = null (inset vào lịch sử làm bài)
                $selected_answer .= " \"$question_test->question\" " . ':' . '"undefined"' . ',';

                // lấy ra đáp án đúng ở từng câu hỏi (inset vào lịch sử làm bài)
                foreach (json_decode(str_replace("\'", "'", $question_test->answer)) as $answer => $value) {
                    if ($answer == $question_test->correct_answer) {
                        $value = addslashes($value);
                        $correct_answer .= " \"$question_test->question\" " . ':' . "{ \"$answer\":\"$value\" }" . ',';
                    }
                }
            } else {
                // lấy câu hỏi và đáp án (inset vào lịch sử làm bài)
                $question_and_answer .= " \"$question_test->question\" " . ':' . $question_test->answer;

                // tạo câu trả lời của hv mặc định = null (inset vào lịch sử làm bài)
                $selected_answer .= " \"$question_test->question\" " . ':' . '"undefined"';

                // lấy ra đáp án đúng ở từng câu hỏi (inset vào lịch sử làm bài)
                foreach (json_decode(str_replace("\'", "'", $question_test->answer)) as $answer => $value) {
                    if ($answer == $question_test->correct_answer) {
                        $value = addslashes($value);
                        $correct_answer .= " \"$question_test->question\" " . ':' . "{ \"$answer\":\"$value\" }";
                    }
                }
            }
            $i++;
        }
        // lấy câu hỏi và đáp án (inset vào lịch sử làm bài)
        $question_and_answer = '{' .  $question_and_answer . '}';
        $data['question_and_answer'] = $question_and_answer;
        // lấy ra đáp án đúng ở từng câu hỏi (inset vào lịch sử làm bài)
        $correct_answer = '{' .  $correct_answer . '}';
        $data['correct_answer'] = $correct_answer;
        // tạo câu trả lời của hv mặc định = null (inset vào lịch sử làm bài)
        $selected_answer = '{' .  $selected_answer . '}';
        $data['selected_answer'] = $selected_answer;

        $selected_answer_do_quiz=array();
        // check các bài đã làm chưa và nếu chưa thì làm còn làm rồi thì check thời gian làm xem còn đc làm tiếp k
        $time = array();
        if (Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first() == null) {
            $data['score'] = 0;
            Homeworks_history::create($data);
            //tính khoảng thời gian giữa 2 thời điểm
            $init = (int)strtotime(Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first()->timeout) - strtotime(now());
            $hours = floor($init / 3600);
            $minutes = floor(($init / 60) % 60);
            $seconds = $init % 60;

            $time[0] = $minutes;
            $time[1] = $seconds;
        } else if (new Carbon(Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first()->timeout) >= now()) {
            //tính khoảng thời gian giữa 2 thời điểm
            $init = (int)strtotime(Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first()->timeout) - strtotime(now());

            // lấy ra các câu hỏi đã làm để làm tiếp kp làm lại từ đầu
            $selected_answer_do_quiz = Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first()->selected_answer;

            $hours = floor($init / 3600);
            $minutes = floor(($init / 60) % 60);
            $seconds = $init % 60;

            $time[0] = $minutes;
            $time[1] = $seconds;
        } else {
            $info = Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first();
            $data['question_and_answer'] = $info->question_and_answer;
            $data['correct_answer'] = $info->correct_answer;
            $data['selected_answer'] = $info->selected_answer;
            $data['score'] = $info->score;
            return view('student.pages.quiz.detail', $data);
        }
        return view('student.pages.quiz.do_quiz', [
            'question_test' => $question,
            'time' => $time,
            'quiz' => $data['quiz'],
            'level_id' => $data['level_id'],
            'selected_answer_do_quiz' => $selected_answer_do_quiz,

        ]);
    }
    public function show(Request $request)
    {
        $data = Arr::except($request, ['_token','_method'])->toarray();
        // có nghĩa là bài làm xong rồi chỉ show ra kết quả.
        $info = Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first();
        $data['question_and_answer'] = $info->question_and_answer;
        $data['correct_answer'] = $info->correct_answer;
        $data['selected_answer'] = $info->selected_answer;
        $data['score'] = $info->score;
        return view('student.pages.quiz.detail', $data);
    }

    public function update(Request $request)
    {
        $data = Arr::except($request, ['_token', '_method'])->toarray();
        $info = Homeworks_history::where([['level_id',$data['level_id']],['student_id', Auth::guard('student')->user()->id], ['quiz', $data['quiz']]])->first();
        // update lại timeout
        $timeout['timeout']=now();
        $info->update($timeout);
        // show ra chi tiết bài làm
        $data['question_and_answer'] = $info->question_and_answer;
        $data['correct_answer'] = $info->correct_answer;
        $data['selected_answer'] = $info->selected_answer;
        $data['score'] = $info->score;
        return view('student.pages.quiz.detail', $data);
    }
}