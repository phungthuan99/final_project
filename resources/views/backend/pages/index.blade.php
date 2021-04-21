@extends('backend.layout.master')
@section('content')
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
          <h3>{{$course->count()}}</h3>

            <p style="font-size: 18px;">Khoá</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        <a href="{{route('course.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$class->count()}}</h3>

            <p style="font-size: 18px;">Lớp</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{route('class.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
          <h3>{{$student->count()}}</h3>

            <p style="font-size: 18px;">Học viên</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('student.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
          <h3>{{$student_passed->count()}}</h3>

            <p style="font-size: 18px;">Học viên đã hoàn thành khoá học</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="" class="small-box-footer"></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div>
@endsection
