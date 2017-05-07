<header>
    <div class="small-top">
        <div class="container">
            <div class="col-lg-4 date-sec hidden-sm-down">
                {{--<div id="Date"></div>--}}
                <?php
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                echo date("l");
                echo date(", d/m/Y") . "<br>";
                ?>
            </div>
            <div class="col-lg-3 offset-lg-5">
                <div class="social-icon"><a target="_blank" href="#" class=" fa fa-facebook"></a> <a target="_blank"
                                                                                                     href="#"
                                                                                                     class=" fa fa-twitter"></a>
                    <a target="_blank" href="#" class=" fa fa-google-plus"></a> <a target="_blank" href="#"
                                                                                   class=" fa fa-linkedin"></a> <a
                            target="_blank" href="#" class=" fa fa-youtube"></a> <a target="_blank" href="#"
                                                                                    class=" fa fa-vimeo-square"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="top-head left">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="{!! url('/') !!}" style="text-decoration: none;">
                        <h1>Logo News
                            <small>Get the latest News</small>
                        </h1>
                    </a>
                </div>
                <div class="col-md-6 col-lg-5 offset-lg-3 admin-bar hidden-sm-down">
                    <nav class="nav nav-inline">
                        @if(Auth::guest())
                        {{--@if(!session('userlogin'))--}}
                            <a href="{{url('loginClient')}}" class="nav-link">
                                Sign-in
                                <i class="fa fa-sign-in"></i>

                            </a>
                        @else
                            <a href="{{url('logoutClient')}}" class="nav-link">
                                Sign-out
                                <i class="fa fa-sign-out"></i>

                            </a>
                            <a href="{{url('userClient',Auth::user()->id)}}" class="nav-link"> {{Auth::user()->name}}
                                <img class="img-fluid img-circle" src="client/img/admin-bg.jpg">
                            </a>


                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar top-nav">
    <div class="container">
        <button class="navbar-toggler hidden-lg-up " type="button" data-toggle="collapse"
                data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false"
                aria-label="Toggle navigation"> &#9776;
        </button>
        <div class="collapse navbar-toggleable-md" id="exCollapsingNavbar2">
            <a class="navbar-brand" href="#">Responsive
                navbar</a>
            <ul class="nav navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link" href="{!! url('/') !!}">
                        <i class="fa fa-2x fa-home " style="margin-top : -5px"></i>
                    </a>
                </li>
                @foreach($category as $value)
                    @if(count($value->loaitin) > 0)
                        <li class="nav-item dropdown">

                            <a href="{!! url("$value->id/$value->TenKhongDau.html") !!}"
                               class="nav-link">{!! $value->Ten !!}<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @foreach($value->loaitin as $lt)
                                    <li>
                                        <a href="{!! url("$value->id/$value->TenKhongDau/$lt->id/$lt->TenKhongDau.html") !!}"
                                           style="text-decoration: none;">{!! $lt->Ten !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="pull-xs-right" action="{{url('search')}}" method="post">
                {{csrf_field()}}
                <div class="search">
                    <input type="text" name="search" class="form-control" maxlength="64" placeholder="Search"/>
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</nav>