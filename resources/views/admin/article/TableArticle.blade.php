@extends("admin.layout.main")
@section("page-content")

    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    Widget settings form goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue">Save changes</button>
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Article</h1>
        </div>
        <!-- END PAGE TITLE -->

    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    {{--<ul class="page-breadcrumb breadcrumb">--}}
        {{--<li>--}}
            {{--<a href="index.html">Home</a>--}}
            {{--<i class="fa fa-circle"></i>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">Data Tables</a>--}}
            {{--<i class="fa fa-circle"></i>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="#">Editable Datatables</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
    <!-- END PAGE BREADCRUMB -->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Article Table
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>
                        <a href="javascript:;" class="remove">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    {{--{{ route("category.create") }}--}}
                                    <a href="{!! url('/admin/article/create') !!}"  class="btn green">
                                        Add New <i class="fa fa-plus"></i></a>

                                </div>
                            </div>

                        </div>
                    </div>
                    @if(session('notification'))
                        <div class="alert alert-success">
                            <button class="close" data-close="alert"></button>
                            {{session('notification')}}
                        </div>
                    @endif
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                View
                            </th>
                            <th>
                                Important
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($article as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>
                                    <p>{{$value->TieuDe}}</p>
                                    <img width="100px" src="{{asset("upload/News/$value->Hinh")}}" alt="">
                                </td>
                                <td>{!! $value->TomTat !!}</td>
                                <td>{{$value->LoaiTin->Ten}}</td>
                                <td>{{$value->LoaiTin->TheLoai->Ten}}</td>
                                <td>{{$value->SoLuotXem}}</td>
                                <td>
                                    @if($value->NoiBat == 0){{'Không'}}
                                    @else{{'Có'}}
                                    @endif
                                </td>
                                <td><a href="{!! url("/admin/article/update") !!}/{{$value->id}}" class="">  Edit </a></td>
                                <td><a href="{!! url("/admin/article/delete") !!}/{{$value->id}}" class="">  Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-9">
                            {!! $article->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop