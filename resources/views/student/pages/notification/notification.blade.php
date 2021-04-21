@extends('./student/layout/master')
@section('content')
    <div class="container-fluid">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <h1 style="font-size:20px;" class="username pb-2">{{$notification->title}}</h1>
                    <p style="font-size:14px;" class="description">Ngày Đăng: {{$notification->created_at}}</p>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {!! nl2br(e($notification->content)) !!}
            </div>
        </div>
    </div>
@endsection