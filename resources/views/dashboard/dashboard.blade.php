@extends('layouts.app')


@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        My Profile
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                                href="/my-career-center/my-profile"> My Profile</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post Area -->
    <section class="post-area section-gap" style="padding: 0;">
        @include('inc.messages')
        <div class="container">
            <div style="padding: 10px 0 10px 0;">
                <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                           aria-controls="pills-home" aria-selected="true">Your Profile</a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">My Jobs</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Job Alerts</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" id="pills-resume-tab" data-toggle="pill" href="#pills-resume" role="tab" aria-controls="pills-resume" aria-selected="false">Who view My Profile</a>--}}
                    {{--</li>--}}
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                {{--Dashboard--}}
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @if(isset($info_candidate_profile))
                        @foreach($info_candidate_profile as $info_can)
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-sm-4 well well-lg">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                @if($info_can->avatar == '')
                                    <img id="previewing" src="{{asset('img/dashboard/profile/user.png')}}" alt=""
                                         class="rounded"
                                         width="200px" height="200px">
                                @else
                                    <img id="previewing" src="{{asset('storage/avatar/'.$info_can->avatar)}}" alt=""
                                         class="rounded"
                                         width="200px" height="200px">
                                @endif
                            </div>
                            <div class="col-sm-12 ">
                                <hr>
                                <p style="text-align: center;"><b>{{$info_can->last_name}} {{$info_can->first_name}}</b>
                                </p>
                                <p style="text-align: center;">{{$info_can->professional_title}}</p>
                                <p style="text-align: center;">{{$info_can->current_job_level}}</p>
                                <p style="text-align: center;">Day of birth: {{$info_can->doB}}</p>
                                <hr>
                                <p style="text-align: center;" class="pb-5">

                                    <button type="button" class="btn btn-success btn-lg"><a href="../user/profile"
                                                                                            style="text-decoration: none; color: white">Update
                                            profile</a></button>
                                </p>
                            </div>
                            <div class="col-sm-12 p-5" style="background-color: white; border-style: dotted">
                                <h4>Profile Settings</h4>
                                <h5 class="text-muted">Attached Resume</h5>
                                <div class="col-sm-12 p-1 m-1 border border-warning">
                                    <h5 class="text-muted">Your resume </h5>
                                    <h5>{{$info_can->cv}}</h5>
                                    <h6>(Date upload: {{$info_can->datetime_upload_cv}})</h6>
                                </div>

                                {{--Begin Modal--}}
                                <button class="btn btn-success" data-toggle="modal" data-target="#modalForm">
                                    Replace Resume
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalForm" role="dialog">
                                    <div class="modal-dialog">
                                        <form method="POST" id="btnSubmitReplaceCV" name="btnSubmitReplaceCV"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 style="color: #555;">Upload new resume</h4>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span>
                                                        <span class="sr-only">Close</span>
                                                    </button>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <p class="statusMsg"></p>

                                                    <div class="form-group"
                                                         style="border-style: dotted; padding: 10px 10px 100px 10px">
                                                        <h4 style="text-align: center;padding-top: 20px;">
                                                            {{$info_can->cv}}</h4>

                                                        <input type="file" id="file_replace_resume_cv"
                                                               name="file_replace_resume_cv"
                                                               style="padding: 50px 0 0 150px" required>
                                                    </div>
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary submitBtn"
                                                            name="replace-resume-submit"
                                                            onclick="return form_submit_replace_cv()">SUBMIT
                                                    </button>
                                                    <script>
                                                        function form_submit_replace_cv() {
                                                            document.getElementById("btnSubmitReplaceCV").submit();
                                                            return false;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{--End Modal--}}
                            </div>
                        </div>
                        <div class="col-sm-8">
                            {{--<div class="col-md-4 well well-lg" style="padding-bottom: 50px">--}}
                            {{--<p style="text-align: center;font-size: 50px;font-weight: 100; color: #f59331; ">0</p>--}}
                            {{--<p style="text-align: center;text-transform: uppercase">Employers views</p>--}}
                            {{--<hr>--}}
                            {{--<p style="text-align: center;">Check who viewed your profile</p>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4 well well-lg" style="padding-bottom: 70px">--}}
                            {{--<p style="text-align: center;font-size: 50px;font-weight: 100; color: #5fb661; ">0</p>--}}
                            {{--<p style="text-align: center;text-transform: uppercase">Job Alerts</p>--}}
                            {{--<hr>--}}
                            {{--<p style="text-align: center;">Manage your Job alerts</p>--}}

                            {{--</div>--}}
                            {{--<div class="col-md-4 well well-lg" style="height: 222.2px">--}}
                            {{--<p style="text-align: center;font-size: 50px;font-weight: 100; color: #1fbaef; ">01</p>--}}
                            {{--<p style="text-align: center;text-transform: uppercase">Your applications</p>--}}
                            {{--<hr>--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<div class="col-sm-5">--}}
                            {{--<span class="badge" style="background-color: #a367e7;">01</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}
                            {{--<span class="badge" style="text-align: center; background-color: #71dd8a; ">0</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-2">--}}
                            {{--<span class="badge">0</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-12">--}}
                            {{--<div class="col-sm-4">--}}
                            {{--Open--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}
                            {{--Viewed--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}
                            {{--Closed--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-sm-12 well well-lg post-list ">
                                <div><h4><b>SAVED JOBS</b></h4></div>
                                <hr>

                                @if(isset($post_news_for_saved_jobs))
                                    @if(count($post_news_for_saved_jobs) > 0)
                                        @foreach($post_news_for_saved_jobs as $post_news_for_saved_job)
                                            <form method="POST" action="" id="form-unsave" name="form-unsave">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img src="{{asset('img/elements/a.jpg')}}" alt=""
                                                             class="rounded"
                                                             width="125px"
                                                             height="75px">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="id_posts"
                                                               value="{{$post_news_for_saved_job->id_posts}}" hidden/>
                                                        <a href="/details/{{$post_news_for_saved_job->id_posts}}">
                                                            <h5>{{$post_news_for_saved_job->job_title}}</h5></a>
                                                        <p class="address"><span class="lnr lnr-clock"></span>
                                                            <b>{{$post_news_for_saved_job->time_for_submission}}</b></p>
                                                        <h5 class="text-muted">
                                                            Company: {{$post_news_for_saved_job->company_name}}</h5>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <a href="/details/{{$post_news_for_saved_job->id_posts}}"
                                                               class="text-light">
                                                                <button type="button" class="btn btn-warning">
                                                                    <span class="glyphicon glyphicon-hand-right"></span>
                                                                    Apply
                                                                </button>
                                                            </a>
                                                            <input type="submit" class="btn btn-outline-danger"
                                                                   name="unsave_submit" value="Unsave"/>


                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </form>

                                        @endforeach
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                {{$post_news_for_saved_jobs->links()}}
                                            </div>
                                            <div class="col-sm-4"></div>

                                        </div>
                                    @else
                                        <p>No saved jobs</p>
                                    @endif
                                @endif


                            </div>
                            <div class="col-sm-12 well well-lg post-list ">
                                <div><h4><b>APPLIED JOBS</b></h4></div>
                                <hr>

                                @if(isset($post_news_for_applied_jobs))
                                    @if(count($post_news_for_applied_jobs) > 0)
                                        @foreach($post_news_for_applied_jobs as $post_news_for_applied_job)
                                            <form method="POST" action="" id="form-unsave" name="form-unsave">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img src="{{asset('img/elements/a.jpg')}}" alt=""
                                                             class="rounded"
                                                             width="125px"
                                                             height="75px">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="id_posts"
                                                               value="{{$post_news_for_applied_job->id_post_news}}"
                                                               hidden/>
                                                        <a href="/details/{{$post_news_for_applied_job->id_post_news}}">
                                                            <h5>{{$post_news_for_applied_job->job_title}}</h5></a>
                                                        <h5 class="text-muted">
                                                            Company: {{$post_news_for_applied_job->company_name}}</h5>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="">Expired</label>
                                                                <p>{{date('d-m-Y',strtotime($post_news_for_applied_job->time_for_submission))}}</p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="">Applied on</label>
                                                                <p>{{date('d-m-Y',strtotime($post_news_for_applied_job->created_at))}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </form>
                                        @endforeach
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                                {{$post_news_for_applied_jobs->links()}}
                                            </div>
                                            <div class="col-sm-4"></div>

                                        </div>
                                    @else
                                        <p>No applied jobs</p>
                                    @endif
                                @endif

                            </div>
                        </div>

                    </div>


                </div>
                {{--End Dashboard--}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">My
                    Jobs
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Job
                    Alerts
                </div>
                <div class="tab-pane fade" id="pills-resume" role="tabpanel" aria-labelledby="pills-resume-tab">Who view
                    My Profile
                </div>
            </div>


        </div>
    </section>


@endsection

@section('scripts-first')
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
@endsection

@section('scripts-end')

    <script src="{{ asset('js/x-editable/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/x-editable/bootstrap-editable.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            //toggle `popup` / `inline` mode
            $.fn.editable.defaults.mode = 'popup';

            //make username editable
            $('#username').editable();

            //make status editable
            $('#status').editable({
                type: 'select',
                title: 'Select status',
                placement: 'right',
                value: 2,
                source: [
                    {value: 1, text: 'status 1'},
                    {value: 2, text: 'status 2'},
                    {value: 3, text: 'status 3'}
                ]
                /*
                //uncomment these lines to send data on server
                ,pk: 1
                ,url: '/post'
                */
            });
        });


    </script>
@endsection