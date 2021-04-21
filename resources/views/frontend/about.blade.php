@extends('frontend.layout.layout')
@section('content')
     <!-- Start breadcrumb -->
     @foreach($settings as $setting)
     <section class="breadCrumb" style="background: url(storage/{{$setting->breadcrumb}}); background-repeat: no-repeat;background-size:cover;">
            <div class="container">
                <h1 class="breadCrumb__title">Giới thiệu</h1>
            </div>
            <a href="{{route('home.index')}}" class="breadCrumb__homeIcon">
                <i class="fa fa-home"></i>
            </a>
    </section>
    @endforeach
        <!-- End breadcrumb -->

        <!-- Start about content -->

        <section class="about__content">
            <div class="container">
                <div class="row">
                    @foreach ($news as $new)
                    <div class="col-8">
                        <h1 class="section__title">
                          {{$new->title}}
                        </h1>
                    </div>
                </div>
                <div class="about__content-text">
                    {!!nl2br(e($new->content))!!}

                </div>
                @endforeach
            </div>
        </section>
        <!-- End about content -->

        <section class="about__number">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="about__number-item">
                            <p class="number">{{$students->count()}}</p>
                            <p class="item__name">Học viên</p>
                            <div class="lines lines--orange"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about__number-item">
                            <p class="number">{{$teachers->count()}}</p>
                            <p class="item__name">Giảng viên</p>
                            <div class="lines lines--yellow"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about__number-item">
                            <p class="number">{{$levels->count()}}</p>
                            <p class="item__name">Level</p>
                            <div class="lines lines--violet"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        

      
@endsection()