@extends('./backend/layout/master')
@section('title','Quản Trị Quiz')
@section('title_page','Thêm Mới Quiz')
@section('content')


<div class="col-12 m-auto">
    <form class="mt-4" action="{{ route('detail_question_test.store') }}" method="POST">
        @csrf
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
                @if(count($quiz) > 0)
                @foreach ($quiz as $key => $item)
                <option value="{{ $item }}">Buổi Số :{{ $item }}</option>
                @endforeach
                @else
                <option value="">Đã Đủ Số Buổi Quiz</option>
                @endif

            </select>
        </div>
    <input type="hidden" name="level_id" value="{{ $level }}">
        @if(count($quiz) > 0)
        <button type="submit" class="mt-5 mb-5 btn btn-primary">Tạo Buổi Quiz</button>
        @endif
    </form>
</div>
@endsection
