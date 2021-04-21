@extends('backend.layout.master')
@section('title','Danh sách đăng ký kiểm tra đầu vào')
@section('title_page','Danh sách đăng ký kiểm tra đầu vào')
@section('content')
<div class="card-header">
    <div class="d-flex align-items-center">
        <div class="row ">
            <div class="ml-5 dropdown">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Trạng Thái
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/admin/enrollment">Tất Cả</a>
                    <a class="dropdown-item" href="/admin/enrollment?status=1">Đã xác nhận</a>
                    <a class="dropdown-item" href="/admin/enrollment?status=0">Chưa xác nhận</a>
                </div>
            </div>
            <div class="d-flex">
                <form class="form-inline">
                    <input name="fullname" class="border-success bg-white form-control mr-sm-2" value="{{request()->get('fullname')}}" type="text"
                        placeholder="Theo Tên Học Viên" aria-label="Search">
                    <a>
                        <button class="border-success btn btn-outline-success my-2 my-sm-0"
                            type="submit">Search</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<section class="content" style="margin:0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered dt-responsive nowrap">
                    @if(session('thongbao'))
                    <div class="alert alert-primary text-center" role="alert">
                        {{session('thongbao') }}
                    </div>
                    @endif
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Ca học</th>
                            <th>Level</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($get_all_enrollment) == 0)
                        <td colspan="10">
                            <div class="mt-5 col-12 justify-content-center d-flex">
                                <div class=" alert alert-danger" role="alert">
                                    Không Có kết Quả Tìm Kiếm Nào
                                </div>
                            </div>
                        </td>
                        @endif
                        <?php $i = 1 ?>
                        @foreach($get_all_enrollment as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->date_of_birth }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->slot }}</td>
                            <td>{{ $item->levelName->level }}</td>
                            <td>
                                <a class="fee_status" id="btn_edit_status_{{ $item->id }}">
                                    <input type="checkbox" @if($item->status == 1) checked @endif
                                    data-toggle="toggle" data-on="Đã xác nhận"
                                    data-off="Chưa xác nhận" data-onstyle="success" data-offstyle="danger"
                                    >
                                </a>
                                <form id="btn_edit_status_form_{{ $item->id }}"
                                    action="{{ route('enrollment.destroy',$item->id) }}" method="post"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $item->status }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container justify-content-center d-flex mt-5 pb-5">
                    {{$get_all_enrollment->links()}}
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_edit_status_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_edit_status_', '');
    if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái?')) {
        $("#btn_edit_status_form_" + id).submit();
    }
});
</script>
@endpush