@extends('./backend/layout/master')
@section('title','Quản Lý Khoá Học')
@section('title_page','Quản Lý Khoá Học')
@section('content')
<section class="content" style="margin:0!important;">
    <form action="" class="d-flex mb-4 ">
        <div class="col-4"><input type="date" class="form-control" value="{{request()->get('start_date')}}" name="start_date" id=""></div>
        <div class="col-4"><input type="date" class="form-control" value="{{request()->get('finish_date')}}" name="finish_date" id=""></div>
        <div class="col-3">
            <button type="submit" class="btn btn-outline-success">
                Lọc theo ngày tháng
            </button>
        </div>
    </form>
    <form class=" mb-3 d-flex align-items-center" action="">
        <div class="col-6">
        <input class="form-control" type="text" name="course_name" value="{{request()->get('course_name')}}" placeholder="Tìm theo tên khoá">
        </div>
        <button type="submit" class="btn btn-outline-success mr-4">Tìm</button>
        <a href="{{route('course.index')}}" class="btn btn-outline-success">Bỏ lọc</a>
    </form>
    <table style="background-color: white" class="table table-striped table-bordered dt-responsive nowrap ">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Khoá</th>
                <th scope="col">Ngày Khai Giảng</th>
                <th scope="col">Dự kiến kết thúc</th>
                <th scope="col">Người tạo</th>
                <th scope="col">
                    <a href="{{ route('course.create') }}">
                        <button type="button" class="btn btn-outline-primary">Tạo khoá học mới</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($courses) == 0)
            <td colspan="8">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Không có khoá học theo tìm kiếm
                    </div>
                </div>
            </td>
            @endif
            <?php $i=1 ?>
            @foreach ($courses as $course)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $course->course_name }}</td>
                <td>{{date('d-m-Y', strtotime($course->start_date))}}</td>
                <td>{{date('d-m-Y', strtotime($course->finish_date))}}</td>
                <td>{{$course->userName->fullname}}</td>
                <td>
                    <a class="btn btn-outline-info" href="{{ route('course.show',"$course->id") }}">Chi Tiết</a>
                    @if($course->start_date > now()->toDateString()) 
                    <a class="btn btn-outline-warning" href="{{ route('course.edit',"$course->id") }}">Sửa</a>
                    @else
                    
                    @endif 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        <nav aria-label="" class="news__pagination">
            {{ $courses->links() }}
        </nav>
    </div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_delete_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    if (confirm('Bạn có muốn xóa không')) {
        $("#delete_form_" + id).submit();
    }
});
</script>
@endpush