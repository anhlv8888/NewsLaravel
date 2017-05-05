@extends('client.layout.index')
@section('content')
    <section class="section-01">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-lg-2 ">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="javascript:;" class="active" id="login-form-link">Login</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="javascript:;" id="register-form-link">Register</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="{{ route("client.login") }}" method="post" role="form" style="display: block;">
                                        {{csrf_field()}}
                                        @if(session('notification'))
                                                <div class="alert alert-danger" >
                                                    <button class="close" data-close="alert"></button>
                                                    {{session('notification')}}
                                                </div>
                                            @endif
                                        @if(session('errorlogin'))
                                            <div class="alert alert-danger" >
                                                <button class="close" data-close="alert"></button>
                                                {{session('errorlogin')}}
                                            </div>
                                            @endif
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="{{old('username')}}">
                                            @if(asset($errors->first('username')))
                                                <p class="help-block">{!! $errors->first('username') !!}</p>
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                            @if(asset($errors->first('password')))
                                                <p class="help-block">{{ $errors->first('password') }}</p>
                                                @endif
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 offset-sm-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="register-form" action="{{route("client.register")}}" method="post" role="form" style="display: none;">
                                        {{csrf_field()}}
                                        @if(session('notification1'))
                                            <div class="alert alert-success" >
                                                <button class="close" data-close="alert"></button>
                                                {{session('notification1')}}
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                            @if(asset($errors->first('name')))
                                                <p class="help-block">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                            @if(asset($errors->first('email')))
                                                <p class="help-block">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                            @if(asset($errors->first('password')))
                                                <p class="help-block">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="passwordAgain" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                            @if(asset($errors->first('passwordAgain')))
                                                <p class="help-block">{{ $errors->first('passwordAgain') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 offset-sm-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
        $(function() {

            $('#login-form-link').click(function(e) {

                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });
    </script>

@endsection