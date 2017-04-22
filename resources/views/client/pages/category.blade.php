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
                                        <a title="" class="entry-crumb" itemprop="url" href="#">
                                            <span class="title-nav" itemprop="title">
                                                {!! $cate1->Ten !!}
                                            </span>
                                        </a>
                                </span>
                                <i class="fa fa-angle-right"></i>
                                @foreach($posttype1 as $value)
                                    <span>
                                         <a title="" class="entry-crumb" itemprop="url" href="#">
                                            <span class="title-nav" itemprop="title">
                                                {!! $value->Ten !!}
                                            </span>
                                        </a>
                                </span>
                                    <i class="fa fa-angle-right i-category"></i>
                                @endforeach
                                {{--<span>--}}
                                    {{--<a title="" class="entry-crumb" itemprop="url" href="#">--}}
                                        {{--<span class="title-nav" itemprop="title">--}}
                                        {{--The Thao--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</span>--}}
                                        {{--<i class="fa fa-angle-right"></i>--}}
                                {{--<span>--}}
                                        {{--<a title="" class="entry-crumb" itemprop="url" href="#">--}}
                                        {{--<span class="title-nav" itemprop="title">--}}
                                        {{--Gioi Tre--}}
                                        {{--</span>--}}
                                    {{--</a>--}}
                                {{--</span>--}}

                            </div>
                            <h3><a href="#" style="color: #000;">{!! $cate1->Ten !!}</a></h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row col-md-6">
                <div class="col-md-12">
                    {{--@foreach($category1 as $value)--}}
                    <div class="news-block">
                        <div class="news-media"><img class="img-fluid" src="client/img/media-6.jpg" alt="">
                        </div>
                        <div class="news-title">
                            <h2 class=" title-large"><a href="#">Condimentum ultrices mi est a arcu at cum </a></h2>
                        </div>
                        <div class="news-des">Condimentum ultrices mi est a arcu at cum a elementum per cum
                            turpis dui vulputate vestibulum in vehicula montes vel. Mauris nam suspendisse
                            consectetur ...
                        </div>
                        <div class="time-text"><strong>2h ago</strong></div>
                        <div></div>
                    </div>
                    {{--@endforeach--}}
                </div>
            </div>
            <div class="row col-md-6">
                @foreach($article->take(4) as $value)
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
        </div>
    </section>
    <section class="section-01">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <h3 class="heading-large">Xã Hội</h3>
                    <div class="row">
                        @foreach($category as $cate)
                            @if($cate->Ten == "Xã Hội")
                                <?php
                                $data = $cate->tintuc->where('NoiBat', 1)->sortByDesc('created_at');


                                ?>
                                @foreach($data as $value)
                                    <?php
                                    //                                        $tomtat = cutword($value['TomTat'], 100);
                                    //                                    $tomtat = substr($value['TomTat'], 0, 110);
                                    $tomtat = cutword($value['TomTat'], 20);

                                    ?>
                                    <div class="col-md-6">
                                        <div class="card"><img class="img-fluid"
                                                               src="upload/News/{!! $value['Hinh'] !!}" alt="">
                                            <div class="card-block">
                                                <div class="news-title"><a href="#">
                                                        <h2 class=" title-small">{!! $value['TieuDe'] !!}</h2>
                                                    </a></div>
                                                <p class="card-text">{!! $tomtat !!}</p>
                                                <p class="card-text">
                                                    <small class="text-time"><em>3 mins ago</em></small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach

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
                                    <a class="media-left" href="#">
                                        <img class="media-object" src="{!! asset("upload/News/$value->Hinh") !!}"
                                             alt="">
                                    </a>
                                    <div class="media-body">
                                        <div class="news-title">
                                            <h2 class="title-small"><a href="#">{!! $value->TieuDe !!}</a></h2>
                                        </div>
                                        <div class="news-auther"><span class="time">1h ago</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel">
                            @foreach($article1->take(5) as $value)
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img class="media-object" src="{!! asset("upload/News/$value->Hinh") !!}"
                                             alt="">
                                    </a>
                                    <div class="media-body">
                                        <div class="news-title">
                                            <h2 class="title-small"><a href="#">{!! $value->TieuDe !!}</a></h2>
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