@extends('admin.layout.main')
@section("page-content")
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box purple">
                <div class="portlet-title" style="background-color: #3598dc">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Article Create
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
                    <form  action="{{ route('article.create') }}" method="post" id="form_sample_1" class="form-horizontal"
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
                                <label class="control-label col-md-3">Category
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" name="category" id="category">
                                        <option value="">Nhập Thể Loại</option>
                                        @foreach($category as $value )
                                            <option value="{{$value->id}}">{{$value->Ten}}</option>
                                        @endforeach
                                    </select>
                                    @if(asset($errors->first('category')))
                                        <p  class="help-block">{!! $errors->first('category') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Type
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" name="posttype" id="posttype">
                                        @foreach($posttype as $value )
                                            <option value="{{$value->id}}">{{$value->Ten}}</option>
                                        @endforeach
                                    </select>
                                    @if(asset($errors->first('posttype')))
                                        <p  class="help-block">{!! $errors->first('posttype') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Title<span class="required">
										* </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="title" data-required="1" class="form-control" placeholder="Nhập Tiêu Đề " value="{!! old('title') !!}"/>
                                    @if (asset($errors->first('title')))
                                        <p class="help-block">{!! $errors->first('title') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-5"/>
                                     <textarea class="form-control" rows="6" name="description" value="">{!! old('description') !!}</textarea>
                                    @if (asset($errors->first('description')))
                                        <p class="help-block">{!! $errors->first('description') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-1">Content
                                </label>
                                <div class="col-md-10">
                                    {{--<textarea class="ckeditor form-control" name="content" rows="15"   data-error-container="#editor2_error"></textarea>--}}
                                    <textarea class="form-control" name="content" rows="15" value=""   data-error-container="#editor2_error">{!! old('content') !!}</textarea>
                                    <script type="text/javascript">ckeditor("content")</script>
                                    @if (asset($errors->first('content')))
                                        <p class="help-block ">{!! $errors->first('content') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile" class="col-md-3 control-label">Input Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="exampleInputFile" name="image">
                                    @if (asset($errors->first('image')))
                                        <p class="help-block">{!! $errors->first('image') !!}</p>
                                    @endif
                                    {{--<p class="help-block">--}}
                                        {{--some help text here.--}}
                                    {{--</p>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Important</label>
                                <div class="radio-list col-md-4" >
                                    <label class="radio-inline">
                                        <input type="radio" name="important" id="optionsRadios4" value="0" checked="">
                                            No
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="important" id="optionsRadios5" value="1">
                                            Yes
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Thêm Mơi</button>
                                    <a href="{{ route("article.table") }}" class="btn default">Quay Lại</a>
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

@endsection
@section('script')
    {{--<script>--}}

    {{--</script>--}}
    <script>
        $( document ).ready(function() {
            $("#category").change(function () {
                var idCategory = $(this).val();
//                alert(idCategory);
                $.get("/admin/ajax/posttype/"+idCategory ,function(abc){
//                    alert(abc);
                    $("#posttype").html(abc);
                });



            });
        });
    </script>
    {{--alert("sdsds");--}}
    {{--console.log("ready");--}}
@endsection