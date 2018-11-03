@extends('layouts.app2')
@section('content')

    <!-- Start info Area -->
    <div style="position: absolute;right: 0;left: 300px; padding-top:80px; overflow-x: hidden">
        {{--<form action="{{action('RecruitController@store')}}" method="post" >--}}
        <form method="POST">
            {{ csrf_field() }}

            <div class="container" style=" padding-top: 50px; ">
                <p style="font-size: 24px">The Job
                <p>
                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Job Title</h5></div>
                    <div class="col-md-9 col-sm-9">
                        <input id="job_title_new" name="job_title" style="font-size: 16px" type="text" class="form-control"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                               placeholder="ex: Senior UX Designer" autofocus/>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Job Level</h5></div>
                    <div class="col-md-9 col-sm-9">
                        <select name="id_level_new" id="id_level_new" style="width: 100%; height: auto;font-size: 16px" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <option value="" disabled selected>Please Select</option>

                            @foreach($level_job as $level)
                                <option value="{{$level->id}}">{{$level->name_level}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Job Category </h5>
                        <p style="font-size: 12px; padding-right: 5px">(Up To 3 Categories)</p></div>
                    <div class="col-md-9 col-sm-9">

                        <input type="text" id="job_category_new" value="{{$job_category}}" hidden/>
                        <input type="text" id="name_job_category_new" name="name_job_category_new" value="" hidden/>
                        <select class="js-example-basic-multiple" name=""
                                multiple="multiple"
                                style="width: 100%" aria-required="true"
                                id="select_expected_job_category_new"
                                required>

                        </select>

                        {{--<dl class="dropdown">--}}
                        {{--<dt>--}}
                        {{--<a id="title_a" href="#" style="width:100%">--}}
                        {{--<span id="result_span" class="hida; form-control" style="font-size: 16px; font-weight:normal; padding-bottom: 35px; " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> </span>--}}
                        {{--<input name="name_job_category" id="name_job_category" type="text" value="" hidden/>--}}
                        {{--</a>--}}
                        {{--</dt>--}}

                        {{--<dd>--}}
                        {{--<div id="div_multi" class="mutliSelect">--}}
                        {{--<ul class="row" id="menu_ul" style="padding-top: 5px">--}}
                        {{--<div class="col-md-4 col-sm-4" style="font-size: 16px">--}}
                        {{--<li style="font-weight: normal; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">Financial Services</label></li>--}}

                        {{--@foreach($fina as $fina)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$fina->name_job_category}}"/> {{$fina->name_job_category}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4" style="font-size: 16px">--}}
                        {{--<li style="font-weight: normal; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">Technology</label></li>--}}

                        {{--@foreach($tech as $tech)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$tech->name_job_category}}" /> {{$tech->name_job_category}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4" style="font-size: 16px">--}}
                        {{--<li style="font-weight: normal; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">Front Office</label></li>--}}

                        {{--@foreach($front as $front)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$front->name_job_category}}" /> {{$front->name_job_category}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--</dd>--}}
                        {{--</dl>--}}

                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Job Location</h5>
                        <p style="font-size: 12px; padding-right: 5px">(Up To 3 Locations)</p></div>
                    <div class="col-md-9 col-sm-9">

                        <input type="text" id="job_location_new" value="{{$job_location}}" hidden/>
                        <select class="js-example-basic-multiple" name=""
                                multiple="multiple"
                                style="width: 100%" aria-required="true"
                                id="select_working_location_edit_post_new"
                                required>


                        </select>

                        {{--<dl class="dropdown">--}}
                        {{--<dt>--}}
                        {{--<a id="title_a2" href="#" style="width:100%">--}}
                        {{--<span id="result_span2" class="hida; form-control" style="font-size: 16px; font-weight:normal; padding-bottom: 35px; " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"></span>--}}
                        {{--<input name="location_work" id="location_work" type="text" value="" hidden/>--}}
                        {{--</a>--}}
                        {{--</dt>--}}

                        {{--<dd>--}}
                        {{--<div id="div_multi2" class="mutliSelect">--}}
                        {{--<ul class="row" id="menu_ul2" style="padding-top: 5px;">--}}
                        {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                        {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">South</label></li>--}}

                        {{--@foreach($south as $south)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$south->name}}" /> {{$south->name}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                        {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">North</label></li>--}}

                        {{--@foreach($north as $north)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$north->name}}" /> {{$north->name}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                        {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">Middle</label></li>--}}

                        {{--@foreach($middle as $middle)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$middle->name}}" /> {{$middle->name}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                        {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                        {{--<label style="padding-left: 10px; padding-top: 5px">Other</label></li>--}}

                        {{--@foreach($other as $other)--}}
                        {{--<li style="padding-left: 20px">--}}
                        {{--<input type="checkbox" value="{{$other->name}}" /> {{$other->name}}</li>--}}
                        {{--@endforeach--}}

                        {{--</div>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--</dd>--}}
                        {{--</dl>--}}

                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Salary </h5>
                        <p style="font-size: 12px; padding-right: 5px">(USD) </p>
                    </div>

                    <div class="col-sm-9" style="padding: 5px">
                        <div class="row" style="padding-left: 25px; padding-bottom: 10px; padding-top: 1px">
                            <div class="col-md-4" style="padding-left: 0">
                                <select name="id_level_salary_new" id="id_level_salary_new" style="width: 100%; height: auto;font-size: 16px"
                                        class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">

                                    @foreach($salary as $salary)
                                        <option value="{{$salary->id}}">{{$salary->name_level_salary}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Description</h5></div>
                    <div class="col-md-9 col-sm-9" style="padding-bottom: 10px">
                        <textarea style="font-size: 16px" class="form-control" rows="5" id="description_work_new"
                                  name="description_work" placeholder="Enter your description here"></textarea>
                        <div style="font-size: 12px"><i></i></div>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Requirements</h5></div>
                    <div class="col-md-9 col-sm-9" style="padding-bottom: 10px">
                        <textarea style="font-size: 16px" class="form-control" rows="5" id="require_work_new"
                                  name="require_work" placeholder="Enter your description here"></textarea>
                        <div style="font-size: 12px"><i></i></div>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Qualification Requirement</h5>
                        <p style="font-size: 12px; padding-right: 5px">(Up) </p>
                    </div>

                    <div class="col-sm-9" style="padding: 5px">
                        <div class="row" style="padding-left: 25px; padding-bottom: 1px">
                            <div class="col-md-4" style="padding-left: 0">
                                <select name="id_qualification_new" id="id_qualification_new" style="width: 100%; height: auto;font-size: 16px"
                                        class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                    <option value="" disabled selected>Please Select</option>

                                    @foreach($qualification as $qualification)
                                        <option value="{{$qualification->id}}">{{$qualification->name_qualification}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Type Work</h5>
                    </div>

                    <div class="col-sm-9" style="padding: 5px">
                        <div class="row" style="padding-left: 25px; padding-bottom: 1px">
                            <div class="col-md-4" style="padding-left: 0">
                                <select name="id_type_work_new" id="id_type_work_new" style="width: 100%; height: auto;font-size: 16px"
                                        class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                    <option value="" disabled selected>Please Select</option>

                                    @foreach($type_work as $type_work)
                                        <option value="{{$type_work->id}}">{{$type_work->name_type_work}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Years Of Experience</h5></div>
                    <div class="col-md-2 col-sm-2">
                        <input name="year_experience" id="year_experience_new" style="font-size: 16px" type="number" class="form-control"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Number Of Recruitment</h5></div>
                    <div class="col-md-2 col-sm-2">
                        <input name="number_recruits" id="number_recruits_new" style="font-size: 16px" type="number" class="form-control"
                               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Gender Requirement</h5>
                    </div>

                    <div class="col-sm-9" style="padding: 5px">
                        <div class="row" style="padding-left: 25px; padding-bottom: 1px">
                            <div class="col-md-4" style="padding-left: 0">
                                <select name="gender" id="gender_new" style="width: 100%; height: auto;font-size: 16px"
                                        class="form-control" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-default">
                                    <option value="Anyone">Anyone</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 5px">Skill Tags </h5>
                        <p style="font-size: 12px; padding-right: 5px">(Up To 3 Tags)</p>
                    </div>
                    <div class="col-md-9 col-sm-9">

                        <input type="text" id="job_skills_new" value="{{$job_skills}}" hidden/>
                        <select class="js-example-basic-multiple" name=""
                                multiple="multiple"
                                style="width: 100%" aria-required="true"
                                id="tags_skills_new"
                                required>

                        </select>

                        <!-- avoid not null -->
                        <input name="skills" id="skills" type="text" value="" hidden/>

                        <!-- <div class="tag-editor">
                            <div class="tag-editor-tags">
                                <ul style="padding-left: 0px">
                                    <li class="inputlist"><input type="text" style="font-size: 16px" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter tag skill name"/></li>
                                </ul>
                                <input name="skills" id="skills" type="text" value="" hidden/>

                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Preferred Language</h5></div>
                    <div class="col-md-9 col-sm-9">
                        <select name="id_languages_profile_new" id="id_languages_profile_new" style="width: 100%; height: auto;font-size: 16px"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default">

                            @foreach($languages_profile as $language)
                                <option value="{{$language->id}}">{{$language->name_languages_profile}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Time for submission</h5></div>
                    <div class="col-md-9 col-sm-9">
                        <input type="date" id="time_for_submission_new" value="" placeholder="Please choose your date"/>
                    </div>
                </div>

                <div class="row" style="padding: 5px">
                    <div class="col-md-3 col-sm-3 text-right">
                        <h5 style="padding: 10px">Benefits</h5>
                    </div>

                    <div class="input-group col-md-9 col-sm-9" style="padding-left: 10px">
                        <textarea class="form-control" id="article-ckeditor-benefit"
                                  name="article-ckeditor-benefit"
                                  cols="20"
                                  rows="10"
                                  placeholder="Input benefits"></textarea>

                    </div>

                </div>

                <div class="row" style="padding: 5px">
                    {{--<div class="col-md-3 col-sm-3 text-right">--}}
                        {{--<h5 style="padding: 10px">Contact Person</h5>--}}
                    {{--</div>--}}
                    {{--<div class="row col-sm-9" style="padding: 5px; padding-left:  15px">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<input id="contact_person" name="contact_person" style="font-size: 16px" type="text"--}}
                                   {{--class="form-control" aria-label="Sizing example input"--}}
                                   {{--aria-describedby="inputGroup-sizing-default" placeholder="ex: Mrs. Ngon"/>--}}
                        {{--</div>--}}
                        {{--<div class="row col-md-6" style="padding: 5px">--}}
                            {{--<div class="col-md-2" style="padding-right: 0">--}}
                            {{--<label class="switch">--}}
                            {{--<input type="checkbox" checked>--}}
                            {{--<span style="resize: vertical" class="slider round"></span>--}}
                            {{--</label>--}}
                            {{--</div>--}}
                            {{--<label style="font-size: 16px">Show in job ads</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

                <div class="row" style="padding: 5px">
                    {{--<div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Email For Applications</h5>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9 col-sm-9">--}}
                        {{--<input style="font-size: 16px" type="email" class="form-control"--}}
                               {{--aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"--}}
                               {{--placeholder="ex: hoasen.not_for_profit@gmail.com"/>--}}
                        {{--<div style="font-size: 12px"><i>(Email addresses are hidden to jobseekers.)</i></div>--}}
                    {{--</div>--}}
                </div>

                <div class="row" style="padding: 5px">
                    <div class="border border-primary"
                         style="background: #49e4fa; width: 100%; height: 250px; padding: 20px">
                        <p style="font-size: 25px; color: #F4A460; font-weight: bold">Service Pack (300% effective)</p>
                        <label style="font-weight: normal; font-size: 18px; color: blue">Service For Posting</label>

                        <ul class="nav nav-tabs">
                            <li class="active" style="width: 34%; text-align: center"><a data-toggle="tab"
                                                                                         href="#menu1">Interesting
                                    News</a></li>
                            <li style="width: 33%; text-align: center"><a data-toggle="tab" href="#menu2">Hot News</a>
                            </li>
                            <li style="width: 33%; text-align: center"><a data-toggle="tab" href="#menu3">Free News</a>
                            </li>
                        </ul>

                        <div class="tab-content" style="background: white; padding: 15px 5px 5px 5px">
                            <div id="menu1" class="tab-pane fade in active row" style="font-size: 18px">
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="4" hidden/>
                                        <span class="label-text" style="font-size: 18px">4 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>200 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="3" hidden/>
                                        <span class="label-text" style="font-size: 18px">8 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>400 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="2" hidden/>
                                        <span class="label-text" style="font-size: 18px">12 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>600 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="1" hidden/>
                                        <span class="label-text" style="font-size: 18px">24 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>1200 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4" style="padding:0">
                                    <span><img src="{{ asset('img/interesting_news.png') }}" height="50px" width="50px"
                                               alt="" title=""> Best way to find potential job seekers </span>
                                </div>
                            </div>

                            <div id="menu2" class="tab-pane fade row" style="font-size: 18px">
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="8" hidden/>
                                        <span class="label-text" style="font-size: 18px">4 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>99 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="7" hidden/>
                                        <span class="label-text" style="font-size: 18px">8 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>190 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="6" hidden/>
                                        <span class="label-text" style="font-size: 18px">12 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>280 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="5" hidden/>
                                        <span class="label-text" style="font-size: 18px">24 weeks
                                            <p style="font-size: 14px; color: red; padding-left: 27px"><b>500 USD</b></p>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-4 col-sm-4" style="padding:0">
                                    <span><img src="{{ asset('img/hot_news.png') }}" height="45px" width="45px" alt=""
                                               title=""> Finding job seekers is easier </span>
                                </div>
                            </div>

                            <div id="menu3" class="tab-pane fade row" style="font-size: 18px">
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="11" hidden checked/>
                                        <span class="label-text" style="font-size: 18px">4 weeks </span>
                                        <p style="font-size: 14px; color: red; padding-left: 27px"><b>Free</b></p>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="10" hidden/>
                                        <span class="label-text" style="font-size: 18px">8 weeks </span>
                                        <p style="font-size: 14px; color: red; padding-left: 27px"><b>Free</b></p>
                                    </label>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <label>
                                        <input type="radio" name="id_service_pack" value="9" hidden/>
                                        <span class="label-text" style="font-size: 18px">12 weeks </span>
                                        <p style="font-size: 14px; color: red; padding-left: 27px"><b>Free</b></p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>

                {{--<p style="font-size: 24px">Your Company--}}
                {{--<p>--}}

                {{--<div class="row" style="padding: 5px">--}}
                    {{--<div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Company Name</h5></div>--}}
                    {{--<div class="col-md-9 col-sm-9">--}}
                        {{--<input id="company_name" name="company_name" style="font-size: 16px" type="text"--}}
                               {{--class="form-control" aria-label="Sizing example input"--}}
                               {{--aria-describedby="inputGroup-sizing-default" placeholder="ex: Hoa Sen University"/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row" style="padding: 5px">--}}
                    {{--<div class="col-md-3 col-sm-3 text-right">--}}
                        {{--<h5 style="padding: 5px">Company Size</h5>--}}
                        {{--<p style="font-size: 12px; padding-right: 5px">(Optional)</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9 col-sm-9">--}}
                        {{--<select name="company_size" style="width: 100%; height: auto;font-size: 16px"--}}
                                {{--class="form-control" aria-label="Sizing example input"--}}
                                {{--aria-describedby="inputGroup-sizing-default">--}}
                            {{--<option value="" disabled selected>Please Select</option>--}}
                            {{--<option value="Less than 10">Less than 10</option>--}}
                            {{--<option value="10-24">10-24</option>--}}
                            {{--<option value="25-99">25-99</option>--}}
                            {{--<option value="100-499">100-499</option>--}}
                            {{--<option value="500-999">500-999</option>--}}
                            {{--<option value="1.000-4.999">1.000-4.999</option>--}}
                            {{--<option value="5.000-9.999">5.000-9.999</option>--}}
                            {{--<option value="10.000-19.000">10.000-19.000</option>--}}
                            {{--<option value="Over 20000">Over 20.000</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row" style="padding: 5px">--}}
                    {{--<div class="col-md-3 col-sm-3 text-right">--}}
                        {{--<h5 style="padding: 5px">Company Address</h5>--}}
                        {{--<p style="font-size: 12px; padding-right: 5px">(Optional)</p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9 col-sm-9">--}}
                        {{--<input id="company_address" name="company_address" style="font-size: 16px" type="text"--}}
                               {{--class="form-control" aria-label="Sizing example input"--}}
                               {{--aria-describedby="inputGroup-sizing-default"--}}
                               {{--placeholder="ex: 130 Suong Nguyet Anh, Ben Thanh Ward, District 1"/>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row" style="padding: 5px">--}}
                    {{--<div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Company Profile</h5></div>--}}
                    {{--<div class="col-md-9 col-sm-9" style="padding-bottom: 10px">--}}
                        {{--<textarea style="font-size: 16px" class="form-control" rows="5" id="company_profile"--}}
                                  {{--name="company_profile" placeholder="Enter company profile..."></textarea>--}}
                        {{--<div style="font-size: 12px"><i>(You have 10000 character remainings)</i></div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row" style="padding: 5px">--}}
                    {{--<div class="col-md-3 col-sm-3 text-right">--}}
                        {{--<h5 style="padding: 10px">Benefits</h5>--}}
                    {{--</div>--}}

                    {{--<div class="input-group col-md-9 col-sm-9" style="padding-left: 10px">--}}
                        {{--<div id="contenedor" style="width: 100%">--}}
                        {{--<div class="added">--}}
                        {{--<div class="row" style="padding-bottom: 5px">--}}

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div><a id="agregarCampo" class="btn btn-info" href="#">Add new benefit</a></div>--}}
                        {{--<textarea class="form-control" id="article-ckeditor-benefit"--}}
                                  {{--name="article-ckeditor-benefit"--}}
                                  {{--cols="20"--}}
                                  {{--rows="10"--}}
                                  {{--placeholder="Input benefits"></textarea>--}}

                    {{--</div>--}}

                {{--</div>--}}

                {{--<div class="row" style="padding: 5px">--}}
                {{--<div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Default Profile</h5></div>--}}
                {{--<div class="input-group col-md-9">--}}
                {{--<div class="form-group" style="padding: 10px">--}}
                {{--<div class="form-check">--}}
                {{--<label>--}}
                {{--<input type="checkbox" name="check_save_info" checked hidden> <span class="label-text" style="font-size: 18px"><i>Save above company info to my default company profile</i></span>--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="hr-line-dashed"></div>

                {{--<div class="row" style="padding: 5px">--}}
                {{--<div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Company Logo</h5></div>--}}
                {{--<div class="col-md-9 col-sm-9" style="padding-bottom: 10px">--}}
                {{--<div style="padding-bottom: 10px"><img id="blah" src="#" alt="your image" /></div>--}}
                {{--<div style="padding-left: 50px">--}}
                {{--<label style="padding-top: 5px;padding-bottom: 5px;padding-right: 20px;padding-left: 20px" class="btn btn-outline-primary btn-lg">Upload logo<input type="file" accept="image/x-png,image/gif,image/jpeg" onchange="readURL(this);" hidden></label>--}}
                {{--</div>--}}
                {{--<div style="font-size: 12px; padding-left: 10px"><i>(File type .jpg .jped .png .gif)</i></div>--}}
                {{--<div class="form-check" style="padding-top: 10px">--}}
                {{--<label>--}}
                {{--<input type="checkbox" name="check_show_logo" checked hidden> <span class="label-text" style="font-size: 16px">Display logo</span>--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="row" style="background: #333; padding: 10px">
                <div class="col-md-8 col-sm-8">
                </div>
                <div class="col-md-4 col-sm-4">
                    <button type="button" class="btn btn-primary" id="create_post_news"
                            style="font-size: 20px; float: left; padding: 10px 50px;">Post Job
                    </button>
                </div>
            </div>


        </form>
    </div>
    <!-- End info Area -->
@endsection

@section('scripts-first')
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
@endsection

@section('scripts-end')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor-benefit');
    </script>

    <script src="{{ asset('js/post_news.js') }}"></script>
@endsection


