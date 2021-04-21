@extends('./backend/layout/master')
@section('title','Quản Trị Thông Báo')
@section('title_page','Quản Trị Thông Báo')
@section('content')

    <div style="" class="row bg-light form-inline">
        <div class="col-12">
            <div style="margin-right: 93px" class="row justify-content-end">
            <div class="ml-5 dropdown pt-3 pb-4 mt-2">
                <button class="mr-2 border-success bg-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc Theo Trạng Thái
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/admin/notifications">Tất Cả</a>
                    <a class="dropdown-item" href="/admin/notifications?is_active=1">Đang Hiển Thị</a>
                    <a class="dropdown-item" href="/admin/notifications?is_active=2">Không Hiển Thị</a>
                    <a class="dropdown-item" href="/admin/notifications?status=1">Thông Báo Bình Thường</a>
                    <a class="dropdown-item" href="/admin/notifications?status=2">Thông Báo Quan Trọng</a>
                </div>
            </div>
        <div style="">
                <form class="form-inline pt-4">
                    <input name="title" class="border-success bg-white form-control mr-sm-2" type="text" placeholder="Tìm Theo Tiêu Đề " aria-label="Search">
                    <a>
                        <button class="border-success btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </a>
                </form>
        </div>
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
        <th class="pl-3" scope="col">STT</th>
        <th scope="col">Tiêu Đề</th>
        <th scope="col">Danh Mục</th>
        <th scope="col">Người Gửi</th>
        <th scope="col">Loại Thông Báo</th>
        <th scope="col">Trạng Thái</th>
        <th scope="col">
        <a href="{{ route('notifications.create') }}">
                <button type="button" class="border-primary  btn btn-outline-primary">Tạo Thông Báo</button>
            </a>
        </th>
      </tr>
    </thead>
    <tbody>
        @if(count($get_all_notification) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có kết Quả  Nào
                </div>
            </div>
        </td>
        @endif
        <?php $i=1 ?>
        @foreach ($get_all_notification as $item)
        <tr>
        <th class="pl-3" scope="row">{{ $i++ }}</th>
            <td>{{ $item->title }}</td>
            <td>{{ $item->categoryName->name }}</td>
            <td>{{ $item->userName->fullname }}</td>
            <td>
                @if($item->status == 1)
                <p class="text-primary">Thông Báo Bình Thường</p>
                @else
                <p class="text-danger">Thông Báo Quan Trọng</p>
                @endif
            </td>
            <td>
                @if($item->is_active == 1)
                <p class="text-primary">Đang Hiển Thị</p>
                @else
                <p class="text-warning">Không Hiển Thị</p>
                @endif
            </td>
            <td>
                <a href="{{ route('notifications.show',"$item->id") }}">
            <button type="button" class="border-info  btn btn-outline-info">Chi Tiết</button>
                </a>

                @if($item->is_active == 1)
                <a id="btn_delete_{{ $item->id }}"class="border-warning btn btn-outline-warning">Tắt</a>
                          <form id="delete_form_{{ $item->id }}" action="{{ route('notifications.destroy',$item->id) }}"
                            method="post"style="display: none;"
                            >
                            @method('DELETE')
                            <input type="hidden" name="is_active" value="2">
                            @csrf
                          </form>
                @else
                          <a id="btn_delete_{{ $item->id }}"class="border-success btn btn-outline-success">Bật</a>
                          <form id="delete_form_{{ $item->id }}" action="{{ route('notifications.destroy',$item->id) }}"
                            method="post"style="display: none;"
                            >
                            @method('DELETE')
                            <input type="hidden" name="is_active" value="1">
                            @csrf
                          </form>
                @endif
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
 <div class="container justify-content-center d-flex mt-5">
        {{$get_all_notification->links()}}
    </div>
@endsection

@push('scripts')
<script>
  $("a[id^='btn_delete_']").click(function (event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    $("#delete_form_" + id).submit();
  });
</script>
@endpush