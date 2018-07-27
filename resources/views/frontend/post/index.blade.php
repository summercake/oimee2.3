@extends('frontend.layouts.app')
@section('title', isset($category) ? $category->name : '话题列表')

@section('content')
    @include('frontend.home.components._long_adv')
    <div class="container">
        <div class="row " id="adv-first">
            <div class="col">
                <h5 id="tags">
                    <a href="{{ Request::url() }}?order=default" class="btn btn-outline-primary mr-1">最新回复</a>
                    <a href="{{ Request::url() }}?order=recent" class="btn btn-outline-primary mx-1">最新发布</a>
                    {{--<a href="" class="btn btn-outline-primary mx-1">分享</a>--}}
                    {{--<a href="" class="btn btn-outline-primary mx-1">技巧</a>--}}
                    {{--<a href="" class="btn btn-outline-primary mx-1">吐槽</a>--}}
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                @if (isset($category))
                    <div class="alert alert-primary" role="alert">
                        分类 : {{ $category->name }}
                    </div>
                @endif
                @include('frontend.post.components._post-list')
            </div>
            <div class="col-lg-4 col-md-4 d-none d-xl-block d-lg-block d-md-block">
                @include('frontend.layouts._dis-info-right')
            </div>
        </div>
    </div>


@endsection