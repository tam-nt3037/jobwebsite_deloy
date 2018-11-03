@extends('layouts.app2')
@section('content')


    <!-- Start info Area -->
    <div style="position: absolute;right: 0;left: 300px; padding-top:80px; overflow-x: hidden">
        @foreach($edit as $edt)

            {{--            <form action="{{action('RecruitController@update', $edt->id_posts)}}" method="post">--}}
            <form method="PUT">
                <input type="text" id="id_posts" value="{{$edt->id_posts}}" hidden/>
                {{ csrf_field() }}

                <div class="container" style=" padding-top: 50px; ">
                    <p style="font-size: 24px">Update Post
                    <p>
                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Job Title</h5></div>
                        <div class="col-md-9 col-sm-9">
                            <input id="job_title" name="job_title" style="font-size: 16px" type="text"
                                   class="form-control" aria-label="Sizing example input"
                                   aria-describedby="inputGroup-sizing-default" placeholder="ex: Senior UX Designer"
                                   value="{{$edt->job_title}}"/>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Job Level</h5></div>
                        <div class="col-md-9 col-sm-9">
                            <select name="id_level" id="id_level" style="width: 100%; height: auto;font-size: 16px"
                                    class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default">

                                @foreach($level_job as $level)

                                    @if( $level->id == $edt->id_level )
                                        <option value="{{$level->id}}" selected>{{$level->name_level}}</option>
                                    @else
                                        <option value="{{$level->id}}">{{$level->name_level}}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right">
                            <h5 style="padding: 5px">Job Category </h5>
                            <p style="font-size: 12px; padding-right: 5px">(Up To 3 Categories)</p></div>
                        <div class="col-md-9 col-sm-9">

                            <input type="text" id="category_selected_data" value="{{$edt->name_job_category}}" hidden/>
                            <input type="text" id="job_category" value="{{$job_category}}" hidden/>
                            <input type="text" id="name_job_category" name="name_job_category" value="" hidden/>
                            <select class="js-example-basic-multiple" name=""
                                    multiple="multiple"
                                    style="width: 100%" aria-required="true"
                                    id="select_expected_job_category"
                                    required>

                            </select>

                            {{--<dl class="dropdown">--}}
                            {{--<dt>--}}
                            {{--<a id="title_a" href="#" style="width:100%">--}}
                            {{--<span id="result_span" class="hida; form-control" style="font-size: 16px; font-weight:normal; padding-bottom: 35px; " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> </span>--}}
                            {{--<!-- get value to update -->--}}
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
                            {{--<input type="checkbox" id="{{$fina->name_job_category}}" value="{{$fina->name_job_category}}"/> {{$fina->name_job_category}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--<div class="col-md-4 col-sm-4" style="font-size: 16px">--}}
                            {{--<li style="font-weight: normal; background-color: #f3f3f4; color: #0e7ccd" >--}}
                            {{--<label style="padding-left: 10px; padding-top: 5px">Technology</label></li>--}}

                            {{--@foreach($tech as $tech)--}}
                            {{--<li style="padding-left: 20px">--}}
                            {{--<input type="checkbox" id="{{$tech->name_job_category}}" value="{{$tech->name_job_category}}"/> {{$tech->name_job_category}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--<div class="col-md-4 col-sm-4" style="font-size: 16px">--}}
                            {{--<li style="font-weight: normal; background-color: #f3f3f4; color: #0e7ccd" >--}}
                            {{--<label style="padding-left: 10px; padding-top: 5px">Front Office</label></li>--}}

                            {{--@foreach($front as $front)--}}
                            {{--<li style="padding-left: 20px">--}}
                            {{--<input type="checkbox" id="{{$front->name_job_category}}" value="{{$front->name_job_category}}" /> {{$front->name_job_category}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</dd>--}}
                            {{--<!-- get value for js -->--}}
                            {{--<p id="cate" >{{$edt->name_job_category}}</p>--}}
                            {{--</dl>--}}
                        </div>

                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right">
                            <h5 style="padding: 5px">Job Location</h5>
                            <p style="font-size: 12px; padding-right: 5px">(Up To 3 Locations)</p></div>
                        <div class="col-md-9 col-sm-9">
                            <input type="text" id="location_selected_data" value="{{$edt->location_work}}" hidden/>
                            <input type="text" id="job_location" value="{{$job_location}}" hidden/>
                            <select class="js-example-basic-multiple" name=""
                                    multiple="multiple"
                                    style="width: 100%" aria-required="true"
                                    id="select_working_location_edit_post"
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
                            {{--<input type="checkbox" id="{{$south->name}}" value="{{$south->name}}" /> {{$south->name}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                            {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                            {{--<label style="padding-left: 10px; padding-top: 5px">North</label></li>--}}

                            {{--@foreach($north as $north)--}}
                            {{--<li style="padding-left: 20px">--}}
                            {{--<input type="checkbox" id="{{$north->name}}" value="{{$north->name}}" /> {{$north->name}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                            {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                            {{--<label style="padding-left: 10px; padding-top: 5px">Middle</label></li>--}}

                            {{--@foreach($middle as $middle)--}}
                            {{--<li style="padding-left: 20px">--}}
                            {{--<input type="checkbox" id="{{$middle->name}}" value="{{$middle->name}}" /> {{$middle->name}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3 col-sm-3" style="font-size: 16px">--}}
                            {{--<li style="font-weight: lighter; background-color: #f3f3f4; color: #0e7ccd" >--}}
                            {{--<label style="padding-left: 10px; padding-top: 5px">Other</label></li>--}}

                            {{--@foreach($other as $other)--}}
                            {{--<li style="padding-left: 20px">--}}
                            {{--<input type="checkbox" id="{{$other->name}}" value="{{$other->name}}" /> {{$other->name}}</li>--}}
                            {{--@endforeach--}}

                            {{--</div>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</dd>--}}
                            {{--<p id="loca" >{{$edt->location_work}}</p>--}}
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
                                    <select name="id_level_salary" id="id_level_salary"
                                            style="width: 100%; height: auto;font-size: 16px"
                                            class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">

                                        @foreach($salary as $salary)
                                            @if( $salary->id == $edt->id_level_salary )
                                                <option value="{{$salary->id}}"
                                                        selected>{{$salary->name_level_salary}}</option>
                                            @else
                                                <option value="{{$salary->id}}">{{$salary->name_level_salary}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Description</h5></div>
                        <div class="col-md-9 col-sm-9" style="padding-bottom: 10px">
                            <textarea style="font-size: 16px" class="form-control" rows="5" id="description_work"
                                      name="description_work"
                                      placeholder="Enter your description here">{{$edt->description_work}}</textarea>
                            <div style="font-size: 12px"><i>(You have 14500 character remainings)</i></div>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Requirements</h5></div>
                        <div class="col-md-9 col-sm-9" style="padding-bottom: 10px">
                            <textarea style="font-size: 16px" class="form-control" rows="5" id="require_work"
                                      name="require_work"
                                      placeholder="Enter your description here">{{$edt->require_work}}</textarea>
                            <div style="font-size: 12px"><i>(You have 14500 character remainings)</i></div>
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
                                    <select name="id_qualification" id="id_qualification"
                                            style="width: 100%; height: auto;font-size: 16px"
                                            class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">

                                        @foreach($qualification as $qualification)
                                            @if( $qualification->id == $edt->id_qualification )
                                                <option value="{{$qualification->id}}"
                                                        selected>{{$qualification->name_qualification}}</option>
                                            @else
                                                <option value="{{$qualification->id}}">{{$qualification->name_qualification}}</option>
                                            @endif
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
                                    <select name="id_type_work" id="id_type_work"
                                            style="width: 100%; height: auto;font-size: 16px"
                                            class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">
                                        <option value="" disabled selected>Please Select</option>

                                        @foreach($type_work as $type_work)
                                            @if( $type_work->id == $edt->id_type_work )
                                                <option value="{{$type_work->id}}"
                                                        selected>{{$type_work->name_type_work}}</option>
                                            @else
                                                <option value="{{$type_work->id}}">{{$type_work->name_type_work}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Years Of Experience</h5>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input name="year_experience" id="year_experience" style="font-size: 16px" type="number"
                                   class="form-control"
                                   aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                   value="{{$edt->year_experience}}"/>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Number Of Recruitment</h5>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input name="number_recruits" id="number_recruits" style="font-size: 16px" type="number"
                                   class="form-control"
                                   value="{{$edt->number_recruits}}"/>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right">
                            <h5 style="padding: 5px">Gender Requirement</h5>
                        </div>

                        <div class="col-sm-9" style="padding: 5px">
                            <div class="row" style="padding-left: 25px; padding-bottom: 1px">
                                <div class="col-md-4" style="padding-left: 0">
                                    <select name="gender" id="gender" style="width: 100%; height: auto;font-size: 16px"
                                            class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default">
                                        @if($edt->gender == 'Anyone')
                                            <option value="Anyone" selected>Anyone</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        @elseif($edt->gender == 'Male')
                                            <option value="Anyone">Anyone</option>
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                        @else
                                            <option value="Anyone">Anyone</option>
                                            <option value="Male">Male</option>
                                            <option value="Female" selected>Female</option>
                                        @endif
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
                            <div class="tag-editor">
                                <input type="text" id="skills_selected_data" value="{{$edt->skills}}" hidden/>
                                <input type="text" id="job_skills" value="{{$job_skills}}" hidden/>
                                <select class="js-example-basic-multiple" name=""
                                        multiple="multiple"
                                        style="width: 100%" aria-required="true"
                                        id="tags_skills"
                                        required>

                                </select>

                            </div>
                            <p id="skill" hidden>{{$edt->skills}}</p>
                            <input name="skills" id="skills" type="text" value="" hidden/>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding: 10px">Preferred Language</h5>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select name="id_languages_profile" id="id_languages_profile"
                                    style="width: 100%; height: auto;font-size: 16px"
                                    class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default">

                                @foreach($languages_profile as $language)
                                    @if($language->id == $edt->id_languages_profile)
                                        <option value="{{$language->id}}"
                                                selected>{{$language->name_languages_profile}}</option>
                                    @else()
                                        <option value="{{$language->id}}">{{$language->name_languages_profile}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row" style="padding: 5px">
                        <input type="text" id="time_submission_data" value="{{$edt->time_for_submission}}" hidden/>
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
                            <input type="text" id="benefits_data" value="{{$edt->benefit}}" hidden/>
                            <textarea class="form-control" id="article-ckeditor-edit-benefit"
                                      name="article-ckeditor-edit-benefit"
                                      cols="20"
                                      rows="10"
                                      placeholder="Input benefits"></textarea>

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
                    {{--<textarea class="form-control" id="article-ckeditor-edit-benefit"--}}
                    {{--name="article-ckeditor-edit-benefit"--}}
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
                    <div class="col-md-4 col-sm-4">
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="btn btn-primary float-right" href="/admin/dashbroad"
                           style="font-size: 20px; float: left; padding: 10px 50px;">Back</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <button type="submit" class="btn btn-success" id="done"
                                style="font-size: 20px; float: left; padding: 10px 50px;">Done
                        </button>
                    </div>
                </div>


            </form>
        @endforeach
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
        CKEDITOR.replace('article-ckeditor-edit-benefit');
    </script>

    <script src="{{ asset('js/edit_post.js') }}"></script>

@endsection

