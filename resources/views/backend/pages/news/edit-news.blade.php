@extends('./backend/layout/master')
@section('title','Quản Trị Tin Tức')
@section('title_page','Sửa Tin Tức')
@section('content')
<form role="form" method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" name="title" id="" value="{{ $news->title }}">
            {!! ShowErrors($errors,'title') !!}
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <input type="text" class="form-control" name="description" id="" value="{{ $news->description }}">
            {!! ShowErrors($errors,'description') !!}
        </div>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <label for="">Nội dung</label>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="mb-3">
                                <textarea name="content" class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                        {{ $news->content }}
                                                    </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <div class="form-group">
        <label for="">Danh mục</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $category)
                <option @if($category->id == $news->category_id ) selected @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ảnh</label> <br>
            <img style="width:30%" src="storage/{{ $news->image }}" alt="">
            <br>
            {!! ShowErrors($errors,'image') !!}
            <input type="hidden" name="image" value="{{ $news->image }}">
            <input type="file" name="image" class="form-control">
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('news.index')}}" class="btn btn-danger">Quay lại</a>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </div>

    </section>
    @endsection