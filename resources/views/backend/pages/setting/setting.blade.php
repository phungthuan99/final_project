@extends('backend.layout.master')
@section('title','Quản Lý Landing Page')
@section('title_page','Quản Lý Landing Page')
@section('content')
<section class="content" style="margin:0!important;">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3 >Setting</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped table-bordered dt-responsive nowrap ">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Slogan</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>  @if(count($settings) == null)
                                        <a class="btn btn-outline-primary" href="{{route('setting.create')}}">Thêm mới</a>
                                        @else
                                        
                                        @endif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)
                                <tr>
                                    <td><img src="storage/{{ $setting->logo }}" width="70px" height="50px"></td>
                                    <td>{{$setting->slogan}}</td>
                                    <td>{{$setting->email}}</td>
                                    <td>{{$setting->phone}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{route('setting.edit',[$setting->id])}}">Sửa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3 >Trang giới thiệu</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped table-bordered dt-responsive nowrap ">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>
                                        @if(count($abouts) == null)
                                        <a class="btn btn-outline-primary" href="{{route('about.create')}}">Thêm mới</a>
                                        @else

                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($abouts as $about)
                                <tr>
                                    <td>{{$about->title}}</td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{route('about.edit',[$about->id])}}">Sửa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('scripts')
<script>
$('.close-noti').click(function() {
    $('.alert-noti').hide();
})
</script>
@endpush