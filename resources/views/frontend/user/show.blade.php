@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('frontend.user.components._sidebar')
            </div>
            <div class="col-6">
                <div class="userinfo">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb bg-light">
                            <li class="breadcrumb-item"><a href="#">我的欧米</a></li>
                            <li class="breadcrumb-item"><a href="#">账户管理</a></li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">个人信息</li>
                        </ol>
                    </nav>
                    @include('frontend.layouts._message')
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4">
                                    <h1 class="text-center"><span class="text-primary">0</span></h1>
                                    <p class="text-center m-0"><a href="" class="pb-2 "><b>转寄次数</b></a></p>
                                </div>
                                <div class="col-4">
                                    <h1 class="text-center"><span class="text-primary">0</span></h1>
                                    <p class="text-center m-0"><a href="" class="pb-2"><b>文章数目</b></a></p>
                                </div>
                                <div class="col-4">
                                    <h1 class="text-center"><span class="text-primary">0</span></h1>
                                    <p class="text-center m-0"><a href="" class="pb-2"><b>折扣收藏</b></a></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <p class="m-0"><a href="javascript:"><b>我的信息</b></a></p>
                                </div>
                                <div class="col">
                                    <p class="m-0">
                                        <a href="{{route('users.edit', Auth::id())}}" class="btn btn-sm btn-outline-primary pull-right"><b>查看</b></a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <p class="m-0"><a href="javascript:"><b>我的转寄</b></a></p>
                                </div>
                                <div class="col">
                                    <p class="m-0">
                                        <a href="" class="btn btn-sm btn-outline-primary pull-right"><b>查看</b></a></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <p class="m-0"><a href="javascript:"><b>我的收藏</b></a></p>
                                </div>
                                <div class="col">
                                    <p class="m-0">
                                        <a href="" class="btn btn-sm btn-outline-primary pull-right"><b>查看</b></a></p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <p class="m-0"><a href="javascript:"><b>我的文章</b></a></p>
                                </div>
                                <div class="col">
                                    <p class="m-0">
                                        <a href="" class="btn btn-sm btn-outline-primary pull-right"><b>查看</b></a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @include('frontend.home.components._long_adv')
                </div>
            </div>
            <div class="col-4" id="dis-info-right">
                @include('frontend.layouts._dis-info-right')
            </div>
        </div>
    </div>
    @include('frontend.home.components._long_adv')
@endsection