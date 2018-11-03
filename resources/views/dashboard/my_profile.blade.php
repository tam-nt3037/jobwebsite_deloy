@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/my_profile.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Your profile
                    </h1>
                    <p class="text-white link-nav"><a href="/my-career-center/dashboard">Dashboard </a> <span
                                class="lnr lnr-arrow-right"></span> <a href="/user/profile"> Your profile</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start post Area -->
    <section class="post-area section-gap pt-5" style="background-color: #EEEEEE;">
        @include('inc.messages')
        <div class="container">

            @if(count($info_candidate_profile) > 0)
                @foreach($info_candidate_profile as $info_can)
                @endforeach
            @endif

            <div class="row well well-lg bg-grey"
                 style="border-left-width: thick ;border-left-style: solid ;border-left-color: #F7941D; transition: border-color .2s;">

                {!! Form::open(['action' => 'DashboardController@user_avatar', 'id' => 'form-upload-avatar' ,'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                <div class="col-sm-3  p-3 mr-5 rounded">
                    @if($info_can->avatar == '')
                        <img id="previewing" src="{{asset('img/dashboard/profile/user.png')}}" alt="" class="rounded"
                             width="200px" height="200px">
                    @else
                        <img id="previewing" src="{{asset('storage/avatar/'.$info_can->avatar)}}" alt="" class="rounded"
                             width="200px" height="200px">
                    @endif
                    <div class="top-right">
                        <label for="upload_avatar_file" class="text-muted">Edit
                            <input id="upload_avatar_file" name="upload_avatar_file" type="file"
                                   accept="image/x-png,image/gif,image/jpeg"
                                   onchange="readURL(this);" hidden>
                        </label>
                    </div>
                    <div class="bottom-right">
                        <input class="btn btn-success" id="submitSaveAvatar" type="submit" value="Save">
                    </div>
                </div>
                {!! Form::close() !!}


                <div class="col-sm-8 shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="col-sm-10 shadow-sm p-3 mb-5 bg-white rounded">
                        <h4><p id="fullName"
                               class="text-xl-left text-success">{{$info_can->last_name}} {{$info_can->first_name}}</p>
                        </h4>
                        <h5><p id="professional_title_current_job_level"
                               class="text-black">{{$info_can->professional_title}}
                                / {{$info_can->current_job_level}}</p>
                        </h5>
                        @if($info_can->experience_state != -1)
                            <h5><p id="year_experience_view" class="text-black">Years of
                                    experience: {{$info_can->experience_state}} years</p></h5>

                        @else
                            <h5><p id="year_experience_view" class="text-black">I am a new graduate / have no work
                                    experience</p></h5>
                        @endif

                    </div>
                    <div class="col-sm-2 shadow-sm p-3 mb-5 bg-white rounded">
                        <span><button type="button" class="btn btn-default btn-cancel" id="btnEditUserInfo"
                                      data-toggle="modal" data-target="#modalFormUserInfo">Edit</button></span>
                    </div>
                </div>

                {{--Modal Edit User Info--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormUserInfo" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">User Info</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <div class="col-sm-6 mt-4 mb-4">
                                            <label for="inputName">* First Name</label>
                                            <input type="text" class="form-control" id="firstName"
                                                   placeholder="Enter your first name"
                                                   value="{{$info_can->first_name}}"
                                                   required/>
                                        </div>
                                        <div class="col-sm-6 mt-4 mb-4">
                                            <label for="inputName">* Last Name</label>
                                            <input type="text" class="form-control" id="lastName"
                                                   placeholder="Enter your last name"
                                                   value="{{$info_can->last_name}}"/>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 mt-4 mb-4">
                                            <label for="inputName">* Professional Title</label>
                                            <input type="text" class="form-control" id="professional_title"
                                                   placeholder="Enter your professional title"
                                                   value="{{$info_can->professional_title}}"/>
                                        </div>
                                        <div class="col-sm-6 mt-4 mb-4">
                                            <label for="select_Current_Job_Level">* Current Job Level</label>
                                            <select class="form-control" id="select_Current_Job_Level"
                                                    style="height: auto">
                                                <option class="form-select">Please select ...</option>
                                                @foreach($job_level as $jobs)
                                                    @if($jobs->name == $info_can->current_job_level)
                                                        <option class="form-select"
                                                                selected>{{$jobs->name}}</option>
                                                    @else
                                                        <option class="form-select">{{$jobs->name}}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if($info_can->experience_state == -1)
                                        <div class="form-group hidden" id="year-experience-form">
                                            <div class="col-sm-12 mt-4 mb-4">
                                                <label for="inputName">* Years of Experience</label>
                                                <input type="number" class="form-control" id="year_experience"
                                                       min="1"
                                                       max="30"
                                                       placeholder="Enter your year experience"
                                                       value="{{$info_can->experience_state}}"/>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group" id="year-experience-form">
                                            <div class="col-sm-12 mt-4 mb-4">
                                                <label for="inputName">* Years of Experience</label>
                                                <input type="number" class="form-control" id="year_experience"
                                                       min="1"
                                                       max="30"
                                                       placeholder="Enter your year experience"
                                                       value="{{$info_can->experience_state}}"/>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-check">
                                        <div class="col-sm-12 mt-4 mb-4">
                                            @if($info_can->experience_state == -1)
                                                <input type="checkbox" class="form-check-input"
                                                       id="checkbox_graduate"
                                                       value="-1"
                                                       onclick="showYearExperience()" checked>
                                            @else
                                                <input type="checkbox" class="form-check-input"
                                                       id="checkbox_graduate"
                                                       value="-1"
                                                       onclick="showYearExperience()">
                                            @endif
                                            <label class="form-check-label ml-4" for="checkbox_graduate">I am a new
                                                graduate / have no work experience</label>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary submitBtn"
                                        onclick="submitUserInfoForm()">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit User Info--}}
            </div>
            <div class="row" style="padding: 24px;">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-fw fa-suitcase"></i> Contact Information
                    </button>
                </div>
            </div>
            <div class="collapse well shadow-sm p-3 mb-5 bg-white rounded" id="collapseExample">

                {{--Contact Information--}}
                <div class="row mb-5">
                    <div class="col-sm-6"><label> Email</label></div>
                    <div class="col-sm-4"><label> Cell Number</label></div>
                    <div class="col-sm-2 text-center">
                        <button type="button" class="btn btn-default btn-edit" id="btnEditContactInformation">
                            <a href="#modalFormContactInformation" data-toggle="modal"
                               data-contact-gender="{{$info_can->gender}}"
                               data-contact-country="{{$info_can->country}}"
                               data-contact-city="{{$info_can->city}}"
                               data-contact-district="{{$info_can->district}}"
                               data-contact-address="{{$info_can->address}}">
                                Edit</a>
                        </button>
                    </div>
                    <div class="col-sm-6">
                        <h5 id="email_view">{!! \App\Model\Users::where( 'id' , '=', $info_can->id_users)->value('email') !!}</h5>
                    </div>
                    <div class="col-sm-6">
                        <h5 id="cell_number_view">{{$info_can->phone_number}}</h5>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-sm-6"><label> Date of birth</label></div>
                    <div class="col-sm-6"><label> Nationality</label></div>
                    <div class="col-sm-6">
                        <div class="control-group">
                            <div class="controls">
                                <div class="input-group">
                                    <h5 id="doB_view">{{$info_can->doB}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5 id="nationality_view">{{$info_can->nationality}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><label> Gender</label></div>
                    <div class="col-sm-6"><label> Marital Status</label></div>
                    <div class="col-sm-6">
                        <div class="edit-field" style="display: block;">
                            <h5 id="gender_view">{{$info_can->gender}}</h5>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="edit-field" style="display: block;">
                            <h5 id="marital_status_view">{{$info_can->marital_status}}</h5>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mb-5">
                    <div class="col-sm-6"><label> Country</label></div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <h5 id="country_view">{{$info_can->country}}</h5>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row mb-5">
                    <div class="col-sm-6"><label> Province/City</label></div>
                    <div class="col-sm-6"><label> District</label></div>
                    <div class="col-sm-6">
                        <h5 id="city_view">{{$info_can->city}}</h5>
                    </div>
                    <div class="col-sm-6">
                        <h5 id="district_view">{{$info_can->district}}</h5>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-sm-6"><label> Address</label></div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <h5 id="address_view">{{$info_can->address}}</h5>
                    </div>
                    <div class="col-sm-6"></div>
                </div>

                {{--Modal Edit Contact Information--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormContactInformation" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Contact Information</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form" method="PUT">
                                    <div class="form-group">
                                        <div class="row mb-5">
                                            <div class="col-sm-6"><label>* Email</label></div>
                                            <div class="col-sm-6"><label>* Cell Number</label></div>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                       aria-describedby="emailHelp" placeholder="Enter email"
                                                       value="{!! \App\Model\Users::where( 'id' , '=', $info_can->id_users)->value('email') !!}"
                                                       disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="tel" class="form-control edit-control" name="cellphone"
                                                       id="cell-number" placeholder="e.g. 0903012825"
                                                       value="{{$info_can->phone_number}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-5">
                                            <div class="col-sm-6"><label>* Date of birth</label></div>
                                            <div class="col-sm-6"><label>* Nationality</label></div>
                                            <div class="col-sm-6">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <label for="doB"
                                                                   class="input-group-addon btn"><span
                                                                        class="glyphicon glyphicon-calendar"></span>

                                                            </label>
                                                            <input id="doB" type="text"
                                                                   class="date-picker form-control"
                                                                   value="{{$info_can->doB}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="selectpicker" data-show-subtext="false"
                                                        id="select_nationality"
                                                        data-live-search="true">
                                                    <option data-subtext="" value="-1">Please select...</option>
                                                    <?php
                                                    $nationality = array('Local Vietnamese', 'Foreigner');
                                                    ?>
                                                    @for( $i=0;  $i < count($nationality); $i++)
                                                        @if($info_can->nationality == $nationality[$i])
                                                            <option data-subtext="" value="{{$info_can->nationality}}"
                                                                    selected>{{$info_can->nationality}}</option>
                                                        @else
                                                            <option data-subtext=""
                                                                    value="{{$nationality[$i]}}">{{$nationality[$i]}} </option>
                                                        @endif
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6"><label>* Gender</label></div>
                                            <div class="col-sm-6"><label>* Marital Status</label></div>
                                            <div class="col-sm-6">
                                                <div class="edit-field" style="display: block;">

                                                    <label class="radio-inline"
                                                           for="gender-male}">
                                                        <input class="edit-control" type="radio" name="gender"
                                                               id="gender-male"
                                                               value="Male"
                                                               data-text-value="Male">
                                                        Male
                                                    </label>
                                                    <label class="radio-inline"
                                                           for="gender-female">
                                                        <input class="edit-control" type="radio" name="gender"
                                                               id="gender-female"
                                                               value="Female"
                                                               data-text-value="Female">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="edit-field" style="display: block;">

                                                    <?php

                                                    $marital_state = array("Single", "Married");

                                                    ?>

                                                    @for($i=0; $i < count($marital_state); $i++)
                                                        @if($info_can->marital_status == $marital_state[$i])
                                                            <label class="radio-inline"
                                                                   for="marital-{{strtolower($marital_state[$i])}}">
                                                                <input type="radio" class="edit-control" name="marital"
                                                                       id="marital-{{strtolower($marital_state[$i])}}"
                                                                       value="{{$marital_state[$i]}}"
                                                                       checked="checked">
                                                                {{$marital_state[$i]}}
                                                            </label>
                                                        @else
                                                            <label class="radio-inline"
                                                                   for="marital-{{strtolower($marital_state[$i])}}">
                                                                <input type="radio" class="edit-control" name="marital"
                                                                       id="marital-{{strtolower($marital_state[$i])}}"
                                                                       value="{{$marital_state[$i]}}">
                                                                {{$marital_state[$i]}}
                                                            </label>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="row mb-5">
                                            <div class="col-sm-6"><label>* Country</label></div>
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6">
                                                <select class="selectpicker show-tick" data-show-subtext="false"
                                                        id="select_country"
                                                        data-live-search="true" onchange="check_country_is_vietnam()">

                                                    <option data-subtext="" value="-1">Please select...</option>
                                                    {{--LOAD COUNTRIES IN MY_PROFILE.JS--}}
                                                </select>
                                            </div>
                                            <div class="col-sm-6"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-5">
                                            <div class="col-sm-6"><label for="province_city">* Province/City</label>
                                            </div>
                                            <div class="col-sm-6"><label for="district">* District</label></div>
                                            <div class="col-sm-6">
                                                <select class="selectpicker show-tick" data-show-subtext="false"
                                                        data-live-search="true" id="province_city">
                                                    <option value="-1">Please select...</option>
                                                    <option value="International">International</option>
                                                    {{--LOAD PROVINCES CITIES IN MY_PROFILE.JS--}}

                                                </select>
                                            </div>
                                            <div class="col-sm-6" id="div-district">
                                                <select class="selectpicker show-tick" data-show-subtext="true"
                                                        data-live-search="true" id="district">
                                                    {{--LOAD PROVINCES CITIES IN MY_PROFILE.JS--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-5">
                                            <div class="col-sm-6"><label>* Address</label></div>
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control edit-control" id="address"
                                                       name="address" placeholder="e.g.130 Suong Nguyet Anh"
                                                       value="">
                                            </div>
                                            <div class="col-sm-6"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <div class="col-sm-12 mr-5">
                                    <div class="col-sm-6 text-left">
                                        (<strong class="text-red">*</strong>) is required field
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary submitBtn"
                                                onclick="submitContactInformationForm()">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Contact Information--}}

                {{--Contact Information--}}
            </div>


            <div class="row"> {{--Summary--}}
                <div class="card w-100">
                    <div class="card-header">
                        <button class="btn btn-primary w-100 text-xl-left p-3" type="button" data-toggle="collapse"
                                data-target="#collapseSummary" aria-expanded="false" aria-controls="collapseExample"
                                style="font-size: 20px;">
                            <i class="fa fa-fw fa-list"></i> Summary
                        </button>
                    </div>
                    <div class="collapse card-body" id="collapseSummary">
                        <div class="col-sm-10" id="summary_view">
                            {!! $info_can->general_info !!}
                        </div>
                        <div class="col-sm-2 text-center">
                            <button type="button" class="btn btn-default btn-edit" id="btnEditSummary"
                                    data-toggle="modal" data-target="#modalFormSummary">Edit
                            </button>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Summary--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormSummary" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Summary</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form">
                                    <div class="form-group">
                                        <div class="col-sm-12 mb-5">
                                            <label class="p-3">Introduce yourself and describe your career
                                                objectives</label>
                                            <textarea class="form-control" name="article-ckeditor-summary"
                                                      id="article-ckeditor-summary"
                                                      cols="40"
                                                      rows="10"
                                                      placeholder="Input summary">{{$info_can->general_info}}</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <div class="col-sm-12 mr-5">
                                    <div class="col-sm-6 text-left">
                                        ( Maximum 1000 words)
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary submitBtn"
                                                onclick="submitSummaryForm()">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Summary--}}
            </div>{{--End Summary--}}
            <div class="row"> {{--Key Skills--}}
                <div class="card w-100">
                    <div class="card-header">
                        <button class="btn btn-primary w-100 text-xl-left p-3" type="button" data-toggle="collapse"
                                data-target="#collapseSkills" aria-expanded="false" aria-controls="collapseExample"
                                style="font-size: 20px;">
                            <i class="fa fa-fw fa-flash"></i> Key Skills
                        </button>
                    </div>
                    <div class="collapse card-body" id="collapseSkills">
                        <div class="row m-4">
                            <div class="col-sm-6" id="selected_skills">
                                {{--
                                        Processed in Javascript
                                --}}


                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-default btn-cancel" id="btnEditKeySkills"
                                        data-toggle="modal" data-target="#modalFormKeySkills">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Key Skills--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormKeySkills" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Key Skills</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form" method="PUT">
                                    <div class="form-group">
                                        <label for="id_label_multiple">
                                            <label class="p-3" for="select_expertise">Type this area of
                                                expertise:</label>
                                            <input type="text" id="skills_hidden_data" value="{{$info_can->skills}}"
                                                   hidden>
                                            <select class="js-example-basic-multiple"
                                                    multiple="multiple"
                                                    style="width: 100%" aria-required="true" id="select_expertise"
                                                    required>
                                                @if(count($key_skills) > 0)
                                                    @foreach($key_skills_selected as $select_skills)
                                                        @foreach($key_skills as $skills)
                                                            @if($skills->name_key_skills == $select_skills)
                                                                <option value="{{$skills->name_key_skills}}"
                                                                        selected="selected">{{$skills->name_key_skills}}</option>
                                                            @else
                                                                <option value="{{$skills->name_key_skills}}">{{$skills->name_key_skills}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </select>
                                        </label>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <div class="col-sm-12 mr-5">
                                    <div class="col-sm-6 text-left">
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary submitBtn" id="key-skills"
                                                onclick="submitKeySkillsForm()">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Key Skills--}}
            </div>{{--End Key Skills--}}
            <div class="row"> {{--Languages--}}
                <div class="card w-100">
                    <div class="card-header">
                        <button class="btn btn-primary w-100 text-xl-left p-3" type="button" data-toggle="collapse"
                                data-target="#collapseLanguages" aria-expanded="false" aria-controls="collapseExample"
                                style="font-size: 20px;">
                            <i class="fa fa-fw fa-list"></i> Languages
                        </button>
                    </div>
                    <div class="collapse card-body" id="collapseLanguages">
                        <div class="m-3" id="wrap_languages">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="">Languages</label>
                                </div>
                                <div class="col-sm-8">
                                    <label>Proficiency</label>
                                </div>
                            </div>
                            <input type="text" id="count_languages_data" value="{{count($languages_data)}}" hidden>
                            @if(count($languages_data) > 0)
                                @foreach($languages_data as $languages_data_item)
                                    <div class="row" id="wrap_content_languages">
                                        <div class="col-sm-4 mb-2 mt-2">

                                            <div id="name_language_view">{{$languages_data_item->name_language}}</div>
                                        </div>
                                        <div class="col-sm-6 mb-2 mt-2">
                                            <div id="proficiency_view">{{$languages_data_item->proficiency}}</div>
                                        </div>
                                        <div class="col-sm-2 mb-2 mt-2 ">
                                            <div class="row">
                                                <button type="button" class="btn btn-default btn-cancel mr-1"
                                                        id="btnEditLanguages">
                                                    <a href="#modalFormLanguages" data-toggle="modal"
                                                       data-languages-id="{{$languages_data_item->id}}"
                                                       data-languages-name="{{$languages_data_item->name_language}}"
                                                       data-languages-proficiency="{{$languages_data_item->proficiency}}">
                                                        Edit</a>
                                                </button>

                                                {{--<form action="{{action('DashboardController@user_delete_languages', $languages_data_item->id)}}" method="POST">--}}
                                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                {{--<button type="submit" class="btn btn-default btn-danger"--}}
                                                {{--id="btnDeleteLanguages">--}}
                                                {{--Delete--}}
                                                {{--</button>--}}
                                                {{--</form>--}}
                                                <form method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-default btn-danger"
                                                            id="btnDeleteLanguages">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @endif
                        </div>

                        <div class="row m-4">
                            <button type="button"
                                    class="btn btn-default btn-block no-border add-one-more-section"
                                    id="add-language-button" style="display: block;">
                                <strong><a href="#modalFormLanguages" data-toggle="modal"
                                           data-languages-id="-1"
                                           data-languages-name=""
                                           data-languages-proficiency="">
                                        Add Language </a></strong>
                            </button>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Languages--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormLanguages" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Languages</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <input class="languagesId" type="text" name="languagesId" value="" hidden/>
                                <form role="form" method="PUT">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Languages</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <label>Proficiency</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3 mt-3">
                                                <div>
                                                    <select class="selectpicker show-tick" data-show-subtext="false"
                                                            id="select_languages"
                                                            data-style="btn-primary"
                                                            data-live-search="true">

                                                        @for( $i=0;  $i < count($languages); $i++)
                                                            {{--@if($languages_data->name_language == $languages[$i])--}}
                                                            {{--<option data-subtext=""--}}
                                                            {{--value="{{$languages_data->name_language}}"--}}
                                                            {{--selected>{{$languages_data->name_language}}</option>--}}
                                                            {{--@else--}}
                                                            <option value="{{$languages[$i]}}">{{$languages[$i]}} </option>
                                                            {{--@endif--}}
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3 mt-3">
                                                <div>
                                                    <select class="selectpicker show-tick" data-show-subtext="false"
                                                            id="select_proficiency"
                                                            data-style="btn-success"
                                                            data-live-search="true">

                                                        @for( $i=0;  $i < count($proficiency); $i++)
                                                            {{--@if($info_can->nationality == $languages[$i])--}}
                                                            {{--<option data-subtext="" value="{{$info_can->nationality}}"--}}
                                                            {{--selected>{{$info_can->nationality}}</option>--}}
                                                            {{--@else--}}
                                                            <option data-subtext=""
                                                                    value="{{$proficiency[$i]}}">{{$proficiency[$i]}} </option>
                                                            {{--@endif--}}
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 mb-3 mt-3">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <div class="col-sm-12 mr-5">
                                    <div class="col-sm-6 text-left">
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary submitBtn"
                                                onclick="submitLanguagesForm()">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Languages--}}
            </div>{{--End Languages--}}
            <div class="row"> {{--Employment History--}}
                <div class="card w-100">
                    <div class="card-header">
                        <button class="btn btn-primary w-100 text-xl-left p-3" type="button" data-toggle="collapse"
                                data-target="#collapseEmploy" aria-expanded="false" aria-controls="collapseExample"
                                style="font-size: 20px;">
                            <i class="fa fa-fw fa-bank"></i> Employment History
                        </button>
                    </div>
                    <div class="collapse card-body" id="collapseEmploy">
                        @if(count($employment_history) > 0)
                            @foreach($employment_history as $employ_history)

                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-10">
                                        <label for="">{{$employ_history->position}}</label>
                                        <h5>{{$employ_history->company}}</h5>
                                        <h5>
                                            <span class="pr-5">From: <span
                                                        id="start_time_employ_view">{{$employ_history->start_time}}</span></span>

                                            <span class="pl-5">To: <span
                                                        id="end_time_employ_view">{{$employ_history->end_time}}</span></span>
                                            <span class="total-time"></span>
                                        </h5>
                                        <h5>{!! $employ_history->description !!} </h5>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <div class="row">
                                            <button type="button" class="btn btn-default mr-2"
                                                    id="btnEditEmploymentHistory">
                                                <a href="#modalFormEmploymentHistory" data-toggle="modal"
                                                   data-employment-id="{{$employ_history->id}}"
                                                   data-employment-company="{{$employ_history->company}}"
                                                   data-employment-position="{{$employ_history->position}}"
                                                   data-employment-start-time="{{$employ_history->start_time}}"
                                                   data-employment-end-time="{{$employ_history->end_time}}"
                                                   data-employment-description="{{$employ_history->description}}">
                                                    Edit</a>
                                            </button>


                                            {!! Form::open(['action' => ['DashboardController@user_delete_employment_history', $employ_history->id], 'id' => '' ,'method' => 'POST']) !!}
                                            {{  Form::hidden('_method','DELETE') }}
                                            <button type="submit" class="btn btn-default btn-danger"
                                                    id="">Delete
                                            </button>
                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif
                        <div class="row m-4">
                            <button type="button" class="btn btn-default btn-block no-border add-one-more-section"
                                    id="add-language-button" style="display: block;">
                                <a href="#modalFormEmploymentHistory" data-toggle="modal"
                                   data-employment-id="-1"
                                   data-employment-company=""
                                   data-employment-position=""
                                   data-employment-start-time=""
                                   data-employment-end-time=""
                                   data-employment-description="">
                                    <strong>Add Employment History</strong>
                                </a>
                            </button>
                        </div>

                    </div>
                </div>
                {{--Modal Edit Employment History--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormEmploymentHistory" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Employment History</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form">
                                    <div class="form-group">
                                        <div class="col-sm-12 mb-1">
                                            <label class="p-1" for="candidate_history_position">* Position</label>
                                            <input type="text" class="form-control" id="candidate_history_position"
                                                   placeholder="e.g. UI/UX Designer"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 mb-1">
                                            <input type="text" id="employment_history_id" hidden value="">
                                            <label class="p-1" for="candidate_history_company">* Company</label>
                                            <input type="text" class="form-control" id="candidate_history_company"
                                                   placeholder="e.g. Job website"/>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <div class="col-sm-6">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <span><label for="">From</label></span>

                                                            <input id="date-picker-from" type="date"
                                                                   placeholder="2018-02-19"
                                                                   class="form-control" value=""/>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <div class="input-group">
                                                            <span><label for="">To</label></span>
                                                            <input id="date-picker-to" type="date"
                                                                   placeholder="2018-02-19"
                                                                   class="form-control" value=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1 mt-1">
                                        <div class="col-sm-12 pt-2">
                                            <label> Description</label>
                                            <textarea class="form-control" id="article-ckeditor-description"
                                                      name="article-ckeditor-description"
                                                      cols="20"
                                                      rows="10"
                                                      placeholder="Input description"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <div class="col-sm-12 mr-5">
                                    <div class="col-sm-6 text-left">
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary submitBtn"
                                                onclick="submitEmploymentHistoryForm()">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Employment History--}}
            </div>{{--End Employment History--}}
            <div class="row"> {{-- Education History--}}
                <div class="card w-100">
                    <div class="card-header">
                        <button class="btn btn-primary w-100 text-xl-left p-3" type="button" data-toggle="collapse"
                                data-target="#collapseEducate" aria-expanded="false" aria-controls="collapseExample"
                                style="font-size: 20px;">
                            <i class="fa fa-fw fa-graduation-cap"></i> Education History
                        </button>
                    </div>
                    <div class="collapse card-body" id="collapseEducate">
                        @if(count($education_history) > 0)
                            @foreach($education_history as $education)
                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-10">
                                        <label id="major_view">{{$education->major}}</label>
                                        <h5 id="school_view">{{$education->school}}</h5>
                                        <h5 id="degree_view">{{$education->degree}}</h5>

                                        <h5>
                                            <span class="pr-5">From: <span
                                                        id="start_time_education_view">{{$education->start_time}}</span></span>

                                            <span class="pl-5">From: <span
                                                        id="start_time_education_view">{{$education->end_time}}</span></span>
                                            <span class="total-time"></span>
                                        </h5>
                                        <h5 id="achievement_view">{!! $education->achievements !!}</h5>
                                    </div>
                                    <div class="col-sm-2 text-right p-5">
                                        <div class="row">
                                            <button type="button" class="btn btn-default btn-cancel mr-2"
                                                    id="btnEdit">
                                                <a href="#modalFormEducationHistory" data-toggle="modal"
                                                   data-education-id="{{$education->id}}"
                                                   data-education-major="{{$education->major}}"
                                                   data-education-school="{{$education->school}}"
                                                   data-education-degree="{{$education->degree}}"
                                                   data-education-start-time="{{$education->start_time}}"
                                                   data-education-end-time="{{$education->end_time}}"
                                                   data-education-achievements="{{$education->achievements}}">
                                                    Edit
                                                </a>
                                            </button>
                                            {!! Form::open(['action' => ['DashboardController@user_delete_education_history', $education->id], 'id' => '' ,'method' => 'POST']) !!}
                                            {{  Form::hidden('_method','DELETE') }}
                                            <button type="submit" class="btn btn-default btn-danger"
                                                    id="">Delete
                                            </button>
                                            {!! Form::close() !!}
                                        </div>

                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif
                        <div class="row m-4">
                            <button type="button" class="btn btn-default btn-block no-border add-one-more-section"
                                    id="add-language-button" style="display: block;">
                                <a href="#modalFormEducationHistory" data-toggle="modal"
                                   data-education-id="-1"
                                   data-education-major=""
                                   data-education-school=""
                                   data-education-degree="-1"
                                   data-education-start-time=""
                                   data-education-end-time=""
                                   data-education-achievements="">
                                    <strong>Add Education History</strong>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
                {{--Modal Edit Education History--}}
            <!-- Modal -->
                <div class="modal fade" id="modalFormEducationHistory" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Education History</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form" method="POST">
                                    <div class="form-group">
                                        <div class="col-sm-12 mb-1">

                                            <input type="text" id="education_id" value="" hidden/>
                                            <label class="p-1" for="education_major">* Subject</label>
                                            <input type="text" class="form-control" id="education_major"
                                                   placeholder="e.g. International Business"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 mb-1">
                                            <label class="p-1" for="education_school">* School</label>
                                            <input type="text" class="form-control" id="education_school"
                                                   placeholder="e.g. University of Economics of Ho Chi Minh City"/>
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <label class="p-1" for="select_degree">* Qualification</label>
                                            <select class="selectpicker show-tick form-control" id="select_degree"
                                                    style="height: auto">
                                                <option class="form-select" value="-1">Please select ...</option>
                                                @if(count($degree) > 0)
                                                    @foreach($degree as $degre)
                                                        <option class="form-select"
                                                                value="{{$degre->name}}">{{$degre->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12  mb-1 mt-1">
                                            <div class="col-sm-6">
                                                <label class="" for="date_education_start">From</label>
                                                <input class="form-control" id="date_education_start" type="date"
                                                       value=""/>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="" for="date_education_end">To</label>
                                                <input class="form-control" id="date_education_end" type="date"
                                                       value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-1 mt-2 pt-2">
                                        <div class="col-sm-12 mt-2 pt-2">
                                            <label for="article-ckeditor-achievements"> Achievements</label> <label
                                                    class="ml-5">(Maximum words: 200 words)</label>
                                            <textarea class="form-control" id="article-ckeditor-achievements"
                                                      cols="20"
                                                      rows="10"
                                                      placeholder="Input achievements"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <div class="col-sm-12 mr-5">
                                    <div class="col-sm-6 text-left">
                                        (<strong class="text-red">*</strong>) is required field
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary submitBtn"
                                                onclick="submitEducationHistoryForm()">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--Modal Edit Education History--}}
            </div>{{--End Education History--}}
            @if(isset($working_preferences))
                @if(count($working_preferences) > 0)
                    @foreach($working_preferences as $working_preferences)
                        <div class="row"> {{-- Working Preferences --}}
                            <div class="card w-100">
                                <div class="card-header">


                                    <button class="btn btn-primary w-100 text-xl-left p-3" type="button"
                                            data-toggle="collapse"
                                            data-target="#collapseWorkingPrefer" aria-expanded="false"
                                            aria-controls="collapseExample" style="font-size: 20px;">
                                        <i class="fa fa-fw fa-list"></i> Working Preferences
                                    </button>
                                </div>
                                <div class="collapse card-body" id="collapseWorkingPrefer">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">* Preferred Working Location</label>
                                        </div>

                                        <div class="col-sm-6 text-right pr-5">


                                 <span><button type="button" class="btn btn-default btn-cancel"
                                               id="btnEdit">
                                        <a href="#modalFormWorkingPreferences" data-toggle="modal"
                                           data-working-location="{{$working_preferences->location_work}}"
                                           data-expected-job-category="{{$working_preferences->expected_job_category}}"
                                           data-expected-job-level="{{$working_preferences->expected_job_level}}"
                                           data-expected-salary="{{$working_preferences->expected_salary}}"
                                           data-expected-benefits="{{$working_preferences->expected_benefits}}">
                                                Edit</a></button></span>
                                        </div>
                                        <div class="col-sm-6 m-4"><h5
                                                    id="working_location_view">{{$working_preferences->location_work}}</h5>
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">* Expected Job Category</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">* Expected Job Level</label>
                                        </div>
                                        <div class="col-sm-6 p-5"><h5
                                                    id="expect_job_category_view">{{$working_preferences->expected_job_category}}</h5>
                                        </div>
                                        <div class="col-sm-6 p-5"><h5
                                                    id="expect_job_level_view">{{$working_preferences->expected_job_level}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="">* Expected Salary (USD per month)</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for=""></label>
                                        </div>
                                        <div class="col-sm-6 m-4"><h5
                                                    id="expect_job_salary_view">{{$working_preferences->expected_salary}}</h5>
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="">* My Top 5 Desired Benefits</label>
                                        </div>
                                    </div>
                                    <div class="row m-2 p-4" style="border: 1px dashed">
                                        <div class="col-sm-12" id="wrap_benefits">
                                            <input type="text" id="expected_benefits_results"
                                                   value="{{$working_preferences->expected_benefits}}" hidden>

                                            <div class="col-sm-4">
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-default"
                                                           id="Awards_View"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Awards_View" class="[ btn btn-default active ]">
                                                            Awards
                                                        </label>
                                                        <label for="fancy-checkbox-default" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-primary" id="Bonus_View"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Bonus_View" class="[ btn btn-default active ]">
                                                            Bonus
                                                        </label>
                                                        <label for="fancy-checkbox-primary" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-success"
                                                           id="Canteen_View"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Canteen_View" class="[ btn btn-default active ]">
                                                            Canteen
                                                        </label>
                                                        <label for="fancy-checkbox-success" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-info"
                                                           id="Health_Care_View"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Health_Care_View"
                                                               class="[ btn btn-default active ]">
                                                            Healthcare Plan
                                                        </label>
                                                        <label for="fancy-checkbox-info" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>


                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-danger"
                                                           id="Kindergarten_View"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">

                                                        <label for="Kindergarten_View"
                                                               class="[ btn btn-default active ]">
                                                            Kindergarten
                                                        </label>
                                                        <label for="fancy-checkbox-danger" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-default"
                                                           id="Laptop_View"
                                                           value="Laptop"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Laptop_View" class="[ btn btn-default active ]">
                                                            Laptop
                                                        </label>
                                                        <label for="fancy-checkbox-default" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-danger"
                                                           id="Library_View"
                                                           value="Library"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">

                                                        <label for="Library_View" class="[ btn btn-default active ]">
                                                            Library
                                                        </label>
                                                        <label for="fancy-checkbox-danger" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-primary"
                                                           id="Mobile_View"
                                                           value="Mobile"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Mobile_View" class="[ btn btn-default active ]">
                                                            Mobile
                                                        </label>
                                                        <label for="fancy-checkbox-primary" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-success"
                                                           id="Paid_Leave_View"
                                                           value="Paid_Leave"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Paid_Leave_View" class="[ btn btn-default active ]">
                                                            Paid Leave
                                                        </label>
                                                        <label for="fancy-checkbox-success" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-info"
                                                           id="Team_Activity_View"
                                                           value="Team_Activity"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Team_Activity_View"
                                                               class="[ btn btn-default active ]">
                                                            Team Activities
                                                        </label>
                                                        <label for="fancy-checkbox-info" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-default"
                                                           id="Training_View"
                                                           value="Training"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Training_View" class="[ btn btn-default active ]">
                                                            Training
                                                        </label>
                                                        <label for="fancy-checkbox-default" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-primary"
                                                           id="Transportation_View"
                                                           value="Transportation"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Transportation_View"
                                                               class="[ btn btn-default active ]">
                                                            Transportation
                                                        </label>
                                                        <label for="fancy-checkbox-primary" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-success"
                                                           id="Travel_Opportunities_View" value="Travel_Opportunities"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Travel_Opportunities_View"
                                                               class="[ btn btn-default active ]">
                                                            Travel Opportunities
                                                        </label>
                                                        <label for="fancy-checkbox-success" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="[ form-group ]">
                                                    <input type="checkbox" name="fancy-checkbox-info" id="Vouchers_View"
                                                           value="Vouchers"
                                                           autocomplete="off" disabled/>
                                                    <div class="[ btn-group ]">
                                                        <label for="Vouchers_View" class="[ btn btn-default active ]">
                                                            Vouchers
                                                        </label>
                                                        <label for="fancy-checkbox-info" class="[ btn btn-info ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{--Modal Edit Working Preferences--}}
                            <div class="modal fade" id="modalFormWorkingPreferences" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Working Preferences</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <p class="statusMsg"></p>
                                            <form role="form" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="">* Preferred Working Location</label>
                                                    </div>
                                                    <div class="col-sm-6 text-right pr-5">
                                                    </div>
                                                    <div class="col-sm-12 m-1">
                                                        <select class="js-example-basic-multiple" name="states[]"
                                                                multiple="multiple"
                                                                style="width: 100%" aria-required="true"
                                                                id="select_working_location"
                                                                required>
                                                            {{--LOAD LOCATION IN MY_PROFILE AT PROVINCES CITY--}}
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 pl-5 pb-1">
                                                        <small class="legend">(Maximum 3 locations)</small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="">* Expected Job Category</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="">* Expected Job Level</label>
                                                    </div>
                                                    <div class="col-sm-6 p-4">
                                                        <select class="js-example-basic-multiple" name="states[]"
                                                                multiple="multiple"
                                                                style="width: 100%" aria-required="true"
                                                                id="select_expected_job_category"
                                                                required>
                                                            @if(count($job_category) > 0)
                                                                @foreach($job_category as $job_category)
                                                                    <option value="{{$job_category->name_job_category}}">{{$job_category->name_job_category}}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                        <div class="col-sm-6 pl-3 pb-1">
                                                            <small class="legend">(Maximum 3 category)</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 pt-4">
                                                        <select class="form-control" id="select_expected_job_level"
                                                                style="height: auto">
                                                            <option class="form-select" value="-1">Please select ...
                                                            </option>

                                                            @if(count($job_level) > 0)
                                                                @foreach($job_level as $job_lev)
                                                                    @if($working_preferences->expected_job_level == $job_lev->name)
                                                                        <option class="form-select"
                                                                                value="{{$job_lev->name}}"
                                                                                selected>{{$job_lev->name}}</option>
                                                                    @else
                                                                        <option class="form-select"
                                                                                value="{{$job_lev->name}}">{{$job_lev->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="">* Expected Salary (USD per month)</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for=""></label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="e.g. 5000"
                                                               id="expected_salary"
                                                               value="{{$working_preferences->expected_salary}}"/>
                                                    </div>
                                                    <div class="col-sm-6"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 p-4">
                                                        <label for="">* My Top 5 Desired Benefits</label>
                                                    </div>
                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-sm-4">
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-default"
                                                                   id="Awards"
                                                                   value="Awards"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Awards" class="[ btn btn-default active ]">
                                                                    Awards
                                                                </label>
                                                                <label for="fancy-checkbox-default"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-primary"
                                                                   id="Bonus"
                                                                   value="Bonus"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Bonus" class="[ btn btn-default active ]">
                                                                    Bonus
                                                                </label>
                                                                <label for="fancy-checkbox-primary"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-success"
                                                                   id="Canteen"
                                                                   value="Canteen"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Canteen" class="[ btn btn-default active ]">
                                                                    Canteen
                                                                </label>
                                                                <label for="fancy-checkbox-success"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-info"
                                                                   id="Health_Care"
                                                                   value="Health_Care"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Health_Care"
                                                                       class="[ btn btn-default active ]">
                                                                    Healthcare Plan
                                                                </label>
                                                                <label for="fancy-checkbox-info"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>


                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-danger"
                                                                   id="Kindergarten"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">

                                                                <label for="Kindergarten"
                                                                       class="[ btn btn-default active ]">
                                                                    Kindergarten
                                                                </label>
                                                                <label for="fancy-checkbox-danger"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-default"
                                                                   id="Laptop"
                                                                   value="Laptop"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Laptop" class="[ btn btn-default active ]">
                                                                    Laptop
                                                                </label>
                                                                <label for="fancy-checkbox-default"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-danger"
                                                                   id="Library"
                                                                   value="Library"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">

                                                                <label for="Library" class="[ btn btn-default active ]">
                                                                    Library
                                                                </label>
                                                                <label for="fancy-checkbox-danger"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-primary"
                                                                   id="Mobile"
                                                                   value="Mobile"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Mobile" class="[ btn btn-default active ]">
                                                                    Mobile
                                                                </label>
                                                                <label for="fancy-checkbox-primary"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-success"
                                                                   id="Paid_Leave"
                                                                   value="Paid_Leave"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Paid_Leave"
                                                                       class="[ btn btn-default active ]">
                                                                    Paid Leave
                                                                </label>
                                                                <label for="fancy-checkbox-success"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-info"
                                                                   id="Team_Activity"
                                                                   value="Team_Activity"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Team_Activity"
                                                                       class="[ btn btn-default active ]">
                                                                    Team Activities
                                                                </label>
                                                                <label for="fancy-checkbox-info"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-default"
                                                                   id="Training"
                                                                   value="Training"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Training"
                                                                       class="[ btn btn-default active ]">
                                                                    Training
                                                                </label>
                                                                <label for="fancy-checkbox-default"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-primary"
                                                                   id="Transportation"
                                                                   value="Transportation"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Transportation"
                                                                       class="[ btn btn-default active ]">
                                                                    Transportation
                                                                </label>
                                                                <label for="fancy-checkbox-primary"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-success"
                                                                   id="Travel_Opportunities"
                                                                   value="Travel_Opportunities"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Travel_Opportunities"
                                                                       class="[ btn btn-default active ]">
                                                                    Travel Opportunities
                                                                </label>
                                                                <label for="fancy-checkbox-success"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <div class="[ form-group ]">
                                                            <input type="checkbox" name="fancy-checkbox-info"
                                                                   id="Vouchers"
                                                                   value="Vouchers"
                                                                   autocomplete="off"/>
                                                            <div class="[ btn-group ]">
                                                                <label for="Vouchers"
                                                                       class="[ btn btn-default active ]">
                                                                    Vouchers
                                                                </label>
                                                                <label for="fancy-checkbox-info"
                                                                       class="[ btn btn-info ]">
                                                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                                                    <span> </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <div class="col-sm-12 mr-5">
                                                <div class="col-sm-6 text-left">
                                                    (<strong class="text-red">*</strong>) is required field
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary submitBtn"
                                                            onclick="submitWorkingPreferencesForm()">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Modal Edit Working Preferences--}}
                        </div>
                    @endforeach
                @endif
            @endif{{--End  Working Preferences --}}
        </div>{{--End Container--}}


    </section>
@endsection

@section('scripts-end')

    <script src="{{ asset('js/x-editable/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/x-editable/bootstrap-editable.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="{{ asset('js/my_profile.js') }}"></script>

    <script>


        // $(document).ready(function() {
        //     //toggle `popup` / `inline` mode
        //     $.fn.editable.defaults.mode = 'inline';
        //
        //     //make username editable
        //     $('#username').editable();
        //
        //     //make status editable
        //     $('#status').editable({
        //         type: 'select',
        //         title: 'Select status',
        //         placement: 'right',
        //         value: 2,
        //         source: [
        //             {value: 1, text: 'status 1'},
        //             {value: 2, text: 'status 2'},
        //             {value: 3, text: 'status 3'}
        //         ]
        //         ,pk: 1
        //         ,url: '/post'
        //
        //     });
        // });


        // $(document).ready(function() {
        //
        //     $("#hide").click(function(){
        //         $("#show-section").hide();
        //         $("#hide-section").css("z-index", "1");
        //         alert("hello");
        //     });
        // })

    </script>
@endsection

