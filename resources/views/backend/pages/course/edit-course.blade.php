@extends('./backend/layout/master')
@section('title','Quản Lý Khoá Học')
@section('title_page','Sửa Khoá Học')
@section('content')
<form role="form" method="POST" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="">Tên khoá</label> <br>
            {!! ShowErrors($errors,'course_name') !!}
            <input type="text" class="form-control" name="course_name" id="" value="{{ $course->course_name }}">
        </div>
        <div class="form-group">
            <label for="">Ngày khai giảng</label> <br>
            {!! ShowErrors($errors,'start_date') !!}
            <input class="form-control" type="date" name="start_date" value="{{$course->start_date}}">
        </div>
        <div class="form-group">
            <label for="">Ngày kết thúc dự kiến</label>
            {!! ShowErrors($errors,'finish_date') !!}
            <input class="form-control" name="finish_date" type="date" value="{{$course->finish_date}}" >
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('course.index')}}" class="btn btn-danger">Quay lại</a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>

    </section>
    @endsection