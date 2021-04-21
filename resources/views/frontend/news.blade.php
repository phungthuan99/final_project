@extends('frontend.layout.layout')
@section('content')

<!-- Start breadcrumb -->
@foreach($settings as $setting)
<section class="breadCrumb"
    style="background: url(storage/{{$setting->breadcrumb}}); background-repeat: no-repeat;background-size:cover;">
    <div class="container">
        <h1 class="breadCrumb__title">Tin tức</h1>
    </div>
    <a href="{{route('home.index')}}" class="breadCrumb__homeIcon">
        <i class="fa fa-home"></i>
    </a>
</section>
@endforeach
<!-- End breadcrumb -->

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
                        <p class="news__item-date">{{$new->created_at->format('d-m-Y') }}</p>
                        <h2>
                            <a class="news__item-title"
                                href="{{route('news.news-detail',[$new->id])}}">{{$new -> title}}</a>
                        </h2>
                        <p class="news__item-desc">
                            {{$new->desc}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="" class="news__pagination">
            {{ $news->links() }}
        </nav>
    </div>
</section>
<!-- End news -->

@endsection