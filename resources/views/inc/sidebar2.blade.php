<aside class="menu-sidebar2">
    <div class="logo" style="background-color: #343a40">
        <a href="../admin/dashbroad"><img src="{{ asset('img/logo.png') }}" alt="" title=""></a>
    </div>
    @if(isset($data_recruit_info))
        @foreach($data_recruit_info as $recruit_info)
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-100">
                        @if($recruit_info->company_avatar != '')
                            <img src="{{ asset('storage/logo_company/'.$recruit_info->company_avatar) }}" alt="Not found image"
                                 width="125px" height="125px"/>
                        @else
                            <img src="{{ asset('img/logoCompany/avatar-01.jpg') }}" alt="No Image"
                                 width="125px" height="125px"/>
                        @endif
                    </div>
                    <h4 class="name">{{$recruit_info->contact_name}}</h4>
                    <a class="nav-link" href="/admin/account-info">Account Information</a>
                    <a href="/admin/sign_out">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="/admin/dashbroad" style="text-decoration: none;">
                                <i class="fas fa-tachometer-alt"></i>All Posted News
                            </a>
                        </li>
                        <li>
                            <a href="/admin/post_news" style="text-decoration: none;">
                                <i class="fas fa-chart-bar"></i>Post News</a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="#" style="text-decoration: none;">--}}
                        {{--<i class="fas fa-shopping-basket"></i>eCommerce</a>--}}
                        {{--</li>--}}
                        {{--<li class="has-sub">--}}
                        {{--<a class="js-arrow" href="#" style="text-decoration: none;">--}}
                        {{--<i class="fas fa-trophy"></i>Features--}}
                        {{--<span class="arrow">--}}
                        {{--<i class="fas fa-angle-down"></i>--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--<ul class="list-unstyled navbar__sub-list js-sub-list">--}}
                        {{--<li>--}}
                        {{--<a href="table.html">--}}
                        {{--<i class="fas fa-table"></i>Tables</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="form.html">--}}
                        {{--<i class="far fa-check-square"></i>Forms</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#">--}}
                        {{--<i class="fas fa-calendar-alt"></i>Calendar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="map.html">--}}
                        {{--<i class="fas fa-map-marker-alt"></i>Maps</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="has-sub">--}}
                        {{--<a class="js-arrow" href="#" style="text-decoration: none;">--}}
                        {{--<i class="fas fa-copy"></i>Pages--}}
                        {{--<span class="arrow">--}}
                        {{--<i class="fas fa-angle-down"></i>--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--<ul class="list-unstyled navbar__sub-list js-sub-list">--}}
                        {{--<li>--}}
                        {{--<a href="login.html">--}}
                        {{--<i class="fas fa-sign-in-alt"></i>Login</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="register.html">--}}
                        {{--<i class="fas fa-user"></i>Register</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="forget-pass.html">--}}
                        {{--<i class="fas fa-unlock-alt"></i>Forget Password</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="has-sub">--}}
                        {{--<a class="js-arrow" href="#" style="text-decoration: none;">--}}
                        {{--<i class="fas fa-desktop"></i>UI Elements--}}
                        {{--<span class="arrow">--}}
                        {{--<i class="fas fa-angle-down"></i>--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--<ul class="list-unstyled navbar__sub-list js-sub-list">--}}
                        {{--<li>--}}
                        {{--<a href="button.html">--}}
                        {{--<i class="fab fa-flickr"></i>Button</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="badge.html">--}}
                        {{--<i class="fas fa-comment-alt"></i>Badges</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="tab.html">--}}
                        {{--<i class="far fa-window-maximize"></i>Tabs</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="card.html">--}}
                        {{--<i class="far fa-id-card"></i>Cards</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="alert.html">--}}
                        {{--<i class="far fa-bell"></i>Alerts</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="progress-bar.html">--}}
                        {{--<i class="fas fa-tasks"></i>Progress Bars</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="modal.html">--}}
                        {{--<i class="far fa-window-restore"></i>Modals</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="switch.html">--}}
                        {{--<i class="fas fa-toggle-on"></i>Switchs</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="grid.html">--}}
                        {{--<i class="fas fa-th-large"></i>Grids</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="fontawesome.html">--}}
                        {{--<i class="fab fa-font-awesome"></i>FontAwesome</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="typo.html">--}}
                        {{--<i class="fas fa-font"></i>Typography</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                    </ul>
                </nav>
            </div>
        @endforeach
    @endif
</aside>