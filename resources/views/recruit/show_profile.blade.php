@extends('layouts.app2')
@section('content')


        <!-- Start info Area -->
<div style="position: absolute;right: 0;left: 300px; padding-top:80px; overflow-x: hidden">

    <div class="container" style=" padding-top: 50px; ">
        @foreach($profile_user as $profile)
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p style="font-size: 26px"><b>Profile Cadidate</b><p>
                </div>
                <div class="col-md-6 col-sm-6 text-right">
                    <button type="button" class="btn btn-outline-info" style="border-color: #17a2b8;" data-toggle="modal" data-target="#showCV">
                        <a href="#" style="text-decoration: none;">See CV</a>
                    </button> 
                    <!-- <span style="font-style: normal;">or</span>
                    <button type="button" class="btn btn-outline-info" style="border-color: #17a2b8;" data-toggle="modal" data-target="#showCV">
                        <a href="#" style="text-decoration: none;">Download CV</a>
                    </button> -->
                </div>

                <div class="modal fade bd-example-modal-lg" id="showCV" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <iframe  src="/storage/cv/{{$profile->cv}}#zoom=100" width="800px" height="750px">
                            This browser does not support PDFs. Please download the PDF to view it: <a href="/storage/cv/nguyen_thanh_tam_1534956219.pdf">Download CV</a>
                            </iframe >                    
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="card" style="padding: 20px">

                <form>     
                    
                    <div class="row" style="padding-left: 33px">
                        <div class="col-md-2 col-sm-2"><h5 style="padding-right: 10px">Full Name</h5></div>
                        <div class="col-md-9 col-sm-9">
                            <label style="font-size: 24px">{{$profile->last_name}} {{$profile->first_name}}</label>
                        </div>
                    </div>

                    <div class="row" style="padding-left: 33px">
                        <div class="col-md-2 col-sm-2"><h5 style="padding-right: 10px">Career</h5></div>
                        <div class="col-md-9 col-sm-9">
                            <label style="font-size: 20px">{{$profile->professional_title}}</label>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <fieldset class="scheduler-border"> 
                            <legend class="scheduler-border">Contact</legend> 

                                <div class="form-group row" style="padding: 5px">
                                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Phone Number</h5></div>
                                    <div class="col-md-9 col-sm-9">
                                        <label style="font-size: 16px">{{$profile->phone_number}}</label>
                                    </div>
                                </div>

                                    <div class="form-group row" style="padding: 5px">
                                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Email</h5></div>
                                        <div class="col-md-9 col-sm-9">
                                            <label style="font-size: 16px">{{$profile->email}}</label>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row" style="padding: 5px">
                                        <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Address</h5></div>
                                        <div class="col-md-9 col-sm-9">
                                            <label style="font-size: 16px">{{$profile->address}}, {{$profile->district}} district, {{$profile->city}}, {{$profile->country}}</label>
                                        </div>
                                    </div>

                        </fieldset>
                    </div>

                    <div class="card-body">
                        <fieldset class="scheduler-border"> 
                            <legend class="scheduler-border">More Informations</legend> 
                    
                                <div class="row" style="padding: 5px">
                                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Birth</h5></div>
                                    <div class="col-md-9 col-sm-9">
                                        <label style="font-size: 16px">{{$profile->doB}}</label>
                                    </div>
                                </div>

                                <div class="row" style="padding: 5px">
                                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Gender</h5></div>
                                    <div class="col-md-9 col-sm-9">
                                        <label style="font-size: 16px">{{$profile->gender}}</label>
                                    </div>
                                </div>

                                <div class="row" style="padding: 5px">
                                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Nationality</h5></div>
                                    <div class="col-md-9 col-sm-9">
                                        <label style="font-size: 16px">{{$profile->nationality}}</label>
                                    </div>
                                </div>

                                <div class="row" style="padding: 5px">
                                    <div class="col-md-3 col-sm-3 text-right"><h5 style="padding-right: 10px">Marital Status</h5></div>
                                    <div class="col-md-9 col-sm-9">
                                        <label style="font-size: 16px">{{$profile->marital_status}}</label>
                                    </div>
                                </div>     
                        </fieldset>
                    </div>
                </form>
            </div>   
        @endforeach
    </div>          

            <div class="row" style="background: #333; padding: 10px">
                <div class="col-md-4 col-sm-4">
                </div>
                <div class="col-md-4 col-sm-4">
                    <a class="btn btn-primary float-right" href="/admin/dashbroad" style="font-size: 20px; float: left; padding: 10px 50px;">Back</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    {{--<a href="#"><button class="btn btn-success" style="font-size: 20px; float: left; padding: 10px 50px;">Invite to interview</button></a>--}}
                </div>
            </div>
    
                
</div>

    <!-- End info Area -->

    <!-- ============ form fieldset =============== --> 
<style>
    fieldset.scheduler-border {
        border: 1px groove #eee !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 10px 20px 1.5em 20px !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
        background-color: #fbfbfb;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
            
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
        /* border-radius: 5px; */
    }
</style>

@endsection




