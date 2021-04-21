@extends('frontend.layout.layout')
@section('content')

<!-- Start main slider -->
<section class="homeSlider">
    <div class="homeSlider-carousel">
        <div class="homeSlider__item">
            <div class="homeSlider__image">
                @foreach ($settings as $setting)
                <img src="storage/{{$setting->banner}}" alt="Home Slide">
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End main slider -->

<!-- Start welcome -->
<section class="welcome">
    <div class="container">
        <div class="row align-items-end justify-content-between">
            @foreach($settings as $setting)
            <div class="col-md-5">
                <div class="welcome__image ">
                    <img src="storage/{{$setting->welcome_image}}" alt="welcome">
                </div>
            </div>
            <div class="col-md-6">
                <div class="welcome__content ">
                    <h1 class="section__title">{{$setting->welcome}}</h1>
                    <p class="welcome__content-desc">{{$setting->welcome_content}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End welcome -->

<!-- Start programs -->
<section class="programs">
    <div class="container">
        <h1 class="section__title">Các level</h1>
        <div class="row">
          @foreach ($levels as $level)
          <div class="col-12 col-md-4 col-lg-4">
            <div class="programs__block">
                <div class="programs__block-image">
                    <img src="storage/{{$level->image}}" alt="programs">
                </div>
                <div class="programs__block-text">
                    <h5 class="programs__block-name">Level: {{$level->level}}</h5>
                    <p class="programs__block-desc">{{$level->description}}</p>
                </div>
            </div>
        </div>
          @endforeach
        </div>
    </div>
</section>
<!-- End programs -->


<!-- Start teacher -->
<section class="teacher" >
    <div class="container">
        <h1 class="section__title">Đội ngũ giảng viên</h1>
        <div class="teacher-carousel owl-carousel">
           @foreach($teachers as $teacher)
           <div class="teacher__item">
                <div class="teacher__item-img">
                    <img src="storage/{{$teacher->avatar}}" alt="Teacher Image">
                </div>
                <div class="teacher__item-info">
                    <p class="teacher__position">Giảng Viên</p>
                    <h3 class="teacher__name">{{$teacher->fullname}}</h3>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
<!-- End teacher -->

<section class="about__number" style="background-color:#f7f2ea">
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

<!-- Start news -->
<section class="news">
    <div class="container">
        <h1 class="section__title">Tin tức</h1>
        <div class="row">
            @foreach($news as $new)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="news__item">
                    <div class="news__item-image">
                        <a href="{{route('news.news-detail',[$new->id])}}">
                            <img src="storage/{{$new->image}}" alt="news">
                        </a>
                    </div>
                    <div class="news__item-info">
                        <p class="news__item-date">{{$new->created_at->format('d-m-Y')}}</p>
                        <h2>
                            <a class="news__item-title" href="{{route('news.news-detail',[$new->id])}}">
                                {{$new -> title}}</a>
                        </h2>
                        <p class="news__item-desc">{{$new->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End news -->

@endsection