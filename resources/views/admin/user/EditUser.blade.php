@extends("admin.layout.main")
@section("page-content")
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box purple">
                <div class="portlet-title" style="background-color: #3598dc">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Slide Update
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
                    <form  action="{{ route('user.update',$user->id) }}" method="post" id="form_sample_1" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Full Name
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="name" data-required="1" class="form-control" placeholder="Họ và Tên" value="{!! $user->name !!}"/>
                                    @if (asset($errors->first('name')))
                                        <p class="help-block">{!! $errors->first('name') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">UserName<span class="required">
										* </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="username" data-required="1" class="form-control" readonly placeholder="Tên Đăng Nhap" value="{!! $user->username !!}"/>
                                    @if (asset($errors->first('username')))
                                        <p class="help-block">{!! $errors->first('username') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email
                                </label>
                                <div class="col-md-4">
                                    <input type="email" name="email" data-required="1" class="form-control"  placeholder="Email" value="{!! $user->email !!}"/>
                                    @if (asset($errors->first('email')))
                                        <p class="help-block">{!! $errors->first('email') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="control-label col-md-3">
                                    Change PassWord
                                    <input type="checkbox" id="ChangePassword" name="changePassword">
                                </label>
                                <div class="col-md-4">
                                    <input type="password" name="password" data-required="1" disabled class="form-control password" placeholder="Nhập mật khẩu"  value=""/>
                                    @if (asset($errors->first('password')))
                                        <p class="help-block">{!! $errors->first('password') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Confirm Password
                                </label>
                                <div class="col-md-4">
                                    <input type="password" name="passwordAgain" data-required="1" disabled class="form-control password" placeholder="Nhập lại mật khẩu" value=""/>
                                    @if (asset($errors->first('passwordAgain')))
                                        <p class="help-block">{!! $errors->first('passwordAgain') !!}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Level
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" name="level">
                                        <option
                                                @if($user->level == 0)
                                                {{"selected"}}
                                                @endif
                                                value="0">Member
                                        </option>
                                        <option
                                                @if($user->level == 1)
                                                {{"selected"}}
                                                @endif
                                                value="1">Admin
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Sửa Đổi</button>
                                    <a href="{{ route("user.table") }}" class="btn default">Quay Lại</a>
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
    <script>
        $(document).ready(function () {
           $("#ChangePassword").change(function () {
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }else {
                    $(".password").attr('disabled',"");
                }
           });
        });
    </script>
    @endsection