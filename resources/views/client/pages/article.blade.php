@extends('client.layout.index')
@section('content')
    <section class="section-01">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="home-by clearfix">
                        @foreach($tintuc1 as $value)
                        <h2>{!! $value->TieuDe !!}</h2>
                        <div class="news-publicinfo clearfix">
                            <p class="col-md-2">{!! $value->created_at !!}</p>
                        </div>
                        <div class="showmedia clearfix">
                            <h4>{!! $value->TomTat !!}
                            </h4>
                            <div class="news-content2 clearfix">
                                {!! $value->NoiDung !!}
                                <p class="text-right"><strong>Lê Anh</strong></p>
                            </div>
                        </div>
                        @endforeach
                            <div class="bglinedetailshow">
                            </div>
                        <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="widget-area no-padding blank">
                                        <div class="status-upload">
                                            <form action="{{ route('comment',$tintuc2->id) }}" method="post">
                                                {{csrf_field()}}
                                                <textarea name="content" placeholder="What do you think this article?"></textarea>
                                                <a href="{!! url("loginClient") !!}" class="btn btn-info green">Login</a>
                                                <button type="submit" class="btn btn-success green"><i
                                                            class="fa fa-comments"></i> Comment
                                                </button>

                                            </form>
                                        </div><!-- Status Upload  -->
                                    </div><!-- Widget Area -->
                                </div>
                        </div>
                        <div class="row">
                            @foreach($tintuc2->comment as $value)
                                <div class="col-lg-8 col-md-12 comment" style="margin-top: 5px;">
                                    <div class="col-sm-2">
                                        <div class="thumbnail">
                                            <img class="img-responsive user-photo" width="50px"
                                                 src="https://ssl.gstatic.com/accounts/ui/avatar_1x.png">
                                        </div><!-- /thumbnail -->
                                    </div><!-- /col-sm-1 -->
                                    <div class="col-sm-7">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong>{!! $value->user->name !!}</strong>
                                                <span class="text-muted">{!! $value->created_at !!}</span></div>
                                            <div class="panel-body">
                                                {{ $value->NoiDung }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach

                        </div><!-- /row -->

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