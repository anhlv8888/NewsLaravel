@extends('admin.layout.main')
@section("page-content")
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box purple">
                <div class="portlet-title" style="background-color: #3598dc">
                    <div class="caption">
                        <i class="fa fa-gift"></i>PostType Create
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
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form  action="{{ route('posttype.create') }}" method="post" id="form_sample_1" class="form-horizontal">

                        {{csrf_field()}}
                        <div class="form-body">
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    <button class="close" data-close="alert"></button>
                                    {{--Your form validation is successful!--}}
                                    {{session('notification')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="control-label col-md-3">Name <span class="required">
										* </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" placeholder="Nhập Tên Thể Loại"/>
                                    @if (asset($errors->first('name')))
                                        <p class="help-block">{!! $errors->first('name') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Thể Loại
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" name="category">
                                        @foreach($category as $value )
                                            <option value="{{$value->id}}">{{$value->Ten}}</option>
                                        @endforeach
                                    </select>
                                    @if(asset($errors->first('category')))
                                        <p  class="help-block">{!! $errors->first('category') !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Thêm Mơi</button>
                                    <a href="{{ route("posttype.table") }}" class="btn default">Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

@stop