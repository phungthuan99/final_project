@extends('./backend/layout/master')
@section('title','Quản Trị Quiz')
@section('title_page',' Chi Tiết Câu Hỏi')
@section('content')

<?php $answer=json_decode(str_replace("\'","'",$Question_test->answer));?>
<div class="col-12 m-auto">
    <form class="mt-4" action="" method="POST">
        <div class="form-group">
            <label>Câu Hỏi: </label>
            <textarea class="form-control pt-4" name="question" cols="10" rows="5">{{ str_replace('\"', '"', str_replace("\'", "'", $Question_test->question))   }}</textarea>
        </div>
        <div class="form-group">
            <label>Câu Trả Lời A: </label>
        <textarea class="form-control pt-2" name="answer1" cols="10" rows="1">{{ $answer->A }}</textarea>
        </div>
        <div class="form-group">
            <label>Câu Trả Lời B: </label>
            <textarea class="form-control pt-2" name="answer2" cols="10" rows="1">{{ $answer->B }}</textarea>
        </div>
        <div class="form-group">
            <label>Câu Trả Lời C: </label>
            <textarea class="form-control pt-2" name="answer3" cols="10" rows="1">{{ $answer->C }}</textarea>
        </div>
        <div class="form-group">
            <label>Câu Trả Lời D: </label>
        <textarea class="form-control pt-2" name="answer4" cols="10" rows="1">{{ $answer->D }}</textarea>
        </div>


        <label>Câu Trả Lời Chính Xác: </label>
        <div class="form-check pl-3">
            <input name="correct_answer" @if($Question_test->correct_answer == 'A') checked @endif class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="A">
            <label class="form-check-label pl-5" for="exampleRadios2">
                A
            </label>
        </div>
        <div class="form-check pl-3">
            <input name="correct_answer" @if($Question_test->correct_answer == 'B') checked @endif class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="B">
            <label class="form-check-label pl-5" for="exampleRadios3">
                B
            </label>
        </div>
        <div class="form-check pl-3">
            <input name="correct_answer" @if($Question_test->correct_answer =="C") checked @endif class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="C">
            <label class="form-check-label pl-5" for="exampleRadios4">
                C
            </label>
        </div>
        <div class="form-check pl-3">
            <input name="correct_answer" @if($Question_test->correct_answer =='D') checked @endif class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="D">
            <label class="form-check-label pl-5" for="exampleRadios5">
                D
            </label>
        </div>
    </form>
</div>

@endsection

