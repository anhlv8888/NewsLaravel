@extends('admin.layout.main')
@section("page-content")
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box purple">
                <div class="portlet-title" style="background-color: #3598dc">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Slide Create
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
                    <form  action="{{ route('slide.create') }}" method="post" id="form_sample_1" class="form-horizontal"
                           enctype="multipart/form-data"   >

                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            @if(session('notification'))
                                <div class="alert alert-success">
                                    <button class="close" data-close="alert"></button>
                                    {{--Your form validation is successful!--}}
                                    {{session('notification')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="control-label col-md-3">Name<span class="required">
										* </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" placeholder="Nhập Tiêu Đề " value="{!! old('name') !!}"/>
                                    @if (asset($errors->first('name')))
                                        <p class="help-block">{!! $errors->first('name') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Content
                                </label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="content" rows="15" value=""   data-error-container="#editor2_error">{!! old('content') !!}</textarea>
                                    <script type="text/javascript">ckeditor("content")</script>
                                    @if (asset($errors->first('content')))
                                        <p class="help-block ">{!! $errors->first('content') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Link
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="link" data-required="1" class="form-control" placeholder="Nhập link " value="{!! old('link') !!}"/>
                                    @if (asset($errors->first('name')))
                                        <p class="help-block">{!! $errors->first('name') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile" class="col-md-3 control-label">Input Image</label>
                                <div class="col-md-7">
                                    <input type="file" id="exampleInputFile" name="image">
                                    @if (asset($errors->first('image')))
                                        <p class="help-block">{!! $errors->first('image') !!}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Thêm Mơi</button>
                                    <a href="{{ route("slide.table") }}" class="btn default">Quay Lại</a>
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