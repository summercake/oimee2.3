@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="{{asset('/img/nike1.jpg')}}" class="img-fluid">
            </div>
            <div class="col-4">
                <div class="card p-4" >
                    <div class="card-title p-3 m-0">
                        <h4 class="m-0 pr-2" id="login-title">登陆</h4>
                    </div>
                    <div class="card-body " id="login">
                        <a href="{{route('register')}}" class="btn-register pull-right">还未注册?</a>
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-envelope"></i>&nbsp;邮箱</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="xxx@email.com">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><i class="fas fa-key"></i>&nbsp;密码</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">7日内自动登陆</label>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">忘记密码?</a>
                                </div>
                                <div class="row justify-content-center m-3" >
                                    <button type="submit" class="btn btn-primary" id="login-btn">立即登陆</button>
                                </div>
                            </form>
                            <div class="text-center m-3">
                                <a href="" class="btn btn-outline-success w-100">微信登陆</a>
                            </div>
                            <div class="text-center m-3">
                                <a href="" class="btn btn-outline-danger w-100">QQ登陆</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection