@extends('layouts.app2')
@section('content')

    <div class="page-wrapper">
        <div class="page-container" style="position: absolute; overflow-x: hidden; width: 100%">
            <!-- MAIN CONTENT-->

            <div class="main-content">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ $error }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif
            <!-- END MAIN CONTENT-->
                @if(isset($data_recruit_info))
                    @foreach($data_recruit_info as $recruit_info)

                        <div class="row badge-light" style="padding: 0 45px 20px 45px; width: 100%">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Account Information</h2>
                                <form>
                                    @if(isset($account_recruit))
                                        @foreach($account_recruit as $account_rec)
                                            <div class="form-group">
                                                <label for="companyName">Email Address</label>
                                                <input type="text" class="form-control" id="companyName"
                                                       value="{{$account_rec->email}}"
                                                       disabled="true">
                                            </div>
                                        @endforeach
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="row badge-light" style="padding: 0 45px 20px 45px; width: 100%">
                            <div class="col-lg-12">

                                <h2 class="title-1 m-b-25">My Company Profile</h2>

                                {{--@if(Session::has('recruitID'))--}}
                                {{--{{ Session::get('recruitID') }}--}}
                                {{--@endif--}}

                                {{--<div class="table-responsive table--no-card m-b-40 p-2" >--}}
                                {{--</div>--}}

                                <label for="" hidden>ID</label>
                                <input type="text" value="{{$recruit_info->id_account_recruiter}}" hidden>

                                <form method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="companyName">Company Name</label>
                                        <input type="text" class="form-control" id="companyName" name="companyName"
                                               value="{{$recruit_info->company_name}}"
                                               placeholder="Enter company name">
                                    </div>
                                    <div class="form-group">

                                        <label for="companySize">Company Size</label>
                                        <select name="companySize" id="companySize"
                                                style="width: 100%; height: auto;font-size: 16px"
                                                class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-default">
                                            <?php
                                            $size = array('Please Select', 'Less than 10', '10-24', '25-99', '100-499', '500-999',
                                                '1.000-4.999', '5.000-9.999', '10.000-19.000', 'Over 20000');
                                            ?>
                                            @foreach($size as $sze)
                                                @if($sze == $recruit_info->company_size)
                                                    <option value="{{$recruit_info->company_size}}"
                                                            selected>{{$recruit_info->company_size}}</option>
                                                @else
                                                    <option value="{{$sze}}">
                                                        {{$sze}}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="companyAddress">Company Address</label>
                                        <input type="text" class="form-control" id="companyAddress"
                                               name="companyAddress"
                                               value="{{$recruit_info->company_address}}"
                                               placeholder="Enter company address">
                                    </div>
                                    <div class="form-group">
                                        <label for="contactName">Contact Name</label>
                                        <input type="text" class="form-control" id="contactName" name="contactName"
                                               value="{{$recruit_info->contact_name}}"
                                               placeholder="Enter contact name">
                                        {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="contactPhoneNumber">Contact Phone Number</label>
                                        <input type="text" class="form-control" id="contactPhoneNumber"
                                               name="contactPhoneNumber"
                                               value="{{$recruit_info->contact_phone_number}}"
                                               placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website"
                                               value="{{$recruit_info->website}}"
                                               placeholder="Enter your company website">
                                    </div>

                                    {{--<div class="form-check">--}}
                                    {{--<input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                                    {{--<label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                                    {{--</div>--}}

                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-lg btn-warning">Save</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="row badge-light" style="padding: 0 45px 80px 45px; width: 100%">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Company Logo</h2>

                                <div class="image ">
                                    @if($recruit_info->company_avatar != '')
                                        <img src="{{ asset('storage/logo_company/'.$recruit_info->company_avatar) }}" alt="Not found image"
                                             width="125px" height="125px"/>
                                    @else
                                        <img src="{{ asset('img/logoCompany/avatar-01.jpg') }}" alt="No Image"
                                             width="125px" height="125px"/>
                                    @endif
                                </div>
                                <div class="hr-line-dashed"></div>
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="logoCompany">File Logo</label>
                                        <input type="file" class="form-control-file" id="logoCompany" name="logoCompany"
                                               aria-describedby="fileHelp">
                                        <small id="fileHelp" class="form-text text-muted">Note: All of your job posts
                                            will use the same photos uploaded here.
                                        </small>
                                        <small id="fileHelp" class="form-text text-muted">(File type .jpg .jped .png
                                            .gif ; file size <1MB)
                                        </small>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-lg btn-warning">Save</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                @endforeach
            @endif
            <!-- END PAGE CONTAINER-->
            </div>
        </div>
    </div>

@endsection
