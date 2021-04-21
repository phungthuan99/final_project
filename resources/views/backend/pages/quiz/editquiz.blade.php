@extends('./backend/layout/master')
@section('title','Quản Trị Quiz')
@section('title_page','Thêm Mới Quiz')
@section('content')


<div class="col-12 m-auto">
    <form class="mt-4" action="{{ route('quiz_test.update',$QuizTest->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif

        <div class="form-group">
            <label>Quiz Buổi Số: </label>
            <br>
            {!! ShowErrors($errors,'quiz') !!}
            <select class="form-control pt-3 pb-3" name="quiz" id="">
                @foreach ($quiz as $key => $item)
            <option @if($item == $QuizTest->quiz) selected  @endif value="{{ $item }}">Buổi Số :{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="mt-5 mb-5 btn btn-primary">Sửa Buổi Quiz</button>
    </form>
</div>
@endsection
