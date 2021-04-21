<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Student, Homeworks_history};
use Arr;
use Auth;
use Carbon\Carbon;

class ajax_quiz_student_Controller extends Controller
{
    public function update_selected_answer($question, $selected_answer, $level_id, $quiz)
    {
        // chuyể ký tự dấu ? vừa đổi từ bên js về lại dấu ?
        $question = str_replace("_|_", "?", $question);
        // lấy ra các câu hỏi và các câu trả lời có sẵn
        foreach (json_decode(str_replace("\'", "'", Homeworks_history::where([['student_id', Auth::guard('student')->user()->id], ['level_id', $level_id], ['quiz', $quiz]])->first()->selected_answer)) as $key1 => $value1) {
            $array_selected_answer[$key1] = $value1;
        }
        $data = array();
        $answer = null;
        $i = 1;

        foreach ($array_selected_answer as  $key2 => $value2) {
            if ($i < count($array_selected_answer)) {
                if ($key2 == $question) {
                    $key2 = addslashes($key2);
                    $answer .= " \"$key2\" " . ':' . " \"$selected_answer\" " . ',';
                } else {
                    $key2 = addslashes($key2);
                    $answer .= " \"$key2\" " . ':' . " \"$value2\" " . ',';
                }
            } else {
                if ($key2 == $question) {
                    $key2 = addslashes($key2);
                    $answer .= " \"$key2\" " . ':' . " \"$selected_answer\" ";
                } else {
                    $key2 = addslashes($key2);
                    $answer .= " \"$key2\" " . ':' . " \"$value2\"";
                }
            }
            $i++;
        }
        // lưu đáp án vào
        $answer = '{' .  $answer . '}';
        // lưu đáp án vào vừa chọn vào bảng
        $data['selected_answer'] = $answer;
        Homeworks_history::where([['student_id', Auth::guard('student')->user()->id], ['level_id', $level_id], ['quiz', $quiz]])->first()->update($data);


        // lấy ở ô selected_answer đã lưu câu hỏi và câu trả lời của hv vừa click
        foreach (json_decode(str_replace("\'", "'", $answer)) as $key_answer_student_selected => $answer_student_selected) {
            $a[$key_answer_student_selected] = $answer_student_selected;
        }
        // lấy ở ô correct_answer đã lưu câu hỏi và câu trả lời đúng
        foreach (json_decode(str_replace("\'", "'", Homeworks_history::where([['student_id', Auth::guard('student')->user()->id], ['level_id', $level_id], ['quiz', $quiz]])->first()->correct_answer)) as $key_correct_answer => $correct_answer) {

            foreach (json_decode(json_encode($correct_answer)) as $dap_an => $value_dap_an) {
                $b[$key_correct_answer] = $dap_an;
            }
        }

        // lưu điểm vào bảng
        $data['score'] = (int)count(array_intersect_assoc($b, $a));
        Homeworks_history::where([['student_id', Auth::guard('student')->user()->id], ['level_id', $level_id], ['quiz', $quiz]])->first()->update($data);
    }

    // public function end_time($level_id, $quiz)
    // {
    //     return [$level_id, $quiz];
    // }
}
