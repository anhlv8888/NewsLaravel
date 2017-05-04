@extends('client.layout.index')
@section('content')

    <section class="banner-sec">

        <div class="container">
            <div class="row col-md-12">
                <div class="col-md-12">
                    <div class="news-block">
                        <div class="news-title">
                            <div class="category-nav">
                                <span>
                                        <a title="" class="entry-crumb" itemprop="url" href="{!! url("$cate1->id/$cate1->TenKhongDau.html") !!}">
                                            <span class="title-nav title-first" itemprop="title">
                                                {!! $cate1->Ten !!}
                                            </span>
                                        </a>
                                </span>
                                <i class="fa fa-angle-right"></i>
                                @foreach($posttype2 as $value)
                                    <span>
                                         <a title="" class="entry-crumb" itemprop="url" href="{!! url("$cate1->id/$cate1->TenKhongDau/$value->id/$value->TenKhongDau.html") !!}">
                                            <span class="title-nav" itemprop="title">
                                                {!! $value->Ten !!}
                                            </span>
                                        </a>
                                </span>
                                    <i class="fa fa-angle-right i-category"></i>
                                @endforeach
                            </div>
                            @if(isset($postype1))

                                <h3 style="color: #000;">
                                        {!! $postype1->Ten !!}
                                     </h3>
                            @else
                                <h3 style="color: #000;">
                                        {!! $cate1->Ten !!}
                                   </h3>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            @if(isset($ptarticle))
                <?php

                $tin1 = $ptarticle->shift();
                ?>
                <div class="row col-md-6">
                    <div class="col-md-12">
                        {{--@foreach($category1 as $value)--}}
                        <div class="news-block">
                            <div class="news-media"><img class="img-fluid" src="upload/News/{!! $tin1['Hinh'] !!}"
                                                         alt="">
                            </div>
                            <div class="news-title">
                                <h2 class=" title-large"><a href="{!! url("$tin1->id/$tin1->TieuDeKhongDau.htm") !!}">{!! $tin1['TieuDe'] !!}</a></h2>
                            </div>
                            <div class="news-des">{!! $tin1['TomTat'] !!}
                            </div>
                            <div class="time-text"><strong>2h ago</strong></div>
                            <div></div>
                        </div>
                        {{--@endforeach--}}
                    </div>
                </div>
                <div class="row col-md-6">
                    @foreach($ptarticle as $value)
                        <div class="col-md-6">
                            <div class="card"><img class="img-fluid"
                                                   src="{!! asset("upload/News/$value->Hinh") !!}"
                                                   alt="">
                                <div class="card-block">
                                    <div class="news-title">
                                        <h2 class=" title-small"><a href="#">{!! $value->TieuDe !!}</a>
                                        </h2>
                                    </div>
                                    <p class="card-text">
                                        <small class="text-time"><em>3 mins ago</em></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <?php

                $tin2 = $ctarticle->shift();
                ?>
                <div class="row col-md-6">
                    <div class="col-md-12">
                        {{--@foreach($category1 as $value)--}}
                        <div class="news-block">
                            <div class="news-media"><img class="img-fluid" src="upload/News/{!! $tin2['Hinh'] !!}"
                                                         alt="">
                            </div>
                            <div class="news-title">
                                <h2 class=" title-large"><a href="{!! url("$tin2->id/$tin2->TieuDeKhongDau.htm") !!}">{!! $tin2['TieuDe'] !!}</a></h2>
                            </div>
                            <div class="news-des">{!! $tin2['TomTat'] !!}
                            </div>
                            <div class="time-text"><strong>2h ago</strong></div>
                            <div></div>
                        </div>
                        {{--@endforeach--}}
                    </div>
                </div>
                <div class="row col-md-6">
                    @foreach($ctarticle->take(4) as $value)
                        <?php
                            $cutTitle = cutword($value->TieuDe ,10);
                        ?>
                        <div class="col-md-6">
                            <div class="card"><img class="img-fluid"
                                                   src="{!! asset("upload/News/$value->Hinh") !!}"
                                                   alt="">
                                <div class="card-block">
                                    <div class="news-title">
                                        <h2 class=" title-small"><a href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">{!! $cutTitle !!}</a>
                                        </h2>
                                    </div>
                                    <p class="card-text">
                                        <small class="text-time"><em>3 mins ago</em></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
    <section class="section-01">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <h3 class="heading-large">{!! $cate1->Ten !!}</h3>
                    <div class="row">
                        @foreach($ctarticle as $value)
                            <?php
                            $tomtat = cutword($value->TomTat, 20);

                            ?>
                            <div class="col-md-6">
                                <div class="card"><img class="img-fluid"
                                                       src="upload/News/{!! $value->Hinh !!}" alt="">
                                    <div class="card-block">
                                        <div class="news-title"><a href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">
                                                <h2 class=" title-small">{!! $value->TieuDe !!}</h2>
                                            </a></div>
                                        <p class="card-text">{!! $tomtat!!}</p>
                                        <p class="card-text">
                                            <small class="text-time"><em>3 mins ago</em></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{--{!! $ctarticle->link() !!}--}}

                    </div>

                </div>
                <aside class="col-lg-4 side-bar col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"
                                                role="tab">Mới Nhất</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">Hot</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content sidebar-tabing">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            @foreach($article->take(5) as $value)
                                <div class="media">
                                    <a class="media-left" href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">
                                        <img class="media-object" src="{!! asset("upload/News/$value->Hinh") !!}"
                                             alt="">
                                    </a>
                                    <div class="media-body">
                                        <div class="news-title">
                                            <h2 class="title-small"><a href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">{!! $value->TieuDe !!}</a></h2>
                                        </div>
                                        <div class="news-auther"><span class="time">1h ago</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel">
                            @foreach($article1->take(5) as $value)
                                <div class="media">
                                    <a class="media-left" href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">
                                        <img class="media-object" src="{!! asset("upload/News/$value->Hinh") !!}"
                                             alt="">
                                    </a>
                                    <div class="media-body">
                                        <div class="news-title">
                                            <h2 class="title-small"><a href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">{!! $value->TieuDe !!}</a></h2>
                                        </div>
                                        <div class="news-auther"><span class="time">1h ago</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="video-sec">
                        <h4 class="heading-small">Quảng Cáo</h4>
                        {{--<div class="video-block">--}}
                        {{--<div class="embed-responsive embed-responsive-4by3">--}}
                        {{--<iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0"--}}
                        {{--allowfullscreen></iframe>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection