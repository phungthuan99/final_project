@extends('./backend/layout/master')
@section('title','Điểm danh')
@section('title_page','Điểm danh')
@section('content')
<section class="content" style="margin:0">
    <div class="d-flex flex-wrap align-items-center">
        <div class="col-4">
         <form action="" class="d-flex mb-2">
         <input class="form-control border-success mr-2" type="text" name="name" value="{{request()->get('name')}}" placeholder="Tìm theo tên lớp">
             <button class="btn btn-primary"type="submit">Tìm kiếm</button>
         </form>
        </div>
     </div>
    <table style="background-color: white" class="table table-striped table-bordered dt-responsive nowrap">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
       
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Level</th>
                <th scope="col">Khoá</th>
                <th scope="col">Ngày bắt đầu</th>
                <th scope="col">Ngày Kết thúc</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if(count($classes) == 0)
            <td colspan="7">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Không có lớp học trong level hoặc khoá học này
                    </div>
                </div>
            </td>
            @endif
            <?php $i=1 ?>
            @foreach ($classes as $class)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $class->name }}</td>
                <td>{{ $class->levelName->level}}</td>
                <td>{{ $class->courseName->course_name}}</td>
                <td>{{date('d-m-Y', strtotime($class->start_date))}}</td>
                <td>{{date('d-m-Y', strtotime($class->finish_date))}}</td>
                <td>
                   <a class="btn btn-outline-primary border-primary" href="{{route('attendance.show',$class->id)}}">Lịch học</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$classes->links()}}
    </div>
</section>
@endsection