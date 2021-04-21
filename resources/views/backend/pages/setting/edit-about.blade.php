@extends('./backend/layout/master')
@section('title','Quản Trị Trang Giới Thiệu')
@section('title_page','Sửa Trang Giới Thiệu')
@section('content')
<form role="form" method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="">Tiêu đề</label> <br>
            {!! ShowErrors($errors,'title') !!}
            <input type="text" class="form-control" name="title" id="" value="{{ $about->title }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nội dung</label>
          <br>
            {!! ShowErrors($errors,'content') !!}
            <textarea rows="20" name="content" class="" placeholder="Nhập nội dung vào đây"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
               {{ $about->content }} </textarea>
          </div>
      
    </div>
    <div class="card-footer">
        <a href="{{route('setting.index')}}" class="btn btn-danger">Quay lại</a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </div>

    </section>
    @endsection