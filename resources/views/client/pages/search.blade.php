@extends('client.layout.index')
@section('content')

    <section class="section-01">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @if(isset($result))
                            <h2>Từ Khoá : {{$keyword}}</h2>
                            @foreach($result as $value)
                                <div class="col-md-12">
                                    <div class="card">
                                        <img class="img-fluid col-md-6" src="upload/News/{!! $value->Hinh !!}" alt="">
                                        <div class="card-block col-md-6">
                                            <div class="news-title"><a
                                                        href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">
                                                    <h2 class=" title-small">{!! changeColor($value->TieuDe,$keyword) !!}</h2>
                                                </a></div>
                                            <p class="card-text">{!! changeColor($value->TomTat,$keyword)!!}</p>
                                            <p class="card-text">
                                                <small class="text-time"><em>3 mins ago</em></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="col-md-4 offset--9">
                            {!! $result->render() !!}
                        </div>


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
                                            <h2 class="title-small"><a
                                                        href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">{!! $value->TieuDe !!}</a>
                                            </h2>
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
                                            <h2 class="title-small"><a
                                                        href="{!! url("$value->id/$value->TieuDeKhongDau.htm") !!}">{!! $value->TieuDe !!}</a>
                                            </h2>
                                        </div>
                                        <div class="news-auther"><span class="time">1h ago</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="video-sec">
                        <h4 class="heading-small">Quảng Cáo</h4>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection