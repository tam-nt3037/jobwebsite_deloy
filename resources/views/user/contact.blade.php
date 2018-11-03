@extends('layouts.app')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Contact Us				
                    </h1>	
                    <p class="text-white"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
                </div>											
            </div>
        </div>
    </section>
<!-- End banner Area -->
<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
        <div class="container">
            {{--<div class="row">--}}
                {{--<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>--}}
                {{--<div class="col-lg-4 d-flex flex-column">--}}
                    {{--<a class="contact-btns" href="#">Submit Your CV</a>--}}
                    {{--<a class="contact-btns" href="#">Post New Job</a>--}}
                    {{--<a class="contact-btns" href="#">Create New Account</a>--}}
                {{--</div>--}}
                {{--<div class="col-lg-8">--}}
                    {{--<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">--}}
                        {{--<div class="row">	--}}
                            {{--<div class="col-lg-12 form-group">--}}
                                {{--<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">--}}
                            {{----}}
                                {{--<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">--}}

                                {{--<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">--}}
                                {{--<textarea class="common-textarea mt-10 form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>--}}
                                {{--<button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>--}}
                                {{--<div class="mt-20 alert-msg" style="text-align: left;"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>	--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="box box-lg">
                    <h1 class="page-title">Contact us</h1>
                    Thank you for visiting JobWebsite, the largest job search web site in Vietnam. Please choose any of the
                    following options to contact us.

                    <h2>Contact JobWebsite Consultants</h2>

                    <p>If you are experiencing difficulties using our website, chances are your questions are answered in our list
                        of <a title="Frequently Asked Question"><b>Frequently
                                Asked Questions</b></a>.</p>

                    <p>For other questions, requests or feedbacks, please <b>fill in this form</b> to contact our
                        consultants.</p>

                    <div itemscope="">

                        <h2 itemprop="name">JobWebsite Offices</h2>

                        <h3>Ho Chi Minh City</h3>

                        <p itemprop="address" itemscope="" >
                            <span itemprop="streetAddress"> 130 Suong Nguyet Anh, </span>
                            <span itemprop="addressLocality">Ben Thanh Ward<br>
                            District 1, HCM City</span><br>
                            Tel: <span itemprop="telephone">(84 28) 3925 8456</span> <br>

                        </p>

                        <h3>Hanoi</h3>

                        <p itemprop="address" itemscope="">
                            <span itemprop="streetAddress">7th floor, V-building<br> 125-127 Ba Trieu street,</span>
                            <span itemprop="addressLocality">Nguyen Du Ward, Hai Ba Trung district<br> Hanoi</span><br>
                            Tel: <span itemprop="telephone">(84 24) 3944 0568</span>/ Fax: <span itemprop="faxNumber">(84 24) 3974 3036</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>	
    </section>
    <!-- End contact-page Area -->
    
@endsection