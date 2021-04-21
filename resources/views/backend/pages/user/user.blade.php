@extends('./backend/layout/master')
@section('title','Quản Trị Nhân Viên')
@section('title_page','Quản Trị Nhân Viên')
@section('content')
<section class="content" style="margin:0;">
<div class="d-flex align-items-center">
            <div class="col-5">
                <form action="" class="d-flex">
                    <input class="form-control mr-2" type="text" name="fullname" value="{{request()->get('fullname')}}" placeholder="Tìm theo tên">
                    <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   
                    @if(empty(request()->get('role')))
                    Lọc Theo Chức vụ
                    @elseif(request()->get('role') == 5)
                    Giám đốc
                    @elseif(request()->get('role') == 4)
                    Giảng viên
                    @elseif(request()->get('role') == 3)
                    Quản lý
                    @elseif(request()->get('role') == 2)
                    Admin
                    @endif
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('user.index')}}">
                        Tất cả
                    </a>
                    <a class="dropdown-item" href="{{route('user.index')}}?role=5">
                        Giám đốc
                    </a>
                    <a class="dropdown-item" href="{{route('user.index')}}?role=4">
                        Giảng viên
                    </a>
                    <a class="dropdown-item" href="{{route('user.index')}}?role=3">
                        Quản lý
                    </a>
                    <a class="dropdown-item" href="{{route('user.index')}}?role=2">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    <table style="background-color: white" class="table table-striped table-bordered dt-responsive flex-wrap ">
        @if(session('thongbao'))
        <div class="alert alert-primary text-center" role="alert">
            {{session('thongbao') }}
        </div>
        @endif
        
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Họ Tên</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">
                    <a href="{{ route('user.create') }}">
                        <button type="button" class="btn btn-outline-primary">Tạo tài khoản mới</button>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(count($users) == 0)
            <td colspan="6">
                <div class="mt-5 col-12 justify-content-center d-flex">
                    <div class=" alert alert-danger" role="alert">
                        Không có nhân viên phù hợp
                    </div>
                </div>
            </td>
            @endif
            <?php $i=1 ?>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td><img style="width:150px;height:auto" src="storage/{{ $user->avatar }}" alt=""></td>
                <td>{{ $user->fullname }}</td>
                <td>
                    @if( $user->role == 5 ) <span>Giám đốc</span>
                    @elseif( $user->role == 4 ) <span>Giảng viên</span>
                    @elseif( $user->role == 3 ) <span>Quản lý</span>
                    @elseif( $user->role == 2 ) <span>Admin</span>
                    @endif
                </td>
                <td>
                    <a class="toggle-class" id="btn_deactive_{{ $user->id }}">
                        <input id="toggle_user_{{ $user['id'] }}" type="checkbox" @if($user->status == 1) checked @endif
                        data-toggle="toggle" data-on="Hoạt động"
                        data-off="Khoá" data-onstyle="success" data-offstyle="danger">
                    </a>

                    <form id="deactive_form_{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        <input type="hidden" name="status" value="{{$user->status}}">
                        @csrf
                    </form>
                </td>
                <td>
                    <a class="btn border-info btn-outline-info" href="{{ route('user.show',"$user->id") }}">
                        Chi Tiết
                    </a>
                    <a class="btn border-warning btn-outline-warning" href="{{ route('user.edit',"$user->id") }}">
                        Sửa
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container justify-content-center d-flex mt-5 pb-5">
        {{$users->links()}}
    </div>
</section>
@endsection

@push('scripts')
<script>
$("a[id^='btn_deactive_']").click(function(event) {
    id = event.currentTarget.attributes.id.value.replace('btn_deactive_', '');
    if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái nhân viên')) {
            $("#deactive_form_" + id).submit();
        } else {
            $(`input#toggle_user_${id}`).bootstrapToggle('disable')
        }
});

</script>
@endpush