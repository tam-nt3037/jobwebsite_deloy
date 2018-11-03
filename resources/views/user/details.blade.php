@extends('layouts.app')
@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Job Details
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                                href="single.html"> Job Details</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start post Area -->
    <section class="post-area section-gap">
        @include('inc.messages')
        <div class="container">
            <div class="row justify-content-center d-flex">

                {{--Start get data for details info--}}
                @if((count($post_news)) > 0)
                    @foreach($post_news as $post)
                        <div class="col-lg-8 post-list">
                            <div class="single-post d-flex flex-row">
                                <div class="thumb">
                                    <img src="{{ asset('img/post.png') }}" alt="">
                                    {{--<ul class="tags">--}}
                                    {{--<li>--}}
                                    {{--<a href="#">Art</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#">Media</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                    {{--<a href="#">Design</a>--}}
                                    {{--</li>--}}
                                    {{--</ul>--}}
                                </div>
                                <div class="details">
                                    <div class="title d-flex flex-row justify-content-between">
                                        <div class="col-md-9 col-sm-9">
                                            <div class="titles">
                                                <a href="#"><h4>{{$post->job_title}}</h4></a>
                                                <h6>{{$post->company_name}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="row">
                                                @guest
                                                    <button type="button"
                                                            class="btn btn-primary"
                                                            data-toggle="popover" title="Info"
                                                            data-placement="left"
                                                            data-content="Please login to saved job !!! <hr/>   <a class='ticker-btn' href='{{ route('login') }}'>Login</a> ">
                                                        <span class="lnr lnr-heart"></span>
                                                    </button>
                                                @else
                                                    @if(count($post_news) > 0)
                                                        @if(count($saved_jobs) > 0)
                                                            @foreach($post_news as $post)
                                                                <?php
                                                                $flag = false;
                                                                ?>
                                                                @foreach($saved_jobs as $saved)

                                                                    @if($saved->id_post_news == $post->id_posts and $saved->id_candidate == auth()->user()->id)
                                                                        <?php
                                                                        $flag = true;
                                                                        ?>
                                                                    @endif
                                                                @endforeach
                                                                @if($flag == true)
                                                                    <button type="button"
                                                                            class="btn btn-warning"
                                                                            data-toggle="popover" title="Info"
                                                                            data-placement="left"
                                                                            data-content="Watch your saved jobs  <hr/>   <a class='ticker-btn' href='/my-career-center/my-profile'>Here</a> ">
                                                                        <span class="lnr lnr-heart"></span>
                                                                    </button>
                                                                @else
                                                                    <form method="POST">
                                                                        <a>
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    name="btnSavedJobs"
                                                                                    data-jobs-id-candidate="{{auth()->user()->id}}"
                                                                                    data-jobs-id-postnews="{{$post->id_posts}}">
                                                                                <span class="lnr lnr-heart"></span>
                                                                            </button>
                                                                        </a>
                                                                    </form>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endif


                                                    <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                                                            data-target="#myModal">
                                                        Apply
                                                    </button>
                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="myModal">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">You are applying
                                                                        for {{$post->job_title}}</h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal">&times;
                                                                    </button>
                                                                </div>

                                                                <!-- Modal body -->

                                                                @if(!Auth::guest())
                                                                    {!! Form::open(['action' => 'UserController@applyJob', 'id' => 'ApplyForm' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                                    <input type="hidden" name="id_account_recruiter"
                                                                           value="{{$post->id_account_recruiter}}">
                                                                    <input type="hidden" name="id_post"
                                                                           value="{{$post->id_posts}}">
                                                                    @if(count($info_candidate) > 0)
                                                                        @foreach($info_candidate as $info_c)

                                                                            {{--{{ Form::hidden('id_account_recruiter', $post->id_account_recruiter ) }}--}}
                                                                            {{--{{ Form::hidden('id_post', $post->id_posts ) }}--}}
                                                                            <div class="modal-body"
                                                                                 style="font-family: Roboto,Helvetica,Verdana,Arial,sans-serif; line-height: 1.21; color: inherit; font-weight: 400;">
                                                                                <div class="row"
                                                                                     style="background-color: #D8F4FC; padding: 15px 0 15px 0; font-size: 18px; border-top: 1px #ace0f0 solid;border-bottom: 1px #ace0f0 solid;">
                                                                                    <div class="col-md-2 col-sm-2"></div>
                                                                                    <div class="col-md-2 col-sm-2"><img
                                                                                                src="{{ asset('img/post.png') }}">
                                                                                    </div>
                                                                                    <div class="col-md-8 col-sm-8">
                                                                                        <div>
                                                                                            <b style="color: #666666;">{{$info_c->last_name}} {{$info_c->first_name}}</b>
                                                                                        </div>
                                                                                        <div>{{$info_c->professional_title}}</div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row"
                                                                                     style="padding: 35px 0 0 0;">
                                                                                    <div class="col-md-4 col-sm-4 text-right ">
                                                                                        <h5 class="font-weight-bold">
                                                                                            Email</h5></div>
                                                                                    <div class="col-md-8 col-sm-8">
                                                                                        <h5>{{$info_c->email}}</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row"
                                                                                     style="padding: 15px 0 0 0;">
                                                                                    <div class="col-md-4 col-sm-4 text-right ">
                                                                                        <h5 class="font-weight-bold">
                                                                                            Phone number</h5></div>
                                                                                    <div class="col-md-8 col-sm-8">
                                                                                        <h5>{{$info_c->phone_number}}</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row"
                                                                                     style="padding: 15px 0 0 0;">
                                                                                    <div class="col-md-4 col-sm-4 text-right ">
                                                                                        <h5 class="font-weight-bold">
                                                                                            Resume</h5></div>
                                                                                    <div class="col-md-8 col-sm-8">
                                                                                        <form>

                                                                                            {{--
                                                                                                #TODO

                                                                                                #Example:

                                                                                                $contains = str_contains('This is my name', 'my');

                                                                                                // ==> true

                                                                                            --}}

                                                                                            @if(str_contains($info_c->cv,$info_c->cv))
                                                                                                <div class="radio">
                                                                                                    <label><input
                                                                                                                type="radio"
                                                                                                                name="optradio"
                                                                                                                value="existsCV"
                                                                                                                checked> {{$info_c->cv}}
                                                                                                        <span class="font-weight-light">(Uploaded: {{ date('d/m/Y H:i',strtotime($info_c->datetime_upload_cv)) }}
                                                                                                            )</span></label>
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="radio">
                                                                                                <label><input
                                                                                                            type="radio"
                                                                                                            name="optradio"
                                                                                                            value="fileUpload"
                                                                                                            onclick="showFormFile()">
                                                                                                    Upload new CV
                                                                                                    <b><span class="lnr lnr-exit-up"
                                                                                                             style="font-size: medium;"></span></b></label>
                                                                                                <br>
                                                                                                {{--<form action="upload.php" method="post" enctype="multipart/form-data">--}}
                                                                                                <input type="file"
                                                                                                       id="fileToUpload"
                                                                                                       name="fileToUpload"
                                                                                                       style="display: none;">
                                                                                                {{--</form>--}}
                                                                                            </div>
                                                                                            <script>
                                                                                                function showFormFile() {
                                                                                                    document.getElementById('fileToUpload').style.display = "block";
                                                                                                }
                                                                                            </script>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Cancel
                                                                                </button>
                                                                                <input type="submit"
                                                                                       class="btn btn-primary"
                                                                                       onclick="form_submit()"
                                                                                       value="Send application"/>
                                                                            </div>
                                                                            <script>
                                                                                function form_submit() {
                                                                                    document.getElementById("ApplyForm").submit();
                                                                                }
                                                                            </script>




                                                                        @endforeach
                                                                    @endif
                                                                    {!! Form::close() !!}
                                                                @else
                                                                    <div class="modal-body">
                                                                        <div>Please login your account</div>
                                                                        <button type="submit" class="btn btn-secondary">
                                                                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                                                        </button>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endguest

                                                {{--<ul class="btns">--}}
                                                {{--<li style=""><a href=""><span class="lnr lnr-heart"></span></a></li>--}}

                                                {{--Start Apply Modal--}}

                                                {{--<li style="border:none; background-color: #F9F9FF;">--}}

                                                {{--End Apply Modal--}}
                                                {{--</li>--}}
                                                {{--</ul>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        {{$post->description_work}}
                                    </p>
                                    <h5>Job Nature: {{$post->name_type_work}}</h5>
                                    <p class="address"><span class="lnr lnr-map"></span> {{$post->location_work}}</p>
                                    <p class="address"><span
                                                class="lnr lnr-database"></span> {{$post->name_level_salary}}</p>
                                    <p class="address"><span class="lnr lnr-clock"></span> Time for submission:
                                        <b>{{$post->time_for_submission}}</b></p>
                                    <p class="address"><span class="lnr lnr-shirt"></span> Number of recruitment:
                                        <b>{{$post->number_recruits }}</b> people</p>
                                    <p class="address"><span class="lnr lnr-user"></span> Gender : {{$post->gender }}
                                    </p>
                                </div>
                            </div>
                            <div class="single-post job-details">
                                <h4 class="single-title"> WHAT WE CAN OFFER</h4>
                                <p>
                                    {!! $post->benefit !!}
                                </p>
                            </div>
                            <div class="single-post job-details">
                                <h4 class="single-title">Whom we are looking for</h4>
                                <p>
                                    <img src="{{ asset('img/pages/list.jpg') }}" alt="">
                                    <span>{{$post->description_work}}</span>
                                </p>
                            </div>
                            <div class="single-post job-experience">
                                <h4 class="single-title">Job Requirements</h4>
                                <ul>
                                    <li>
                                        <img src="{{ asset('img/pages/list.jpg') }}" alt="">
                                        <span>{{$post->require_work}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-post job-experience">
                                <h4 class="single-title">Experience Requirements</h4>
                                <ul>
                                    <li>
                                        <img src="{{ asset('img/pages/list.jpg') }}" alt="">
                                        <span>Above {{$post->year_experience}} years relevant experience in work</span>
                                    </li>
                                </ul>
                            </div>
                            {{--<div class="single-post job-experience">--}}
                            {{--<h4 class="single-title">Job Features & Overviews</h4>--}}
                            {{--<ul>--}}
                            {{--<li>--}}
                            {{--<img src="{{ asset('img/pages/list.jpg') }}" alt="">--}}
                            {{--<span></span>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            <div class="single-post job-experience">
                                <h4 class="single-title">Education Requirements</h4>
                                <ul>
                                    <li>
                                        <img src="{{ asset('img/pages/list.jpg') }}" alt="">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                                    </li>
                                </ul>
                            </div>
                            {{--<div class="single-post job-experience">--}}
                            {{--<h4 class="single-title">Profile Requirements</h4>--}}
                            {{--<ul>--}}
                            {{--<li>--}}
                            {{--<img src="{{ asset('img/pages/list.jpg') }}" alt="">--}}
                            {{--<span></span>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                        </div>

                        {{--End get data for details info--}}

                        {{-- #sidebar --}}
                        <div class="col-lg-4 sidebar">
                            <div class="single-slidebar">
                                <h4>
                                    <hr>
                                </h4>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p>POSTED DATE</p>
                                            <span>{{ date('d - m - Y',strtotime($post->date_posted)) }}</span></a></li>
                                    <hr>
                                </ul>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p>JOB LEVEL</p>
                                            <span>{{$post->name_level}}</span></a></li>
                                    <hr>
                                </ul>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p>JOB CATEGORY</p></a></li>
                                </ul>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p id="demo" href=""></p><span></span></a>

                                        <div hidden>{{$name = $post->name_job_category}}</div>
                                        <link rel='parent' href='abc.txt' target='_blank'>
                                        <script>
                                            var js_variable = '<?php echo $name;?>';
                                            var res = js_variable.split(",");
                                            res.forEach(function (element) {
                                                element = element.replace(/\s/g, '');
                                                document.getElementById("demo").innerHTML += "<a href='../search/" + element + "'>" + element + "</a><br/>";
                                            });

                                        </script>
                                </ul>
                                <hr>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p>SKILL</p><span></span></a></li>
                                </ul>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p></p><span>{{$post->skills}}</span></a>
                                </ul>
                                <hr>
                                <ul class="cat-list">
                                    <li><a class="justify-content-between d-flex"><p>PREFERRED LANGUAGE</p>
                                            <span>{{$post->name_languages_profile}}</span></a></li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- #end sidebar --}}

                {{-- #sidebar --}}
                {{--@include('inc.sidebar')--}}
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
    {{--<a class="primary-btn" href="#">We are an Employer</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <!-- End calto-action Area -->

@endsection

@section('scripts-end')
    <script src="{{ asset('js/my_user.js') }}">
@endsection