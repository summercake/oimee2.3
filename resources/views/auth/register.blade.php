@extends('frontend.layouts.app')
@section('content')
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <img src="{{asset('/img/nike1.jpg')}}" class="img-fluid">
                </div>
                <div class="col-4">
                    <div class="card p-4">
                        <div class="card-title p-3 m-0">
                            <h4 class="m-0 pr-2" id="login-title">注册</h4>
                        </div>
                        <div class="card-body" id="login">
                            <a href="{{route('login')}}" class="btn-register pull-right">返回登陆?</a>
                            <div class="login-form">
                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name"><i class="fas fa-user"></i>&nbsp;用户名</label>
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-envelope"></i>&nbsp;邮箱</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="xxx@email.com">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><i class="fas fa-key"></i>&nbsp;密码</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm"><i class="fas fa-key"></i>&nbsp;确认密码</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <div class="form-group {{ $errors->has('captcha') ? ' has-error' : '' }}">
                                        <label for="captcha"><i class="fas fa-user-secret"></i>&nbsp;验证码</label>
                                        <div class="row">
                                            <div class="col-8">
                                                <input id="captcha" class="form-control" name="captcha">
                                            </div>
                                            <div class="col-4 px-0">
                                                <img class="img-thumbnail captcha "  src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                                            </div>
                                        </div>
                                        @if ($errors->has('captcha'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="row justify-content-center mt-4">
                                        <button type="submit" class="btn btn-primary">立即注册</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection