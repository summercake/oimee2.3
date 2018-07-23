@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('frontend.user.components._sidebar')
            </div>
            <div class="col-6">
                <div class="userinfo">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8">
                        @csrf
                        @method('put')
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb bg-light">
                                <li class="breadcrumb-item"><a href="#">我的欧米</a></li>
                                <li class="breadcrumb-item"><a href="#">账户管理</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">修改个人信息</li>
                                <button type="submit" class="btn btn-sm btn-outline-primary ml-auto"><b>保存</b></button>
                            </ol>
                        </nav>
                        <div class="card p-3">
                            <div class="card-body" id="login">
                                {{--<div class="form-group">
                                    @if($user->avatar)
                                        <img class="rounded-circle img-fluid" src="{{ $user->avatar }}" width="50"/>
                                    @endif
                                    <label for="avatar" class="avatar-label btn btn-outline-success " >头像上传</label>
                                    <input type="file" name="avatar" id="avatar" style="visibility: hidden;">
                                </div>--}}
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="text"><i class="fas fa-user"></i>&nbsp;用户名</label>
                                        <input type="text" class="form-control" name="name"  value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-envelope"></i>&nbsp;邮箱</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="text"><i class="fas fa-pen-nib"></i>&nbsp;个人简介</label>
                                        <textarea type="text" class="form-control" name="introduction" placeholder="最多80个字符" rows="3" style="resize: none;">{{ old('introduction', $user->introduction ) }}</textarea>
                                    </div>
                                    {{--<div class="form-group">
                                        <label for="old-pwd"><i class="fas fa-key"></i>&nbsp;旧密码</label>
                                        <input type="password" class="form-control" id="old-pwd" placeholder="Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new-pwd"><i class="fas fa-key"></i>&nbsp;新密码</label>
                                        <input type="password" class="form-control" id="new-pwd" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-new-pwd"><i class="fas fa-key"></i>&nbsp;确认新密码</label>
                                        <input type="password" class="form-control" id="confirm-new-pwd" placeholder="Confirm New Password">
                                    </div>--}}
                                    @include('frontend.layouts._error')
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