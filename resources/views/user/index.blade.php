@extends('layouts.app')
@section('content')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    <h1 class="text-white">
                        <span>1500+</span> Jobs posted last week
                    </h1>
                    <form action="/search" class="search-form-area">
                        <div class="row justify-content-center form-wrap">
                            <div class="col-lg-4 form-cols">
                                <input type="text" class="form-control" name="search"
                                       placeholder="what are you looking for?">
                            </div>
                            <div class="col-lg-3 form-cols">
                                <div class="default-select" id="default-selects2">

                                    <select class="selectpicker show-tick" data-live-search="true"
                                            name="select_area_search"
                                            id="select_area_search">
                                        <option value="-1" selected>Select Area</option>
                                        @if(count($location) > 0)
                                            @foreach($location as $locate)
                                                <option value="{{$locate->name}}">{{$locate->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 form-cols">
                                <div class="default-select" id="default-selects2">

                                    <select class="selectpicker show-tick" data-live-search="true"
                                            id="select_category_search" name="select_category_search">
                                        <option value="-1" selected>All Category</option>
                                        @if(count($all_job_category) > 0)
                                            @foreach($all_job_category as $all_category)
                                                <option value="{{$all_category->name_job_category}}">{{$all_category->name_job_category}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 form-cols">
                                <button type="submit" class="btn btn-info" id="btn_search">
                                    <span class="lnr lnr-magnifier"></span> Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <style>
                        .text-white a {
                            color: #e4cd8d;
                        }

                    </style>
                    <p class="text-white"><span>Search by tags:</span>
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'IT - Software') ?>">
                            IT - Software
                        </a>,
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Banking') ?>">
                            Banking
                        </a>,
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Finance-Investment') ?>">
                            Finance/Investment
                        </a>,
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Marketing') ?>">
                            Marketing
                        </a>,
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Internet-Online Media') ?>">
                            Internet/Online Media
                        </a>,
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Insurance') ?>">
                            Insurance
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start features Area -->
    <section class="features-area">
        <div class="container">
            {{--<div class="row">--}}
            {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="single-feature">--}}
            {{--<h4>Searching</h4>--}}
            {{--<p>--}}
            {{--Lorem ipsum dolor sit amet, consectetur adipisicing.--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="single-feature">--}}
            {{--<h4>Applying</h4>--}}
            {{--<p>--}}
            {{--Lorem ipsum dolor sit amet, consectetur adipisicing.--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="single-feature">--}}
            {{--<h4>Security</h4>--}}
            {{--<p>--}}
            {{--Lorem ipsum dolor sit amet, consectetur adipisicing.--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="single-feature">--}}
            {{--<h4>Notifications</h4>--}}
            {{--<p>--}}
            {{--Lorem ipsum dolor sit amet, consectetur adipisicing.--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>																		--}}
            {{--</div>--}}
        </div>
    </section>
    <!-- End features Area -->

    <!-- Start popular-post Area -->
    {{--<section class="popular-post-area pt-100">--}}
    {{--<div class="container">--}}
    {{--<div class="row align-items-center">--}}
    {{--<div class="active-popular-post-carusel">--}}
    {{--<div class="single-popular-post d-flex flex-row">--}}
    {{--<div class="thumb">--}}
    {{--<img class="img-fluid" src="{{ asset('img/p1.png') }}" alt="">--}}
    {{--<a class="btns text-uppercase" href="#">view job post</a>--}}
    {{--</div>--}}
    {{--<div class="details">--}}
    {{--<a href="/details"><h4>Creative Designer</h4></a>--}}
    {{--<h6>Los Angeles</h6>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>	--}}
    {{--<div class="single-popular-post d-flex flex-row">--}}
    {{--<div class="thumb">--}}
    {{--<img src="{{ asset('img/p2.png') }}" alt="">--}}
    {{--<a class="btns text-uppercase" href="#">view job post</a>--}}
    {{--</div>--}}
    {{--<div class="details">--}}
    {{--<a href="#"><h4>Creative Designer</h4></a>--}}
    {{--<h6>Los Angeles</h6>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="single-popular-post d-flex flex-row">--}}
    {{--<div class="thumb">--}}
    {{--<img src="{{ asset('img/p1.png') }}" alt="">--}}
    {{--<a class="btns text-uppercase" href="#">view job post</a>--}}
    {{--</div>--}}
    {{--<div class="details">--}}
    {{--<a href="#"><h4>Creative Designer</h4></a>--}}
    {{--<h6>Los Angeles</h6>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>	--}}
    {{--<div class="single-popular-post d-flex flex-row">--}}
    {{--<div class="thumb">--}}
    {{--<img src="{{ asset('img/p2.png') }}" alt="">--}}
    {{--<a class="btns text-uppercase" href="#">view job post</a>--}}
    {{--</div>--}}
    {{--<div class="details">--}}
    {{--<a href="#"><h4>Creative Designer</h4></a>--}}
    {{--<h6>Los Angeles</h6>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>	--}}
    {{--<div class="single-popular-post d-flex flex-row">--}}
    {{--<div class="thumb">--}}
    {{--<img src="{{ asset('img/p1.png') }}" alt="">--}}
    {{--<a class="btns text-uppercase" href="#">view job post</a>--}}
    {{--</div>--}}
    {{--<div class="details">--}}
    {{--<a href="#"><h4>Creative Designer</h4></a>--}}
    {{--<h6>Los Angeles</h6>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>	--}}
    {{--<div class="single-popular-post d-flex flex-row">--}}
    {{--<div class="thumb">--}}
    {{--<img src="{{ asset('img/p2.png') }}" alt="">--}}
    {{--<a class="btns text-uppercase" href="#">view job post</a>--}}
    {{--</div>--}}
    {{--<div class="details">--}}
    {{--<a href="#"><h4>Creative Designer</h4></a>--}}
    {{--<h6>Los Angeles</h6>--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>																																							--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>	--}}
    {{--</section>--}}
    <!-- End popular-post Area -->

    <!-- Start feature-cat Area -->
    <section class="feature-cat-area pt-100" id="category">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Featured Job Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'IT - Software') ?>">
                            <img src="{{ asset('img/o1.png') }}" alt="">
                        </a>
                        <p>IT - Software</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Banking') ?>">
                            <img src="{{ asset('img/o2.png') }}" alt="">
                        </a>
                        <p>Banking</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Finance-Investment') ?>">
                            <img src="{{ asset('img/o3.png') }}" alt="">
                        </a>
                        <p>Finance/Investment</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Marketing') ?>">
                            <img src="{{ asset('img/o4.png') }}" alt="">
                        </a>
                        <p>Marketing</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Internet-Online Media') ?>">
                            <img src="{{ asset('img/o5.png') }}" alt="">
                        </a>
                        <p>Internet/Online Media</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-fcat">
                        <a href="/search/<?php echo preg_replace('/\s+/', '', 'Insurance') ?>">
                            <img src="{{ asset('img/o6.png') }}" alt="">
                        </a>
                        <p>Insurance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature-cat Area -->

    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">

                    <style>
                        ul a:hover {
                            text-decoration: none;
                        }

                        ul a:focus {
                            text-decoration: none;


                        }

                        .post-list .cat-list li a {
                            text-transform: none;
                            word-spacing: 300px;
                            font-weight: 300;
                            color: #222;
                        }
                    </style>
                    <ul class="cat-list" style="text-decoration: none;  ">
                        <a data-toggle="tab" href="#home1">
                            <li class="active" >Recent</li>
                        </a>
                        <a data-toggle="tab" href="#menu1">
                            <li>Full-time</li>
                        </a>
                        <a data-toggle="tab" href="#menu2">
                            <li>Intern</li>
                        </a>
                        <a data-toggle="tab" href="#menu3">
                            <li>Part-time</li>
                        </a>
                    </ul>

                    <div class="tab-content">
                        <div id="home1" class="tab-pane fade in active">
                            {{--Recent--}}
                            @guest
                                @if((count($post_news_by_date)) > 0)
                                    @foreach($post_news_by_date as $post_date)
                                        <div class="single-post d-flex flex-row">
                                            <div class="thumb">
                                                <img src="{{ asset('img/post.png') }}" alt="">
                                                <ul class="tags">
                                                    {{--<li>--}}
                                                    {{--<a href="#">Art</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Media</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Design</a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </div>
                                            <div class="details">
                                                <div class="title d-flex flex-row justify-content-between">
                                                    <div class="col-md-11 col-sm-11">
                                                        <div class="titles">
                                                            <a href="/details/{{$post_date->id_posts}}">
                                                                <h4>{{$post_date->job_title}}</h4></a>
                                                            <h6>{{$post_date->company_name}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-1">
                                                        <button type="button"
                                                                class="btn btn-primary"
                                                                data-toggle="popover" title="Info"
                                                                data-placement="left"
                                                                data-content="Please login to saved job !!! <hr/>   <a class='ticker-btn' href='{{ route('login') }}'>Login</a> ">
                                                            <span class="lnr lnr-heart"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p>
                                                    {{$post_date->description_work}}
                                                </p>
                                                <h5>Job Nature: {{$post_date->name_type_work}}</h5>
                                                <p class="address"><span
                                                            class="lnr lnr-map"></span> {{$post_date->location_work}}
                                                </p>
                                                <p class="address"><span
                                                            class="lnr lnr-database"></span> {{$post_date->name_level_salary}}
                                                </p>
                                                <p class="address"><span class="lnr lnr-clock"></span> Time for
                                                    submission:
                                                    <b>{{$post_date->time_for_submission}}</b></p>
                                                <p class="address"><span class="lnr lnr-shirt"></span> Number of
                                                    recruitment: <b>{{$post_date->number_recruits }}</b> people</p>
                                                <p class="address"><span class="lnr lnr-user"></span> Gender
                                                    : {{$post_date->gender }} </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-6">{{$post_news_by_date->links()}}</div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                @else
                                    <p>Not found any post news</p>
                                @endif
                            @else

                                @if(count($post_news_by_date) > 0)
                                    @if(count($saved_jobs) > 0)
                                        @foreach($post_news_by_date as $post_date)
                                            <?php
                                            $flag = false;
                                            ?>
                                            @foreach($saved_jobs as $saved)

                                                @if($saved->id_post_news == $post_date->id_posts and $saved->id_candidate == auth()->user()->id)
                                                    <?php
                                                    $flag = true;
                                                    ?>
                                                @endif
                                            @endforeach
                                            @if($flag == true)
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_date->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_date->id_posts}}">
                                                                            <h4>{{$post_date->job_title}}</h4></a>
                                                                        <h6>{{$post_date->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <button type="button"
                                                                            class="btn btn-warning"
                                                                            data-toggle="popover" title="Info"
                                                                            data-placement="left"
                                                                            data-content="Watch your saved jobs  <hr/>   <a class='ticker-btn' href='/my-career-center/my-profile'>Here</a> ">
                                                                        <span class="lnr lnr-heart"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_date->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_date->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_date->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_date->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_date->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment: <b>{{$post_date->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_date->gender }} </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_date->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_date->id_posts}}">
                                                                            <h4>{{$post_date->job_title}}</h4></a>
                                                                        <h6>{{$post_date->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <form method="POST">
                                                                        <a>
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    name="btnSavedJobs"
                                                                                    data-jobs-id-candidate="{{auth()->user()->id}}"
                                                                                    data-jobs-id-postnews="{{$post_date->id_posts}}">
                                                                                <span class="lnr lnr-heart"></span>
                                                                            </button>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_date->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_date->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_date->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_date->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_date->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment: <b>{{$post_date->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_date->gender }} </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-6">{{$post_news_by_date->links()}}</div>
                                            <div class="col-sm-1"></div>
                                        </div>
                                    @else
                                        <p>Not found any post news</p>
                                    @endif
                                @endif
                            @endguest
                            {{--end Recent--}}
                        </div>

                        <div id="menu1" class="tab-pane fade">
                            {{--Full Time--}}
                            @guest
                                @if((count($post_news_by_full_time)) > 0)
                                    @foreach($post_news_by_full_time as $post_news_by_full)
                                        <div class="single-post d-flex flex-row">
                                            <div class="thumb">
                                                <img src="{{ asset('img/post.png') }}" alt="">
                                                <ul class="tags">
                                                    {{--<li>--}}
                                                    {{--<a href="#">Art</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Media</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Design</a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </div>
                                            <div class="details">
                                                <div class="title d-flex flex-row justify-content-between">
                                                    <div class="col-md-11 col-sm-11">
                                                        <div class="titles">
                                                            <a href="/details/{{$post_news_by_full->id_posts}}">
                                                                <h4>{{$post_news_by_full->job_title}}</h4></a>
                                                            <h6>{{$post_news_by_full->company_name}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-1">
                                                        <button type="button"
                                                                class="btn btn-primary"
                                                                data-toggle="popover" title="Info"
                                                                data-placement="left"
                                                                data-content="Please login to saved job !!! <hr/>   <a class='ticker-btn' href='{{ route('login') }}'>Login</a> ">
                                                            <span class="lnr lnr-heart"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p>
                                                    {{$post_news_by_full->description_work}}
                                                </p>
                                                <h5>Job Nature: {{$post_news_by_full->name_type_work}}</h5>
                                                <p class="address"><span
                                                            class="lnr lnr-map"></span> {{$post_news_by_full->location_work}}
                                                </p>
                                                <p class="address"><span
                                                            class="lnr lnr-database"></span> {{$post_news_by_full->name_level_salary}}
                                                </p>
                                                <p class="address"><span class="lnr lnr-clock"></span> Time for
                                                    submission:
                                                    <b>{{$post_news_by_full->time_for_submission}}</b></p>
                                                <p class="address"><span class="lnr lnr-shirt"></span> Number of
                                                    recruitment: <b>{{$post_news_by_full->number_recruits }}</b> people
                                                </p>
                                                <p class="address"><span class="lnr lnr-user"></span> Gender
                                                    : {{$post_news_by_full->gender }} </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-6">{{$post_news_by_full_time->links()}}</div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                @else
                                    <p>Not found any post news</p>
                                @endif
                            @else

                                @if(count($post_news_by_full_time) > 0)
                                    @if(count($saved_jobs) > 0)
                                        @foreach($post_news_by_full_time as $post_news_by_full)
                                            <?php
                                            $flag = false;
                                            ?>
                                            @foreach($saved_jobs as $saved)

                                                @if($saved->id_post_news == $post_news_by_full->id_posts and $saved->id_candidate == auth()->user()->id)
                                                    <?php
                                                    $flag = true;
                                                    ?>
                                                @endif
                                            @endforeach
                                            @if($flag == true)
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_news_by_full->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_news_by_full->id_posts}}">
                                                                            <h4>{{$post_news_by_full->job_title}}</h4>
                                                                        </a>
                                                                        <h6>{{$post_news_by_full->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <button type="button"
                                                                            class="btn btn-warning"
                                                                            data-toggle="popover" title="Info"
                                                                            data-placement="left"
                                                                            data-content="Watch your saved jobs  <hr/>   <a class='ticker-btn' href='/my-career-center/my-profile'>Here</a> ">
                                                                        <span class="lnr lnr-heart"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_news_by_full->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_news_by_full->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_news_by_full->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_news_by_full->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_news_by_full->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment: <b>{{$post_news_by_full->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_news_by_full->gender }} </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_news_by_full->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_news_by_full->id_posts}}">
                                                                            <h4>{{$post_news_by_full->job_title}}</h4>
                                                                        </a>
                                                                        <h6>{{$post_news_by_full->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <form method="POST">
                                                                        <a>
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    name="btnSavedJobs"
                                                                                    data-jobs-id-candidate="{{auth()->user()->id}}"
                                                                                    data-jobs-id-postnews="{{$post_news_by_full->id_posts}}">
                                                                                <span class="lnr lnr-heart"></span>
                                                                            </button>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_news_by_full->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_news_by_full->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_news_by_full->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_news_by_full->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_news_by_full->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment: <b>{{$post_news_by_full->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_news_by_full->gender }} </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-6">{{$post_news_by_full_time->links()}}</div>
                                            <div class="col-sm-1"></div>
                                        </div>
                                    @else
                                        <p>Not found any post news</p>
                                    @endif
                                @endif

                            @endguest
                            {{--End Full Time--}}
                        </div>

                        <div id="menu2" class="tab-pane fade">
                            {{-- Internship--}}
                            @guest
                                @if((count($post_news_by_internship)) > 0)
                                    @foreach($post_news_by_internship as $post_news_by_intern)
                                        <div class="single-post d-flex flex-row">
                                            <div class="thumb">
                                                <img src="{{ asset('img/post.png') }}" alt="">
                                                <ul class="tags">
                                                    {{--<li>--}}
                                                    {{--<a href="#">Art</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Media</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Design</a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </div>
                                            <div class="details">
                                                <div class="title d-flex flex-row justify-content-between">
                                                    <div class="col-md-11 col-sm-11">
                                                        <div class="titles">
                                                            <a href="/details/{{$post_news_by_intern->id_posts}}">
                                                                <h4>{{$post_news_by_intern->job_title}}</h4></a>
                                                            <h6>{{$post_news_by_intern->company_name}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-1">
                                                        <button type="button"
                                                                class="btn btn-primary"
                                                                data-toggle="popover" title="Info"
                                                                data-placement="left"
                                                                data-content="Please login to saved job !!! <hr/>   <a class='ticker-btn' href='{{ route('login') }}'>Login</a> ">
                                                            <span class="lnr lnr-heart"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p>
                                                    {{$post_news_by_intern->description_work}}
                                                </p>
                                                <h5>Job Nature: {{$post_news_by_intern->name_type_work}}</h5>
                                                <p class="address"><span
                                                            class="lnr lnr-map"></span> {{$post_news_by_intern->location_work}}
                                                </p>
                                                <p class="address"><span
                                                            class="lnr lnr-database"></span> {{$post_news_by_intern->name_level_salary}}
                                                </p>
                                                <p class="address"><span class="lnr lnr-clock"></span> Time for
                                                    submission:
                                                    <b>{{$post_news_by_intern->time_for_submission}}</b></p>
                                                <p class="address"><span class="lnr lnr-shirt"></span> Number of
                                                    recruitment: <b>{{$post_news_by_intern->number_recruits }}</b>
                                                    people</p>
                                                <p class="address"><span class="lnr lnr-user"></span> Gender
                                                    : {{$post_news_by_intern->gender }} </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-6">{{$post_news_by_internship->links()}}</div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                @else
                                    <p>Not found any post news</p>
                                @endif
                            @else

                                @if(count($post_news_by_internship) > 0)
                                    @if(count($saved_jobs) > 0)
                                        @foreach($post_news_by_internship as $post_news_by_intern)
                                            <?php
                                            $flag = false;
                                            ?>
                                            @foreach($saved_jobs as $saved)

                                                @if($saved->id_post_news == $post_news_by_intern->id_posts and $saved->id_candidate == auth()->user()->id)
                                                    <?php
                                                    $flag = true;
                                                    ?>
                                                @endif
                                            @endforeach
                                            @if($flag == true)
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_news_by_intern->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_news_by_intern->id_posts}}">
                                                                            <h4>{{$post_news_by_intern->job_title}}</h4>
                                                                        </a>
                                                                        <h6>{{$post_news_by_intern->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <button type="button"
                                                                            class="btn btn-warning"
                                                                            data-toggle="popover" title="Info"
                                                                            data-placement="left"
                                                                            data-content="Watch your saved jobs  <hr/>   <a class='ticker-btn' href='/my-career-center/my-profile'>Here</a> ">
                                                                        <span class="lnr lnr-heart"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_news_by_intern->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_news_by_intern->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_news_by_intern->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_news_by_intern->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_news_by_intern->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment:
                                                            <b>{{$post_news_by_intern->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_news_by_intern->gender }} </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_news_by_intern->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_news_by_intern->id_posts}}">
                                                                            <h4>{{$post_news_by_intern->job_title}}</h4>
                                                                        </a>
                                                                        <h6>{{$post_news_by_intern->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <form method="POST">
                                                                        <a>
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    name="btnSavedJobs"
                                                                                    data-jobs-id-candidate="{{auth()->user()->id}}"
                                                                                    data-jobs-id-postnews="{{$post_news_by_intern->id_posts}}">
                                                                                <span class="lnr lnr-heart"></span>
                                                                            </button>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_news_by_intern->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_news_by_intern->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_news_by_intern->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_news_by_intern->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_news_by_intern->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment:
                                                            <b>{{$post_news_by_intern->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_news_by_intern->gender }} </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-6">{{$post_news_by_internship->links()}}</div>
                                            <div class="col-sm-1"></div>
                                        </div>

                                    @endif
                                @else
                                    <p>Not found any post news</p>
                                @endif

                            @endguest
                            {{--End Internship--}}
                        </div>

                        <div id="menu3" class="tab-pane fade">
                            {{--Part Time--}}
                            @guest
                                @if((count($post_news_by_part_time)) > 0)
                                    @foreach($post_news_by_part_time as $post_news_by_part)
                                        <div class="single-post d-flex flex-row">
                                            <div class="thumb">
                                                <img src="{{ asset('img/post.png') }}" alt="">
                                                <ul class="tags">
                                                    {{--<li>--}}
                                                    {{--<a href="#">Art</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Media</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li>--}}
                                                    {{--<a href="#">Design</a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </div>
                                            <div class="details">
                                                <div class="title d-flex flex-row justify-content-between">
                                                    <div class="col-md-11 col-sm-11">
                                                        <div class="titles">
                                                            <a href="/details/{{$post_news_by_part->id_posts}}">
                                                                <h4>{{$post_news_by_part->job_title}}</h4></a>
                                                            <h6>{{$post_news_by_part->company_name}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-1">
                                                        <button type="button"
                                                                class="btn btn-primary"
                                                                data-toggle="popover" title="Info"
                                                                data-placement="left"
                                                                data-content="Please login to saved job !!! <hr/>   <a class='ticker-btn' href='{{ route('login') }}'>Login</a> ">
                                                            <span class="lnr lnr-heart"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <p>
                                                    {{$post_news_by_part->description_work}}
                                                </p>
                                                <h5>Job Nature: {{$post_news_by_part->name_type_work}}</h5>
                                                <p class="address"><span
                                                            class="lnr lnr-map"></span> {{$post_news_by_part->location_work}}
                                                </p>
                                                <p class="address"><span
                                                            class="lnr lnr-database"></span> {{$post_news_by_part->name_level_salary}}
                                                </p>
                                                <p class="address"><span class="lnr lnr-clock"></span> Time for
                                                    submission:
                                                    <b>{{$post_news_by_part->time_for_submission}}</b></p>
                                                <p class="address"><span class="lnr lnr-shirt"></span> Number of
                                                    recruitment: <b>{{$post_news_by_part->number_recruits }}</b>
                                                    people</p>
                                                <p class="address"><span class="lnr lnr-user"></span> Gender
                                                    : {{$post_news_by_part->gender }} </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-6">{{$post_news_by_part_time->links()}}</div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                @else
                                    <p>Not found any post news</p>
                                @endif
                            @else

                                @if(count($post_news_by_part_time) > 0)
                                    @if(count($saved_jobs) > 0)
                                        @foreach($post_news_by_part_time as $post_news_by_part)
                                            <?php
                                            $flag = false;
                                            ?>
                                            @foreach($saved_jobs as $saved)

                                                @if($saved->id_post_news == $post_news_by_part->id_posts and $saved->id_candidate == auth()->user()->id)
                                                    <?php
                                                    $flag = true;
                                                    ?>
                                                @endif
                                            @endforeach
                                            @if($flag == true)
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_news_by_part->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_news_by_part->id_posts}}">
                                                                            <h4>{{$post_news_by_part->job_title}}</h4>
                                                                        </a>
                                                                        <h6>{{$post_news_by_part->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <button type="button"
                                                                            class="btn btn-warning"
                                                                            data-toggle="popover" title="Info"
                                                                            data-placement="left"
                                                                            data-content="Watch your saved jobs  <hr/>   <a class='ticker-btn' href='/my-career-center/my-profile'>Here</a> ">
                                                                        <span class="lnr lnr-heart"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_news_by_part->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_news_by_part->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_news_by_part->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_news_by_part->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_news_by_part->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment:
                                                            <b>{{$post_news_by_part->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_news_by_part->gender }} </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="single-post d-flex flex-row">
                                                    <div class="thumb">
                                                        <img src="{{ asset('img/post.png') }}" alt="">
                                                        <div hidden>{{$name = $post_news_by_part->name_job_category}}</div>
                                                        <ul class="tags" id="tags_view">


                                                            {{--<li>--}}
                                                            {{--<a href="#">Media</a>--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                            {{--<a href="#">Design</a>--}}
                                                            {{--</li>--}}

                                                        </ul>

                                                    </div>
                                                    <div class="details">
                                                        <form role="form">
                                                            <div class="title d-flex flex-row justify-content-between">
                                                                <div class="col-md-11 col-sm-11">
                                                                    <div class="titles">
                                                                        <a href="/details/{{$post_news_by_part->id_posts}}">
                                                                            <h4>{{$post_news_by_part->job_title}}</h4>
                                                                        </a>
                                                                        <h6>{{$post_news_by_part->company_name}}</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1 col-sm-1">
                                                                    <form method="POST">
                                                                        <a>
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    name="btnSavedJobs"
                                                                                    data-jobs-id-candidate="{{auth()->user()->id}}"
                                                                                    data-jobs-id-postnews="{{$post_news_by_part->id_posts}}">
                                                                                <span class="lnr lnr-heart"></span>
                                                                            </button>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <p>
                                                            {{$post_news_by_part->description_work}}
                                                        </p>
                                                        <h5>Job Nature: {{$post_news_by_part->name_type_work}}</h5>
                                                        <p class="address"><span
                                                                    class="lnr lnr-map"></span> {{$post_news_by_part->location_work}}
                                                        </p>
                                                        <p class="address"><span
                                                                    class="lnr lnr-database"></span> {{$post_news_by_part->name_level_salary}}
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-clock"></span> Time
                                                            for
                                                            submission:
                                                            <b>{{$post_news_by_part->time_for_submission}}</b></p>
                                                        <p class="address"><span class="lnr lnr-shirt"></span>
                                                            Number of
                                                            recruitment:
                                                            <b>{{$post_news_by_part->number_recruits }}</b>
                                                            people
                                                        </p>
                                                        <p class="address"><span class="lnr lnr-user"></span> Gender
                                                            : {{$post_news_by_part->gender }} </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-6">{{$post_news_by_part_time->links()}}</div>
                                            <div class="col-sm-1"></div>
                                        </div>

                                    @endif
                                @else
                                    <p>Not found any post news</p>
                                @endif

                            @endguest
                            {{--End Part Time--}}
                        </div>
                    </div>

                </div>
                {{--Include Sidebar--}}
                @include('inc.sidebar')
            </div>
        </div>
    </section>
    <!-- End post Area -->


    <!-- Start callto-action Area -->
    {{--<section class="callto-action-area section-gap" id="join">--}}
    {{--<div class="container">--}}
    {{--<div class="row d-flex justify-content-center">--}}
    {{--<div class="menu-content col-lg-9">--}}
    {{--<div class="title text-center">--}}
    {{--<h1 class="mb-10 text-white">Join us today without any hesitation</h1>--}}
    {{--<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
    {{--tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud--}}
    {{--exercitation.</p>--}}
    {{--<a class="primary-btn" href="#">I am a Candidate</a>--}}
    {{--<a class="primary-btn" href="#">Request Free Demo</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <!-- End calto-action Area -->

    <!-- Start download Area -->
    {{--<section class="download-area section-gap" id="app">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-6 download-left">--}}
    {{--<img class="img-fluid" src="{{ asset('img/d1.png') }}" alt="">--}}
    {{--</div>--}}
    {{--<div class="col-lg-6 download-right">--}}
    {{--<h1>Download the <br>--}}
    {{--Job Listing App Today!</h1>--}}
    {{--<p class="subs">--}}
    {{--It won’t be a bigger problem to find one video game lover in your neighbor. Since the--}}
    {{--introduction of Virtual Game, it has been achieving great heights so far as its popularity and--}}
    {{--technological advancement are concerned.--}}
    {{--</p>--}}
    {{--<div class="d-flex flex-row">--}}
    {{--<div class="buttons">--}}
    {{--<i class="fa fa-apple" aria-hidden="true"></i>--}}
    {{--<div class="desc">--}}
    {{--<a href="#">--}}
    {{--<p>--}}
    {{--<span>Available</span> <br>--}}
    {{--on App Store--}}
    {{--</p>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="buttons">--}}
    {{--<i class="fa fa-android" aria-hidden="true"></i>--}}
    {{--<div class="desc">--}}
    {{--<a href="#">--}}
    {{--<p>--}}
    {{--<span>Available</span> <br>--}}
    {{--on Play Store--}}
    {{--</p>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <!-- End download Area -->
@endsection

@section('scripts-first')
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
@endsection

@section('scripts-end')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('js/my_user.js') }}">
@endsection
