<div class="col-lg-4 sidebar">
    {{--<div class="single-slidebar">--}}
        {{--<h4>Jobs by Location</h4>--}}
        {{--<ul class="cat-list">--}}
            {{--@foreach($location_job as $location)--}}
                {{--<li><a class="justify-content-between d-flex"><p>{{$location->location_work}}</p><span>{{$location->count}}</span></a></li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}

    <div class="single-slidebar">
        <h4>Top Rated Job Posts</h4>
        <div class="active-relatedjob-carusel">
            @foreach($top_rate as $top)
                <div class="single-rated">
                    <img class="img-fluid" src="{{ asset('img/r1.jpg') }}" alt="">
                    <a href="/details/{{$top->id_posts}}"><h4> {{$top->job_title}} </h4></a>
                    <h6>{{$top->company_name}}</h6>
                    <p>{{$top->description_work}}</p>
                    <h5>Job Nature: {{$top->name_type_work}}</h5>
                    <p class="address"><span class="lnr lnr-map"></span> {{$top->location_work}}</p>
                    <p class="address"><span class="lnr lnr-database"></span> {{$top->name_level_salary}}</p>
                    <a href="/details/{{$top->id_posts}}" class="btns text-uppercase">Detail job</a>
                </div>
                <br>
            @endforeach
        </div>
    </div>

    <div class="single-slidebar">
        <h4>Jobs by Category</h4>
        <ul class="cat-list">
            @foreach($category_job as $category)
                <li><a class="justify-content-between d-flex"><p>{{$category->name_group_category}}</p><span>{{$category->count}}</span></a></li>
            @endforeach
        </ul>
    </div>

    {{--<div class="single-slidebar">--}}
        {{--<h4>Carrer Advice Blog</h4>--}}
        {{--<div class="blog-list">--}}
            {{--<div class="single-blog " style="background:#000 url({{ asset('img/blog1.jpg') }}">--}}
                {{--<a href="single.html"><h4>Home Audio Recording <br>--}}
                        {{--For Everyone</h4></a>--}}
                {{--<div class="meta justify-content-between d-flex">--}}
                    {{--<p>--}}
                        {{--02 Hours ago--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--<span class="lnr lnr-heart"></span>--}}
                        {{--06--}}
                        {{--<span class="lnr lnr-bubble"></span>--}}
                        {{--02--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-blog " style="background:#000 url({{ asset('img/blog2.jpg') }}">--}}
                {{--<a href="single.html"><h4>Home Audio Recording <br>--}}
                        {{--For Everyone</h4></a>--}}
                {{--<div class="meta justify-content-between d-flex">--}}
                    {{--<p>--}}
                        {{--02 Hours ago--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--<span class="lnr lnr-heart"></span>--}}
                        {{--06--}}
                        {{--<span class="lnr lnr-bubble"></span>--}}
                        {{--02--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-blog " style="background:#000 url({{ asset('img/blog1.jpg') }}">--}}
                {{--<a href="single.html"><h4>Home Audio Recording <br>--}}
                        {{--For Everyone</h4></a>--}}
                {{--<div class="meta justify-content-between d-flex">--}}
                    {{--<p>--}}
                        {{--02 Hours ago--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--<span class="lnr lnr-heart"></span>--}}
                        {{--06--}}
                        {{--<span class="lnr lnr-bubble"></span>--}}
                        {{--02--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

</div>

