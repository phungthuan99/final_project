@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Chi Tiết Thông Báo')
@section('content')

<?php
$Notification=(object)$Notification;
?>
<form class="pl-5 pt-5" action="{{ route('notifications.update',"1") }}" method="POST">
    @method('PUT')
    @csrf
    @if(session('thongbao'))
        <div class="alert alert-primary" role="alert">
        {{session('thongbao')}}
        </div>
        @endif
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Tiêu Đề</label>
        <br>
        {!! ShowErrors($errors,'title') !!}
        <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $Notification->title}}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Loại Thông Báo</label>
        <br>
        {!! ShowErrors($errors,'category_id') !!}
        <select class="form-control" name="category_id" id="type">
            @foreach ($get_all_category as $item)
          <option @if($item->id == $Notification->category_id ) selected  @endif value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
      </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Nội Dung Thông Báo</label>
      <br>
      {!! ShowErrors($errors,'content') !!}
      <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $Notification->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Gửi</label>
        <input type="text" class="form-control" value="{{ Carbon\carbon::parse($Notification->created_at)->format('d-m-Y') }}" readonly>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Ngày Cập Nhật</label>
        <input type="text" class="form-control" value="{{ Carbon\carbon::parse($Notification->updated_at)->format('d-m-Y') }}" readonly>
      </div>
      <button type="submit" class="mt-3 mb-5 btn btn-primary">Cập Nhật Thông Báo</button>
  </form>

@endsection
