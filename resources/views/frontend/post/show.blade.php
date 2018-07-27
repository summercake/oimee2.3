@extends('frontend.layouts.app')
@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')
    @include('frontend.home.components._long_adv')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="text-center">
                            {{ $post->title }}
                        </h1>
                        <div>
                            <span class="text-left">
                                <a href="{{ route('users.show', $post->user->id) }}">
                                    <img class="rounded-circle" src="{{ $post->user->avatar }}" width="25">
                                        {{ $post->user->name }}
                                </a>
                            <span class="text-primary"> / </span>
                                {{ $post->created_at->diffForHumans() }}
                                <span class="text-primary"> / </span>
                            已有 {{ $post->reply_count }} 参与讨论
                            <span class="text-primary"> / </span>
                            已有 {{ $post->view_count }} 人阅读
                            </span>
                            <span class="pull-right text-right">
                                分享
                            </span>
                        </div>
                        <hr>
                        <div class="post-body">
                            {!! $post->body !!}
                        </div>
                        @can('update', $post)
                            <div class="operate">
                                <hr>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary" role="button">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-primary" role="button">
                                    <i class="fa fa-trash"></i> 删除
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs author-info">
                @include('frontend.layouts._dis-info-right')
            </div>
        </div>
    </div>

@stop