@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Gửi Thông Báo')
@section('content')
<div class="col-12">
<form action="{{ route('notifications.store') }}" method="POST">
    @csrf
        @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
      <label for="exampleFormControlInput1">Tiêu Đề</label>
    <br>
      {!! ShowErrors($errors,'title') !!}
      <input name="title"  value="{{ old('title') }}" type="text" class="form-control" >
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Danh Mục Thông Báo</label>
      <br>
        {!! ShowErrors($errors,'category_id') !!}
      <select class="form-control" name="category_id" id="type">
        <option value="">Chọn Danh Mục</option>
        @foreach ($get_all_category as $item)
      <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>
    @if(session('error'))
        <span style='color: red'>{{session('error')}}</span>
    @endif
    <div class="form-group">
        <label for="exampleFormControlSelect1">Trạng Thái Thông Báo</label>
        <select class="form-control" name="status" id="type">
        <option value="1">Thông Báo Bình Thường</option>
        <option value="2">Thông Báo Quan Trọng</option>
        </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Nội dung</label>
    <br>
      {!! ShowErrors($errors,'title') !!}
      <textarea rows="20" name="content" class="" placeholder="Nhập nội dung vào đây"
       style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('content')}}</textarea>
    </div>

    <button type="submit" class="mb-5 btn btn-primary">Tạo Thông Báo</button>
  </form>
</div>
  @endsection
