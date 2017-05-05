@extends('client.layout.index')
@section('content')
    <section class="banner-sec">
        <div class="container">
            <div class="row col-md-6">
                @foreach($article->take(4) as $value)
                    <div class="col-md-6">
                        <div class="card"><img class="img-fluid"
                                               src="{!! asset("upload/News/$value->Hinh") !!}"
                                               alt="">
                            <div class="card-img-overlay"><span
                                        @if($value->LoaiTin->TheLoai->Ten == 'Xã Hội' || $value->LoaiTin->TheLoai->Ten == "Kinh Doanh")
                                        class="tag tag-pill tag-success"
                                        @elseif($value->LoaiTin->TheLoai->Ten == "Thế Giới" || $value->LoaiTin->TheLoai->Ten == "Văn Hoá")
                                        class="tag tag-pill tag-info"
                                        @elseif($value->LoaiTin->TheLoai->Ten == "Pháp Luật" || $value->LoaiTin->TheLoai->Ten == "Độc Lạ")
                                        class="tag tag-pill tag-primary"
                                        @else
                                        class="tag tag-pill tag-danger"
                                        @endif
                                >{!! $value->LoaiTin->TheLoai->Ten !!}</span>
                            </div>
                            <div class="card-block">
                                <div class="news-title">
                                    <h2 class=" title-small"><a href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">{!! cutword($value->TieuDe,9 )!!}</a>
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
            <div class="row col-md-6">

                <div class="col-md-12 top-slider">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $i = 0; ?>
                            @foreach($slide as $sl)
                                <li data-target="#carousel-example-generic" data-slide-to="{!! $i !!}"
                                    @if($i == 0)
                                    class="active"
                                        @endif
                                ></li>
                                <?php $i++ ?>
                            @endforeach

                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $i = 0;
                            //                            $data = $sl->sortByDesc('created_at')->take(5);
                            ?>
                            @foreach($slide as $sl)
                                <div
                                        @if($i == 0)
                                        class="carousel-item active"
                                        @else
                                        class="carousel-item"
                                        @endif
                                >
                                    <div class="news-block">
                                        <div class="news-media"><img class="img-fluid"
                                                                     src="{!! asset("upload/slide/$sl->Hinh") !!}"
                                                                     alt="">
                                        </div>
                                        <div class="news-title">
                                            <h2 class=" title-large"><a href="#">{!! $sl->Ten !!}</a></h2>
                                        </div>
                                        <div class="news-des"> {!! $sl->NoiDung !!}
                                        </div>
                                        <div class="time-text"><strong>2h ago</strong></div>
                                        <div></div>
                                    </div>
                                </div>
                                <?php $i++ ?>
                            @endforeach
                        </div>
                    </div>
                </div>
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
                                $data = $cate->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(4);
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
                                                <div class="news-title"><a href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">
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
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages"
                                                role="tab">Đặc Sắc</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content sidebar-tabing">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            @foreach($article->take(3) as $value)
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
                            @foreach($article1->take(3) as $value)
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
                        <div class="tab-pane" id="messages" role="tabpanel">
                            @foreach($category as $value)
                                @if($value->Ten == "Độc Lạ")
                                    <?php
                                    $data = $value->tintuc->where('NoiBat', 1)->sortByDesc('SoLuotXem')->take(4);
                                    ?>
                                    @foreach($data as $dt)
                                        <div class="media">
                                            <a class="media-left" href="{!! url("$dt->id/$dt->TieuDeKhongDau.htm") !!}">
                                                <img class="media-object" src="upload/News/{!! $dt->Hinh !!}" alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="news-title">
                                                    <h2 class="title-small"><a href="{!! url("$dt->id/$dt->TieuDeKhongDau.htm") !!}">{!! $dt['TieuDe'] !!}</a></h2>
                                                </div>
                                                <div class="news-auther"><span class="time">1h ago</span></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="video-sec">
                        <h4 class="heading-small">Featured Video</h4>
                        <div class="video-block">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <section class="section-02">
        <div class="container">
            <h3>
                <div class="heading-large">International News Section</div>
            </h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card"><img class="img-fluid" src="client/img/media-1.jpg" alt="">
                        <div class="card-block">
                            <div class="news-title"><a href="#">
                                    <h2 class=" title-small">Delta passengers got pizza delivered to the plane</h2>
                                </a></div>
                            <p class="card-text">
                                <small class="text-time"><em>3 mins ago</em></small>
                            </p>
                        </div>
                    </div>
                    <ul class="news-listing">
                        <li><a href="#">Syria war: Why the battle for Aleppo matters</a></li>
                        <li><a href="#">Key Republicans sign letter warning against candidate</a></li>
                        <li><a href="#">Obamacare Appears to Be Making People Healthier</a></li>
                        <li><a href="#">‘S.N.L.’ to Lose Two Longtime Cast Members</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="card"><img class="img-fluid" src="client/img/media-2.jpg" alt="">
                        <div class="card-block">
                            <div class="news-title"><a href="#">
                                    <h2 class=" title-small">Delta passengers got pizza delivered to the plane</h2>
                                </a></div>
                            <p class="card-text">
                                <small class="text-time"><em>3 mins ago</em></small>
                            </p>
                        </div>
                    </div>
                    <ul class="news-listing">
                        <li><a href="#">Syria war: Why the battle for Aleppo matters</a></li>
                        <li><a href="#">Key Republicans sign letter warning against candidate</a></li>
                        <li><a href="#">Obamacare Appears to Be Making People Healthier</a></li>
                        <li><a href="#">‘S.N.L.’ to Lose Two Longtime Cast Members</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="card"><img class="img-fluid" src="client/img/media-3.jpg" alt="">
                        <div class="card-block">
                            <div class="news-title"><a href="#">
                                    <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                                </a></div>
                            <p class="card-text">
                                <small class="text-time"><em>3 mins ago</em></small>
                            </p>
                        </div>
                    </div>
                    <ul class="news-listing">
                        <li><a href="#">‘S.N.L.’ to Lose Two Longtime Cast Members</a></li>
                        <li><a href="#">Key Republicans sign letter warning against candidate</a></li>
                        <li><a href="#">Obamacare Appears to Be Making People Healthier</a></li>
                        <li><a href="#">Syria war: Why the battle for Aleppo matters</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="video-gallery-sec">
        <div class="container">
            <h3>
                <div class="heading-large">Today's Image Gallery</div>
            </h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-2.jpg"
                                                   data-lightbox="media-2"
                                                   data-title="An Alternative Form of Mental Health Care Gains a Foothold"><img
                                        class="img-fluid example-image" src="client/img/media-2.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>12</span></div>
                        <h2 class=" title-small">An Alternative Form of Mental Health Care Gains a Foothold</h2>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-3.jpg"
                                                   data-lightbox="media-3"
                                                   data-title="Delta passengers got pizza delivered to the plane"><img
                                        class="img-fluid" src="client/img/media-3.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>17</span></div>
                        <h2 class=" title-small">Delta passengers got pizza delivered to the plane</h2>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-4.jpg"
                                                   data-lightbox="media-4" data-title="He took Bolt's record - can he?"><img
                                        class="img-fluid" src="client/img/media-4.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>06</span></div>
                        <h2 class=" title-small">He took Bolt's record - can he?</h2>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-5.jpg"
                                                   data-lightbox="media-5"
                                                   data-title="Minorities Suffer From Unequal Pain Treatment"><img
                                        class="img-fluid" src="client/img/media-5.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>09</span></div>
                        <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-6.jpg"
                                                   data-lightbox="media-6"
                                                   data-title="Minorities Suffer From Unequal Pain Treatment"><img
                                        class="img-fluid" src="client/img/media-6.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>10</span></div>
                        <h2 class=" title-small">Minorities Suffer From Unequal Pain Treatment</h2>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-7.jpg"
                                                   data-lightbox="media-7"
                                                   data-title="Delta passengers got pizza delivered to the plane"><img
                                        class="img-fluid" src="client/img/media-7.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>11</span></div>
                        <h2 class=" title-small">Delta passengers got pizza delivered to the plane</h2>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-8.jpg"
                                                   data-lightbox="media-8" data-title="He took Bolt's record - can he?"><img
                                        class="img-fluid" src="client/img/media-8.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>05</span></div>
                        <h2 class=" title-small">He took Bolt's record - can he?</h2>
                        <div></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="news-block">
                        <div class="news-media"><a class="example-image-link" href="client/img/media-9.jpg"
                                                   data-lightbox="media-9" data-title="Best moments in travel"><img
                                        class="img-fluid" src="client/img/media-9.jpg" alt=""></a><span
                                    class="gallery-counter"><i class="fa fa-image"></i>15</span></div>
                        <h2 class=" title-small">Best moments in travel</h2>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <h3>
                <div class="heading-large">Top Năm Câu Truyện</div>
            </h3>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">


                    @foreach($category as $value)
                        @if($value->Ten == "Văn Hóa")
                            <?php
                                    $i=0;
                            $story = $value->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(5);
                            ?>
                            @foreach($story as $dt)
                                    <div
                                            @if($i == 0)
                                            class="carousel-item active"
                                            @else
                                            class="carousel-item"
                                            @endif
                                    >
                                        <img class="img-fluid" src="upload/News/{!! $dt['Hinh'] !!}">
                                        <div class="carousel-caption">
                                            <div class="news-title">
                                                <h2 class=" title-large"><a href="#">{!! $dt['TieuDe'] !!}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                            @endforeach
                        @endif
                    @endforeach


                </div>
                <!-- End Carousel Inner -->

                <ul class="list-group col-sm-4">
                    @foreach($category as $cate)
                        @if($cate->Ten == "Văn Hóa")
                         <?php $i = 0;
                            $story = $cate->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(5);
                            ?>
                            @foreach($story as $value)
                                <li data-target="#myCarousel" data-slide-to="{!! $i !!}"
                                    @if($i == 0)
                                    class="list-group-item active"
                                    @else
                                    class="list-group-item"
                                        @endif
                                >
                                    <h4>{!! $value['TieuDe'] !!}</h4>
                                </li>
                                <?php $i++; ?>
                            @endforeach
                        @endif
                    @endforeach
                </ul>

                <!-- Controls -->
                <div class="carousel-controls"><a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control"
                                                                                       href="#myCarousel"
                                                                                       data-slide="next"> <span
                                class="glyphicon glyphicon-chevron-right"></span> </a></div>
            </div>
            <!-- End Carousel -->
        </div>
    </div>
@endsection