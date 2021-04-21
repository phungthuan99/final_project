@extends('./backend/layout/master')
@section('title','Quản Trị Lớp Học')
@section('title_page','Sửa Lớp Học')
@section('content')
<form role="form" method="POST" action="{{ route('class.update', $class->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="">Tên lớp</label>
            <input type="text" class="form-control" name="name" id="" value="{{ $class->name }}">
            {!! ShowErrors($errors,'name') !!}
        </div>
        <div class="form-group">
            <label for="">Level</label>
            <select name="level_id" id="" class="form-control">
                @foreach ($levels as $level)
                <option @if($level->id == $class->level_id ) selected @endif value="{{ $level->id }}">{{ $level->level }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Khoá</label>
            <select name="course_id" id="" class="form-control">
                @foreach ($courses as $course)
                <option @if($course->id == $class->course_id ) selected @endif
                    value="{{ $course->id }}">{{ $course->course_name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Ngày khai giảng dự kiên</label>
            <input class="form-control" type="date" name="start_date" id="" value="{{$class->start_date}}">
            {!! ShowErrors($errors,'start_date') !!}
        </div>
        <div class="form-group">
            <label for="">Ngày kết thúc dự kiến</label>
            <input class="form-control" type="date" name="finish_date" id="" value="{{$class->finish_date}}">
            {!! ShowErrors($errors,'finish_date') !!}
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('class.index')}}" class="btn btn-danger">Quay lại</a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>

    </section>
    @endsection