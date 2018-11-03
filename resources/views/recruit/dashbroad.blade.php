@extends('layouts.app2')
@section('content')

    <div class="page-wrapper">
        <div class="page-container" style="position: absolute; overflow-x: hidden; width: 100%">
            <!-- MAIN CONTENT-->
            <div class="main-content">
            {{--<div class="section__content section__content--p30">--}}
            {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
            {{--<div class="overview-wrap">--}}
            {{--<h2 class="title-1">overview</h2>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-25">--}}
            {{--<div class="col-sm-6 col-lg-3">--}}
            {{--<div class="overview-item overview-item--c1">--}}
            {{--<div class="overview__inner">--}}
            {{--<div class="overview-box clearfix">--}}
            {{--<div class="icon">--}}
            {{--<i class="zmdi zmdi-account-o"></i>--}}
            {{--</div>--}}
            {{--<div class="text">--}}
            {{--<h2>10368</h2>--}}
            {{--<span>Total Posts</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="overview-chart">--}}
            {{--<canvas id="widgetChart1">--}}

            {{--</canvas>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 col-lg-3">--}}
            {{--<div class="overview-item overview-item--c2">--}}
            {{--<div class="overview__inner">--}}
            {{--<div class="overview-box clearfix">--}}
            {{--<div class="icon">--}}
            {{--<i class="zmdi zmdi-shopping-cart"></i>--}}
            {{--</div>--}}
            {{--<div class="text">--}}
            {{--<h2>388,688</h2>--}}
            {{--<span>Post Applied</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="overview-chart">--}}
            {{--<canvas id="widgetChart2"></canvas>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 col-lg-3">--}}
            {{--<div class="overview-item overview-item--c3">--}}
            {{--<div class="overview__inner">--}}
            {{--<div class="overview-box clearfix">--}}
            {{--<div class="icon">--}}
            {{--<i class="zmdi zmdi-calendar-note"></i>--}}
            {{--</div>--}}
            {{--<div class="text">--}}
            {{--<h2>1,086</h2>--}}
            {{--<span>Profile Applied</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="overview-chart">--}}
            {{--<canvas id="widgetChart3"></canvas>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 col-lg-3">--}}
            {{--<div class="overview-item overview-item--c4">--}}
            {{--<div class="overview__inner">--}}
            {{--<div class="overview-box clearfix">--}}
            {{--<div class="icon">--}}
            {{--<i class="zmdi zmdi-money"></i>--}}
            {{--</div>--}}
            {{--<div class="text">--}}
            {{--<h2>1,060</h2>--}}
            {{--<span>Profiles Waiting</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="overview-chart">--}}
            {{--<canvas id="widgetChart4"></canvas>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<!-- <div class="row">--}}
            {{--<div class="col-lg-6">--}}
            {{--<div class="au-card recent-report">--}}
            {{--<div class="au-card-inner">--}}
            {{--<h3 class="title-2">recent reports</h3>--}}
            {{--<div class="chart-info">--}}
            {{--<div class="chart-info__left">--}}
            {{--<div class="chart-note">--}}
            {{--<span class="dot dot--blue"></span>--}}
            {{--<span>products</span>--}}
            {{--</div>--}}
            {{--<div class="chart-note mr-0">--}}
            {{--<span class="dot dot--green"></span>--}}
            {{--<span>services</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="chart-info__right">--}}
            {{--<div class="chart-statis">--}}
            {{--<span class="index incre">--}}
            {{--<i class="zmdi zmdi-long-arrow-up"></i>25%</span>--}}
            {{--<span class="label">products</span>--}}
            {{--</div>--}}
            {{--<div class="chart-statis mr-0">--}}
            {{--<span class="index decre">--}}
            {{--<i class="zmdi zmdi-long-arrow-down"></i>10%</span>--}}
            {{--<span class="label">services</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="recent-report__chart">--}}
            {{--<canvas id="recent-rep-chart"></canvas>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6">--}}
            {{--<div class="au-card chart-percent-card">--}}
            {{--<div class="au-card-inner">--}}
            {{--<h3 class="title-2 tm-b-5">char by %</h3>--}}
            {{--<div class="row no-gutters">--}}
            {{--<div class="col-xl-6">--}}
            {{--<div class="chart-note-wrap">--}}
            {{--<div class="chart-note mr-0 d-block">--}}
            {{--<span class="dot dot--blue"></span>--}}
            {{--<span>products</span>--}}
            {{--</div>--}}
            {{--<div class="chart-note mr-0 d-block">--}}
            {{--<span class="dot dot--red"></span>--}}
            {{--<span>services</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xl-6">--}}
            {{--<div class="percent-chart">--}}
            {{--<canvas id="percent-chart"></canvas>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div> -->--}}
            {{--</div>--}}
            {{--</div>--}}
            <!-- END MAIN CONTENT-->
                <div class="row" style="padding: 0 45px 80px 45px; width: 100%">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">All Posted News</h2>

                        {{--@if(Session::has('recruitID'))--}}
                        {{--{{ Session::get('recruitID') }}--}}
                        {{--@endif--}}

                        <div style="padding: 0 0 10px 0; ">
                            <form class="form-inline">
                                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search"
                                       aria-label="Search" value="">
                                <button class="btn btn-outline-primary" type="button" style="border-color: #007bff;">
                                    Search
                                </button>
                            </form>
                        </div>

                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <div class="row">
                                        <th class="col-md-1" style=" text-align:center;">#</th>
                                        <th class="col-md-3" style=" text-align:center;">Title</th>
                                        <th class="col-md-1" style=" text-align:center;">Applied</th>
                                        <th class="col-md-2" style=" text-align:center;">Post Date</th>
                                        <th class="col-md-2" style=" text-align:center;">Expiration Date</th>
                                        <th class="col-md-3" style=" text-align:center;">Action</th>
                                    </div>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $applied = 1;
                                ?>
                                @if(isset($total_job))
                                    @foreach($total_job as $total)
                                        <tr class="item">
                                            <div class="row">
                                                <td class="col-md-1" style=" text-align:center;">{{$applied}}</td>
                                                <td class="col-md-3" style=" text-align:center;">
                                                    <a data-toggle="modal"
                                                       data-target="#overView{{$total->id_posts}}">{{$total->job_title}}</a>
                                                </td>
                                                <td class="col-md-1"
                                                    style=" text-align:center;">{{$total->applied}}</td>
                                                <td class="col-md-2"
                                                    style=" text-align:center;">{{$total->date_posted}}</td>
                                                <td class="col-md-2" style=" text-align:center;">...</td>
                                                <td class="col-md-3" style=" text-align:center;">
                                                    <div class="row" style="width: 100%; margin:0">
                                                        <a href="/admin/edit_post/{{$total->id_posts}}"
                                                           class="col-md-6 col-sm-6">Edit<a>
                                                                <a href="/admin/delete_post/{{$total->id_posts}}"
                                                                   class="col-md-6 col-sm-6">Delete<a>
                                                    </div>
                                                </td>
                                            </div>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="overView{{$total->id_posts}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title"
                                                            id="exampleModalLabel">{{$total->job_title}}</h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Job level
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->name_level}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Job categories
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->name_job_category}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Job lacation
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->location_work}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Salary
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->name_level_salary}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Description
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->description_work}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Requirement
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->require_work}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Qualification requierment
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->name_qualification}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Type work
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->name_type_work}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Years of Experience
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->year_experience}} year(s)</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Numbers of recruitment
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->number_recruits}} person(s)</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Gender requirement
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->gender}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Skill tags
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->skills}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Preferred language
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>{{$total->name_languages_profile}}</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Contact person
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>XXX</b>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3 text-right">
                                                                Email for application
                                                            </div>
                                                            <div class="col-md-9">
                                                                <b>XXX@gmail.com</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Applied -->
                                                <?php
                                                $is_empty = 0;
                                                ?>

                                                <div class="modal-content" style="padding:15px">
                                                    @foreach($candidates as $aplly)
                                                        @if($aplly->id_post_news == $total->id_posts)
                                                            <div class="modal-body"
                                                                 style="text-align: center; color: gray; padding: 5px">
                                                                <div class="row">
                                                                    <div class="col-md-5">{{$aplly->last_name}} {{$aplly->first_name}}</div>
                                                                    <div class="col-md-5 text-left">{{$aplly->email}}</div>
                                                                    <div class="col-md-2"><a
                                                                                href="/admin/show_profile/{{$aplly->id_status_candidate_profile}}">See
                                                                            Profile</a></div>
                                                                </div>
                                                            </div>

                                                            <?php
                                                            $is_empty = 1;
                                                            ?>

                                                        @endif
                                                    @endforeach

                                                    @if($is_empty == 0)
                                                        <div class="modal-body" style="text-align: center; color: gray">
                                                            <span>There are no applicants for this job :(</span>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $applied++;
                                        ?>

                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- END PAGE CONTAINER-->
            </div>
        </div>

        <script>
            $('input[name=search]').on('keyup', function () {
                var search = $(this).val();

                $.ajax(
                    {
                        url: '/admin/dashbroad/search',
                        type: "POST",
                        data: {search: search},
                        success: function (result) {
                            console.log(result);
                            $('.item').remove();
                            result = $.parseJSON(result);
                            if(result.result == null){
                                alert('No have job, create now :)')
                            } else {
                                $.each(result.result, function (i, e) {


                                    var html = ' <tr class="item">'
                                        + '<div class="row">'
                                        + '<td class="col-md-1" style=" text-align:center;">'+i+'</td>'
                                        + '<td class="col-md-3" style=" text-align:center;">'
                                        + '<a data-toggle="modal" data-target="#overView' + e.id_posts + '">' + e.job_title + '</a>'
                                        + '</td>'
                                        + '<td class="col-md-1" style=" text-align:center;">{{isset($total->applied)?$total->applied:null}}</td>'
                                        + '<td class="col-md-2" style=" text-align:center;">{{isset($total->date_posted)?$total->date_posted:null}}</td>'
                                        + '<td class="col-md-2" style=" text-align:center;">...</td>'
                                        + '<td class="col-md-3" style=" text-align:center;">'
                                        + '<div class="row" style="width: 100%; margin:0">'
                                        + '<a href="/admin/edit_post/{{isset($total->id_posts)?$total->id_posts:null}}" class="col-md-6 col-sm-6">Edit<a>'
                                        + '<a href="/admin/delete_post/{{isset($total->id_posts)?$total->id_posts:null}}" class="col-md-6 col-sm-6">Delete<a>'
                                        + '</div>'
                                        + '</td>'
                                        + '</div>'
                                        + '</tr>';


                                    $('.table tbody').append(html);
                                });
                            }


                        }


                    }
                );
            });
        </script>

@endsection
