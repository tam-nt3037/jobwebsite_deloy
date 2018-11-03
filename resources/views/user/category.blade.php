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
                                <div class="default-select" id="default-selects">

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
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-sm-12">
                    <h3>Categories List</h3>
                    @if(count($all_job_category) > 0)
                        <div class="row alert alert-primary">
                            @foreach($all_job_category as $cat)

                                <div class="col-sm-2 m-3 alert alert-light text-center">
                                    <a href="/search/{{$cat->name_job_category}}">{{$cat->name_job_category}}
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="row p-3 badge-primary">Search for : <b> <span class="pl-2" id="name_category_span" style="font-size: 20px;"> </span></b></div>
                        <div class="row p-3" id="info_category"></div>

                    @else
                        <p>Not found category</p>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center d-flex">

                <div class="col-lg-8 post-list">

                    {{--TODO: SEARCH--}}

                    @guest
                        @if(isset($category_search_quick))
                            @if((count($category_search_quick)) > 0)
                                @foreach($category_search_quick as $category_search)
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
                                                        <a href="/details/{{$category_search->id_posts}}">
                                                            <h4>{{$category_search->job_title}}</h4></a>
                                                        <h6>{{$category_search->company_name}}</h6>
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
                                                {{$category_search->description_work}}
                                            </p>
                                            <h5>Job Nature: {{$category_search->name_type_work}}</h5>
                                            <p class="address"><span
                                                        class="lnr lnr-map"></span> {{$category_search->location_work}}
                                            </p>
                                            <p class="address"><span
                                                        class="lnr lnr-database"></span> {{$category_search->name_level_salary}}
                                            </p>
                                            <p class="address"><span class="lnr lnr-clock"></span> Time for
                                                submission:
                                                <b>{{$category_search->time_for_submission}}</b></p>
                                            <p class="address"><span class="lnr lnr-shirt"></span> Number of
                                                recruitment: <b>{{$category_search->number_recruits }}</b> people</p>
                                            <p class="address"><span class="lnr lnr-user"></span> Gender
                                                : {{$category_search->gender }} </p>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-6">{{$category_search_quick->links()}}</div>
                                    <div class="col-sm-1"></div>
                                </div>
                            @else
                                <p>Not found any post news</p>
                            @endif
                        @endif
                    @else
                        @if(isset($category_search_quick))
                            @if(count($category_search_quick) > 0)
                                @if(count($saved_jobs) > 0)
                                    @foreach($category_search_quick as $category_search)
                                        <?php
                                        $flag = false;
                                        ?>
                                        @foreach($saved_jobs as $saved)

                                            @if($saved->id_post_news == $category_search->id_posts and $saved->id_candidate == auth()->user()->id)
                                                <?php
                                                $flag = true;
                                                ?>
                                            @endif
                                        @endforeach
                                        @if($flag == true)
                                            <div class="single-post d-flex flex-row">
                                                <div class="thumb">
                                                    <img src="{{ asset('img/post.png') }}" alt="">
                                                    <div hidden>{{$name = $category_search->name_job_category}}</div>
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
                                                                    <a href="/details/{{$category_search->id_posts}}">
                                                                        <h4>{{$category_search->job_title}}</h4></a>
                                                                    <h6>{{$category_search->company_name}}</h6>
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
                                                        {{$category_search->description_work}}
                                                    </p>
                                                    <h5>Job Nature: {{$category_search->name_type_work}}</h5>
                                                    <p class="address"><span
                                                                class="lnr lnr-map"></span> {{$category_search->location_work}}
                                                    </p>
                                                    <p class="address"><span
                                                                class="lnr lnr-database"></span> {{$category_search->name_level_salary}}
                                                    </p>
                                                    <p class="address"><span class="lnr lnr-clock"></span> Time
                                                        for
                                                        submission:
                                                        <b>{{$category_search->time_for_submission}}</b></p>
                                                    <p class="address"><span class="lnr lnr-shirt"></span>
                                                        Number of
                                                        recruitment: <b>{{$category_search->number_recruits }}</b>
                                                        people
                                                    </p>
                                                    <p class="address"><span class="lnr lnr-user"></span> Gender
                                                        : {{$category_search->gender }} </p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="single-post d-flex flex-row">
                                                <div class="thumb">
                                                    <img src="{{ asset('img/post.png') }}" alt="">
                                                    <div hidden>{{$name = $category_search->name_job_category}}</div>
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
                                                                    <a href="/details/{{$category_search->id_posts}}">
                                                                        <h4>{{$category_search->job_title}}</h4></a>
                                                                    <h6>{{$category_search->company_name}}</h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-sm-1">
                                                                <form method="POST">
                                                                    <a>
                                                                        <button type="button"
                                                                                class="btn btn-primary"
                                                                                name="btnSavedJobs"
                                                                                data-jobs-id-candidate="{{auth()->user()->id}}"
                                                                                data-jobs-id-postnews="{{$category_search->id_posts}}">
                                                                            <span class="lnr lnr-heart"></span>
                                                                        </button>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <p>
                                                        {{$category_search->description_work}}
                                                    </p>
                                                    <h5>Job Nature: {{$category_search->name_type_work}}</h5>
                                                    <p class="address"><span
                                                                class="lnr lnr-map"></span> {{$category_search->location_work}}
                                                    </p>
                                                    <p class="address"><span
                                                                class="lnr lnr-database"></span> {{$category_search->name_level_salary}}
                                                    </p>
                                                    <p class="address"><span class="lnr lnr-clock"></span> Time
                                                        for
                                                        submission:
                                                        <b>{{$category_search->time_for_submission}}</b></p>
                                                    <p class="address"><span class="lnr lnr-shirt"></span>
                                                        Number of
                                                        recruitment: <b>{{$category_search->number_recruits }}</b>
                                                        people
                                                    </p>
                                                    <p class="address"><span class="lnr lnr-user"></span> Gender
                                                        : {{$category_search->gender }} </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="row">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-6">{{$category_search_quick->links()}}</div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                @else
                                    <p>Not found any post news</p>
                                @endif
                            @endif
                        @endif
                    @endguest

                </div>

                {{-- #sidebar --}}
                @include('inc.sidebar')
                {{-- #end sidebar --}}

            </div>
        </div>
    </section>
    <!-- End post Area -->

    <!-- Start callto-action Area -->
    {{--<section class="callto-action-area section-gap">--}}
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
@endsection

@section('scripts-first')
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
@endsection

@section('scripts-end')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('js/my_user.js') }}">
@endsection