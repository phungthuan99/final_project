@extends('frontend.layout.layout')
@section('content')

<section class="auth__form">
    <div class="container">
       
        <div class="row align-items-center justify-content-center">
            <div class="col-6">
                <h1 class="">Đăng Ký Kiểm Tra Đầu Vào</h1>
                @if(session('thongbao'))
                <div class="alert alert-primary" role="alert">
                    {{session('thongbao')}}
                </div>
                @endif
                <form enctype="multipart/form-data" class="card-body" action="{{route('enrollment.postForm')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        {!! ShowErrors($errors,'fullname') !!}
                        <input class="form-control" type="text" name="fullname" id="full_name" value="{{ old('fullname')}}"
                            placeholder="Họ và tên">
                    </div>
                    <div class="form-group">
                        {!! ShowErrors($errors,'phone') !!}
                        <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone')}}"
                            placeholder="Số điện thoại" >
                    </div>
                    <div class="form-group">
                        {!! ShowErrors($errors,'email') !!}
                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email')}}"
                            placeholder="Email" >
                    </div>
                    <div class="form-group">
                        {!! ShowErrors($errors,'address') !!}
                        <input class="form-control" type="address" name="address" id="address" value="{{ old('address')}}"
                            placeholder="Địa chỉ" >
                    </div>
                    <div class="form-group">
                        {!! ShowErrors($errors,'date_of_birth') !!}
                        <input class="form-control" type="text" onfocus="(this.type='date')" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth')}}"
                            placeholder="Ngày sinh">
                    </div>
                    <div class="form-group">
                        {!! ShowErrors($errors,'level_id') !!}
                        <select style="background-color:#f7f2ea; height:65px; border:0px; padding-left:30px;font-size: 18px" class="form-control" name="level_id">
                            <option value="">Level</option>
                            @foreach ($get_all_level ?? '' as $item)
                            <option value="{{ $item->id }}">{{ $item->level }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! ShowErrors($errors,'slot') !!}
                        <select style="background-color:#f7f2ea; height:65px; border:0px; padding-left:30px; font-size: 18px" class="form-control" name="slot">
                            <option value="">Ca học mong muốn</option>
                            <option value="1">Ca 1: 7h15-9h15</option>
                            <option value="2">Ca 2: 9h30-11h30</option>
                            <option value="3">Ca 3: 13h30-15h30</option>
                            <option value="4">Ca 4: 15h45-17h45</option>
                            <option value="5">Ca 5: 18h00-20h00</option>
                            <option value="6">Ca 6: 20h15-22h15</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary col-5 center-block">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection