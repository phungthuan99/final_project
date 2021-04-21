@extends('./backend/layout/master')
@section('title','Quản Trị Quiz')
@section('title_page',"Chi Tiết Quiz Level $level Buổi $quiz->quiz")
@section('content')

<div class="col-12 m-auto">
<table class="table mt-5">
    @if(session('thongbao'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('thongbao') }}
      </div>
    @endif
    <thead>
        <tr>
            <th class="pl-3" scope="col">STT</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Người Tạo</th>
            <th style="width: 250px;" scope="col">Ngày Cập Nhật Mới Nhất</th>
            <th style="margin-right: 23px"  scope="col">
                @if(count($get_all_Question_test) < 10)
                    <a href="{{ route('quiz.create','level='.$level_id.'&quiz='.$quiz->quiz) }}">
                        <button style="width: 67%" type="button" class="border-primary btn btn-outline-primary"> Thêm Câu Hỏi</button>
                    </a>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($get_all_Question_test) == 0)
        <td colspan="7">
            <div class="mt-5 col-12 justify-content-center d-flex">
                <div class=" alert alert-danger" role="alert">
                    Không Có Câu Hỏi  Nào
                </div>
            </div>
        </td>
        @endif
        <?php  $i=1; ?>
        @foreach ($get_all_Question_test as $item)
            </tr>
        <td>{{ $i++ }}</td>
        <td>
            <p style="
            width: 250px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;">
            {{ str_replace("\'","'",str_replace('\"','"',$item->question)) }}
            </p>

        </td>
        <td style="width: 309px;">{{ $item->userName->fullname }}</td>
        <td style="width: 309px;">
            {{$item->updated_at->format('Y-m-d') }}
        </td>
            <td>
            <a href="{{ route('detail_question_test.edit',$item->id) }}">
                <button style="width: 109px;" type="button" class="border-primary btn btn-outline-primary"> Chi Tiết </button>
            </a>
            <a href="{{ route('quiz.edit',$item->id) }}">
                <button style="width: 106px;" type="button" class="border-warning btn btn-outline-warning">Sửa</button>
            </a>
            <a style="width: 106px;" id="btn_delete_{{ $item->id }}"class="btn border-danger  btn-outline-danger">Xóa</a>
            <form id="delete_form_{{ $item->id }}" action="{{ route('quiz.destroy',$item->id) }}"
            method="post"style="display: none;"
            >
            @method('DELETE')
            @csrf
            </form>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="container justify-content-center d-flex mt-5">
    {{-- {{$get_all_Question_test->links()}} --}}
</div>
@endsection

@push('scripts')
<script>
  $("a[id^='btn_delete_']").click(function (event) {
    id = event.currentTarget.attributes.id.value.replace('btn_delete_', '');
    if(confirm('Bạn có muốn xóa không')){
    $("#delete_form_" + id).submit();
    }
  });
</script>
@endpush
