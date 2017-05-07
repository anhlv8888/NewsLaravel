@extends('client.layout.index')
@section('content')
    <section class="section-01">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-lg-2 ">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                    <!-- BEGIN FORM-->
                                    <form  action="{{ route('client.user',$user->id) }}" method="post" id="form_sample_1" class="form-horizontal">
                                        {{csrf_field()}}
                                        @if(session('notification'))
                                            <div class="alert alert-success">
                                                <p>{{session('notification')}}</p>
                                            </div>
                                            @endif
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Full Name
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" data-required="1" class="form-control" placeholder="Họ và Tên" value="{!! $user->name !!}"/>
                                                    @if (asset($errors->first('name')))
                                                        <p class="help-block">{!! $errors->first('name') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">UserName
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="username" data-required="1" class="form-control" readonly placeholder="Tên Đăng Nhap" value="{!! $user->username !!}"/>
                                                    @if (asset($errors->first('username')))
                                                        <p class="help-block">{!! $errors->first('username') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-9">
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
                                                <div class="col-md-9">
                                                    <input type="password" name="password" data-required="1" disabled class="form-control password" placeholder="Nhập mật khẩu"  value=""/>
                                                    @if (asset($errors->first('password')))
                                                        <p class="help-block">{!! $errors->first('password') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Confirm Password
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="password" name="passwordAgain" data-required="1" disabled class="form-control password" placeholder="Nhập lại mật khẩu" value=""/>
                                                    @if (asset($errors->first('passwordAgain')))
                                                        <p class="help-block">{!! $errors->first('passwordAgain') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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