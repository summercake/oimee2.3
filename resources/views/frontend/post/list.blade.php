@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('frontend.user.components._sidebar')
            </div>
            <div class="col-10">
                <div class="userinfo">
                    <div class="address-table">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb bg-light">
                                <li class="breadcrumb-item"><a href="#">我的欧米</a></li>
                                <li class="breadcrumb-item"><a href="#">转寄管理</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">地址管理</li>
                                <a href="{{route('posts.create')}}" class="btn btn-sm btn-outline-primary ml-auto"><b>创建话题</b></a>
                            </ol>
                        </nav>
                        <table class="table table-sm table-hover table-responsive text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">标题</th>
                                <th scope="col">回复总数</th>
                                <th scope="col">阅读总数</th>
                                <th scope="col">修改时间</th>
                                <th scope="col">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->reply_count}}</td>
                                    <td>{{$post->view_count}}</td>
                                    <td>{{$post->updated_at}}</td>
                                    <td>
                                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-outline-success">修改话题</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">删除话题</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.home.components._long_adv')
@endsection