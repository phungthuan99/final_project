
@extends('./backend/layout/master')
@section('title','Quản Trị Feedback')
@section('title_page','Quản Trị Feedback')
@section('content')
<section class="content" style="margin:0!important;">
 <div class="d-flex align-items-center flex-wrap align-items-center pt-4">
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Khoá
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/admin/feedback">Tất cả</a>
                        @foreach ($courses as $course)
                            <a class="dropdown-item" href="/admin/feedback?course_id={{$course->id}}">{{$course->course_name}}</a>
                        @endforeach
                </div>
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
                <th scope="col">Học viên</th>
                <th scope="col">Lớp</th>
                <th scope="col">Giảng viên</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Điểm</th>
            </tr>
        </thead>
        <tbody>
            @if(count($feedbacks) == 0)
                <td colspan="8">
                    <div class="mt-5 col-12 justify-content-center d-flex">
                        <div class=" alert alert-danger" role="alert">
                            Không Có kết Quả Tìm Kiếm Nào
                        </div>
                    </div>
                </td>
            @endif
            <?php $i=1 ?>
            @foreach ($feedbacks as $feedback)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{$feedback->fullname}}</td>
                        <th>{{$feedback->name}}</th>
                        <th>
                            @foreach ($classes as $class)
                                @if($feedback->class_id == $class->id)
                                {{$class->Get_teacher_Name->fullname}}
                                @endif
                            @endforeach
                        </th>
                        <td>{{$feedback->content }}</td>
                        <td>{{$feedback->score}}</td>                      
                    </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$feedbacks->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái lớp học')) {
            $("#deactive_form_" + id).submit();
        } else {
            $(`input#toggle_class_${id}`).bootstrapToggle('disable')
        }
});

</script>
@endpush