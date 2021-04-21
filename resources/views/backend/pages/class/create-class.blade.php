@extends('./backend/layout/master')
@section('title','Quản Trị Lớp')
@section('title_page','Tạo lớp học mới')
@section('content')
<form enctype="multipart/form-data" class="card-body" action="{{ route('class.store') }}" method="POST">
    @csrf
    @if(session('thongbao'))
    <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
    </div>
    @endif
    <div class="form-group">
        <label for="">Tên lớp</label>
        <br>
        {!! ShowErrors($errors,'name') !!}
        <input name="name" type="text" value="{{ old('name')}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Level</label>
        <br>
        {!! ShowErrors($errors,'level_id') !!}
        <select name="level_id" class="form-control">
            @foreach ($levels as $level)
            <option value="{{ $level->id }}">{{ $level->level }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Khoá</label>
        <br>
        {!! ShowErrors($errors,'course_id') !!}
       
            @if($courses == null)
            <select class="form-control" >
            <option >Hiện tại không có khoá học phù hợp vui lòng tạo một khoá mới</option>
            </select>
            @else
            <select name="course_id" class="form-control" id="course_id">
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name}}</option>
                @endforeach
            </select>
            @endif
    </div>
    <div class="form-group">
        <label for="">Ngày dự kiến khai giảng</label>
        <br>
        {!! ShowErrors($errors,'start_date') !!}
        <input data-date="" data-date-format="DD MM YYYY" type="date" value="{{ old('start_date')}}" name="start_date"
            class="form-control">
    </div>
    <div class="form-group">
        <label for="">Ngày kết thúc dự kiến</label>
        <br>
        {!! ShowErrors($errors,'finish_date') !!}
        <input data-date="" data-date-format="DD MM YYYY" type="date" value="{{ old('finish_date')}}" name="finish_date"
            class="form-control">
    </div>
    <div class="d-flex align-items-center">
        <a class="btn btn-danger mr-4" href="{{route('class.index')}}">Quay lại</a>
        <button type="submit" class="btn btn-primary">Thêm Lớp</button>
    </div>

    </div>

</form>
@endsection

@push('scripts')
@endpush