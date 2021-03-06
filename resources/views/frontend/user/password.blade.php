@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('frontend.user.components._sidebar')
            </div>
            <div class="col-6">
                <div class="userinfo">
                    <form action="{{route('user.pwd.update')}}" method="POST" accept-charset="UTF-8">
                        @csrf
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb bg-light">
                                <li class="breadcrumb-item"><a href="#">我的欧米</a></li>
                                <li class="breadcrumb-item"><a href="#">账户管理</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">修改个人密码</li>
                                <button type="submit" class="btn btn-sm btn-outline-primary ml-auto"><b>保存</b></button>
                            </ol>
                        </nav>
                        <div class="card p-3">
                            <div class="card-body" id="login">
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="old-pwd"><i class="fas fa-key"></i>&nbsp;旧密码</label>
                                        <input type="password" class="form-control" id="old-pwd" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new-pwd"><i class="fas fa-key"></i>&nbsp;密码</label>
                                        <input type="password" class="form-control" id="new-pwd" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new-pwd"><i class="fas fa-key"></i>&nbsp;确认密码</label>
                                        <input type="password" class="form-control" id="new-pwd" placeholder="Password">
                                    </div>
                                    <div class="row justify-content-center login-btn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-4" id="dis-info-right">
                @include('frontend.layouts._dis-info-right')
            </div>
        </div>
    </div>
    @include('frontend.home.components._long_adv')
@endsection