@extends('layouts.app')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Register Employee Account
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span
                                class="lnr lnr-arrow-right"></span> <a href="#"> Register</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- Start service Area -->
    <section class="service-area section-gap" id="service" style="background-image:url('../img/bg.jpg');
    background-attachment:fixed;
    background-repeat: no-repeat;
    background-size: cover; ">
        @include('inc.messages')
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Login Employee') }}</div>

                        <div class="card-body">
                            <form method="POST">
                                @csrf()
                                <div class="form-group">
                                    <label for="register_email">Email address</label>
                                    <input type="email" class="form-control" id="register_email"
                                           placeholder="email@example.com" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="register_password">Password</label>
                                    <input type="password" class="form-control" id="register_password"
                                           placeholder="Password">
                                </div>
                                <div style="padding: 0 0 10px 0">
                                    <div class="form-check" style="padding-bottom: 10px">
                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                        <label class="form-check-label" for="dropdownCheck"> <span
                                                    style="padding-left: 20px">Remember me</span> </label>
                                    </div>
                                    <div class="text-center">
                                        <button style="padding-right: 50px; padding-left: 50px" type="button" id="btnSignIn"
                                                class="btn btn-primary">Sign in
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <div class="dropdown-divider"></div>
                            <div class="text-right">
                                {{--<a style="text-decoration: none;" href="">Forgot password?</a>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register Employee Account') }}</div>

                        <div class="card-body">

                            <form action="/admin/register" method="post">
                                {{ csrf_field() }}

                                <fieldset class="scheduler-border">

                                    <legend class="scheduler-border">Account</legend>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right" for="emailReg">Email:</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" id="emailReg" name="emailReg" value="{{old('emailReg')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"
                                               for="passwordReg">Password:</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="passwordReg" name="passwordReg" value="{{old('passwordReg')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right"
                                               for="password_confirmation">Password Confirmation:</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="password_confirmation"
                                                   name="password_confirmation" value="{{old('password_confirmation')}}">
                                        </div>
                                    </div>

                                </fieldset>

                                <fieldset class="scheduler-border">

                                    <legend class="scheduler-border">Company Information</legend>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right" for="company_name">Company
                                            name:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="company_name"
                                                   name="company_name" value="{{old('company_name')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right" for="contact_person_name">Contact
                                            name:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="contact_person_name"
                                                   name="contact_person_name" value="{{old('contact_person_name')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right" for="contact_phone_number">Phone
                                            number:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="contact_phone_number"
                                                   name="contact_phone_number" value="{{old('contact_phone_number')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right" for="company_address">Company
                                            address:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="company_address"
                                                   name="company_address" value="{{old('company_address')}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-md-right" for="company_city">City/Province:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="company_city"
                                                   name="company_city" value="{{old('company_city')}}">
                                        </div>
                                    </div>

                                </fieldset>

                                <div class="form-check text-center" style="padding-bottom: 10px; font-size: 16px">
                                    <input type="checkbox" class="form-check-input" id="agree" name="agree">
                                    <label class="form-check-label" for="agree"> <span style="padding-left: 20px">Agree with <a
                                                    href="" style="text-decoration: none;">Privacy policy</a> & <a
                                                    href="" style="text-decoration: none;">Terms of use</a> of Job Listing</span>
                                    </label>
                                </div>

                                <div class="form-group text-center">
                                    <button style="cursor:pointer; width: 50%" type="submit" class="btn btn-info"><span
                                                style="font-size: 20px">Register now</span></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============ form register =============== -->
            <style>
                fieldset.scheduler-border {
                    border: 1px groove #eee !important;
                    padding: 0 1.4em 1.4em 1.4em !important;
                    margin: 10px 20px 1.5em 20px !important;
                    -webkit-box-shadow: 0px 0px 0px 0px #000;
                    box-shadow: 0px 0px 0px 0px #000;
                    background-color: #fbfbfb;
                }

                legend.scheduler-border {
                    font-size: 1.2em !important;

                    text-align: left !important;
                    width: auto;
                    padding: 0 10px;
                    border-bottom: none;
                    /* border-radius: 5px; */
                }
            </style>

    </section>
@endsection

@section('scripts-end')
    <script src="{{ asset('js/register_recruit.js') }}"></script>
@endsection