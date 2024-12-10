@extends('publicSite.master')
@section('content')
    <!-- Headline -->
    <div class="container">
        <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
            <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
                <span class="text-uppercase cl2 p-r-8">
                    {{ __('Trending Now') }}:
                </span>

                <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0 text-danger" data-in="fadeInDown"
                    data-out="fadeOutDown">
                    @foreach ($all_news_active as $news)
                        <span class="dis-inline-block slide100-txt-item animated visible-false">
                            {{ $news->title }}
                        </span>
                    @endforeach
                </span>
            </div>

            <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
                <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
                <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Feature post -->
    <section class="bg0">
        <div class="container">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-3 how1 pos-relative"
                        style="background-image: url({{ asset('upload/' . $news_active[0]->image) }});">
                        <a href="{{ route('magdetails' , $news_active[0]->id ) }}" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <a href="#"
                                class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                {{ $news_active[0]->getCategory->name }}
                            </a>

                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="{{ route('magdetails' ,$news_active[0]->id ) }}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    {{ $news_active[0]->title }}
                                </a>
                            </h3>

                            <span class="how1-child2">
                                <span class="f1-s-4 cl11">
                                    {{ $news_active[0]->created_at->month }}
                                </span>

                                <span class="f1-s-3 cl11 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3 cl11">
                                    {{ $news_active[0]->created_at->day }}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        <div class="col-12 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-4 how1 pos-relative"
                                style="background-image: url({{ asset('upload/' . $news_active[1]->image) }})">
                                <a href="{{ route('magdetails' , $news_active[1]->id) }}" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                    <a href="#"
                                        class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $news_active[1]->getCategory->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('magdetails' ,$news_active[1]->id ) }}"
                                            class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                            {{ $news_active[1]->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset('upload/' . $news_active[2]->image) }}) ">
                                <a href="{{ route('magdetails' , $news_active[2]->id) }}" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="#"
                                        class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $news_active[2]->getCategory->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('magdetails' , $news_active[2]->id) }}"
                                            class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{ $news_active[2]->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url({{ asset('upload/' . $news_active[3]->image) }}) ">
                                <a href="{{ route('magdetails' ,$news_active[3]->id ) }}" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <a href="#"
                                        class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                        {{ $news_active[3]->getCategory->name }}
                                    </a>

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('magdetails' , $news_active[3]->id) }}"
                                            class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{ $news_active[3]->title }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Post -->
    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">
                        <!-- Entertainment -->
                        @foreach ($categories as $parent_categories)
                            <div class="tab01 p-b-20">
                                <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                    <!-- Brand tab -->
                                    <h3 class="f1-m-2 cl12 tab01-title">
                                        {{ $parent_categories->name }}
                                    </h3>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach ($parent_categories->subCategories as $index => $sub_category)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $index === 0 ? 'active' : '' }}" data-toggle="tab" href="#tab1-{{ $sub_category->id }}" role="tab">{{ $sub_category->name }}</a>
                                        </li>
                                    @endforeach


                                        <li class="nav-item-more dropdown dis-none">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </a>

                                            <ul class="dropdown-menu">

                                            </ul>
                                        </li>
                                    </ul>

                                    <!--  -->
                                    <a href="{{ route('magcategory' , $parent_categories->id) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        {{ __('View all') }}
                                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                    </a>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content p-t-35">
                                    <!-- - -->
                                    @foreach ($parent_categories->subCategories as $index => $sub)
                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="tab1-{{ $sub->id }}" role="tabpanel">
                                                <div class="row">
                                                    @if (count($sub->getnews) > 0)
                                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                            <!-- Item post -->
                                                            <div class="m-b-30">
                                                                <a href="{{ route('magdetails' , $sub->getnews[0]->id) }}"
                                                                    class="wrap-pic-w hov1 trans-03">
                                                                    <img src="{{ asset('upload/' . $sub->getnews[0]->image) }}"
                                                                        alt="IMG">
                                                                </a>

                                                                <div class="p-t-20">
                                                                    <h5 class="p-b-5">
                                                                        <a href="{{ route('magdetails' ,$sub->getnews[0]->id ) }}"
                                                                            class="f1-m-3 cl2 hov-cl10 trans-03">
                                                                            {{ $sub->getnews[0]->title}}
                                                                        </a>
                                                                    </h5>

                                                                    <span class="cl8">
                                                                        <a href="#"
                                                                            class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                            {{ $sub->getnews[0]->getCategory->name}}                                                                        </a>

                                                                        <span class="f1-s-3 m-rl-3">
                                                                            -
                                                                        </span>

                                                                        <span class="f1-s-3">
                                                                            {{ $sub->getnews[0]->created_at}}                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                                        <!-- Item post -->
                                                        @for ($i = 1; $i <= 3; $i++)
                                                        
                                                            @if (count($sub->getnews) > $i)
                                                                <div class="flex-wr-sb-s m-b-30">
                                                                    <a href="{{ route('magdetails' , $sub->getnews[$i]->id) }}"
                                                                        class="size-w-1 wrap-pic-w hov1 trans-03">
                                                                        <img src="{{ asset('upload/'.$sub->getnews[$i]->image) }}"
                                                                        alt="IMG">
                                                                    </a>

                                                                    <div class="size-w-2">
                                                                        <h5 class="p-b-5">
                                                                            <a href="{{ route('magdetails' , $sub->getnews[$i]->id) }}"
                                                                                class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                               {{$sub->getnews[$i]->title}}
                                                                            </a>
                                                                        </h5>

                                                                        <span class="cl8">
                                                                            <a href="#"
                                                                                class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                                {{$sub->getnews[$i]->getCategory->name}}
                                                                            </a>

                                                                            <span class="f1-s-3 m-rl-3">
                                                                                -
                                                                            </span>

                                                                            <span class="f1-s-3">
                                                                                {{$sub->getnews[$i]->created_at}}
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!--  -->
                        <div>
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    {{ __('Most Popular') }}
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($popular_news as $news_)
                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                       {{++$count}}
                                    </div>

                                    <a href="{{ route('magdetails', $news_->id) }}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {{ $news_->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!--  -->
                        <div class="flex-c-s p-t-8">
                            <a href="#">
                                <img class="max-w-full" src="{{ asset('newsasset/images/banner-02.jpg') }}"
                                    alt="IMG">
                            </a>
                        </div>

                        <!--  -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner -->
    <div class="container">
        <div class="flex-c-c">
            <a href="#">
                <img class="max-w-full" src="{{ asset('newsasset/images/banner-01.jpg') }}" alt="IMG">
            </a>
        </div>
    </div>

    <!-- Latest -->
    <section class="bg0 p-t-60 p-b-35">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl3 tab01-title">
                            {{ __('Latest Articles') }}
                        </h3>
                    </div>

                    <div class="row p-t-35">
                        @foreach ($all_articles as $articles)
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="{{ route('magarticledetails' , $articles->id) }}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('upload/'.$articles->image) }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="{{ route('magarticledetails' , $articles->id) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {{ $articles->title }}
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                           {{"by :".$articles->getUser->name}}
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                           {{$articles->created_at->month."/".$articles->created_at->day}}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- Video -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-35">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    {{ __('Featured Video') }}
                                </h3>
                            </div>

                            <div>
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('newsasset/images/video-01.jpg') }}" alt="IMG">

                                    <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal"
                                        data-target="#modal-video-01">
                                        <span class="fab fa-youtube"></span>
                                    </button>
                                </div>

                                <div class="p-tb-16 p-rl-25 bg3">
                                    <h5 class="p-b-5">
                                        <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                            Music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl15">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            by John Alvarado
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Subscribe -->
                        <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                            <h5 class="f1-m-5 cl0 p-b-10">
                                Subscribe
                            </h5>

                            <p class="f1-s-1 cl0 p-b-25">
                                Get all latest content delivered to your email a few times a month.
                            </p>

                            <form class="size-a-9 pos-relative">
                                <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email"
                                    placeholder="Email">

                                <button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Tag -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-30">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Tags
                                </h3>
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Fashion') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Lifestyle') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Denim') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Streetstyle') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Crafts') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Magazine') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('News') }}
                                </a>

                                <a href="#"
                                    class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ __('Blogs') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
