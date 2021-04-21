<?php

namespace App\Http\Requests\backend\Quiz;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Question_test;

class QuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $level = request()->all();
        $uniqid = null;

        if (isset($level['level'])) {
            // create
            $question_test = Question_test::where([['level_id', (int)$level['level']], ['question', $level['question']]])->first();
            if ($question_test != null) {
                $uniqid = 'unique:Questions_test';
            }
        } else {
            // update
            $question_test = Question_test::where([['question', $level['question']]])->first();
            if ($question_test != null && $question_test->id != request()->segment(3)) {
                $uniqid = 'unique:Questions_test';
            }
        }


        return [
            'question' => "required|min:6|$uniqid",
            'answer1' => 'required|different:answer2|different:answer3|different:answer4',
            'answer2' => 'required|different:answer1|different:answer3|different:answer4',
            'answer3' => 'required|different:answer1|different:answer2|different:answer4',
            'answer4' => 'required|different:answer1|different:answer2|different:answer3',
            'correct_answer' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'question.required' => 'Không được bỏ trống câu hỏi',
            'question.min' => ' câu hỏi không được dưới 6 ký tự',
            'question.unique' => ' câu hỏi ở level này đã tồn tại',
            'answer1.required' => 'Không được bỏ trống đáp án',
            'answer1.different' => 'Không Thể Có 2 Câu Trả Lời Giống Nhau Trong 1 Câu Hỏi',
            'answer2.required' => 'Không được bỏ trống đáp án',
            'answer2.different' => 'Không Thể Có 2 Câu Trả Lời Giống Nhau Trong 1 Câu Hỏi',
            'answer3.required' => 'Không được bỏ trống đáp án',
            'answer3.different' => 'Không Thể Có 2 Câu Trả Lời Giống Nhau Trong 1 Câu Hỏi',
            'answer4.required' => 'Không được bỏ trống đáp án',
            'answer4.different' => 'Không Thể Có 2 Câu Trả Lời Giống Nhau Trong 1 Câu Hỏi',
            'correct_answer.required' => 'Không được bỏ trống câu trả lời chính xac',
        ];
    }
}
