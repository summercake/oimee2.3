@extends('frontend.layouts.app')
@section('description', $post->excerpt)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                @include('frontend.user.components._sidebar')
            </div>
            <div class="col-6">
                <div class="userinfo">
                    @if($post->id)
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" accept-charset="UTF-8">
                            @method('PUT')
                    @else
                        <form action="{{ route('posts.store') }}" method="POST" accept-charset="UTF-8">
                    @endif
                             @csrf
                                    <nav aria-label="breadcrumb ">
                                        <ol class="breadcrumb bg-light">
                                            <li class="breadcrumb-item"><a href="#">我的欧米</a></li>
                                            <li class="breadcrumb-item"><a href="#">账户管理</a></li>
                                            <li class="breadcrumb-item active text-primary" aria-current="page">修改个人密码</li>
                                            <button type="submit" class="btn btn-sm btn-outline-primary ml-auto">
                                                <b>保存</b></button>
                                        </ol>
                                    </nav>
                                    @include('frontend.layouts._message')
                                    @include('frontend.layouts._error')
                                    <div class="card p-3">
                                        <div class="card-body" id="login">
                                            <div class="login-form">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" name="title" value="{{ old('title', $post->title ) }}" placeholder="请填写标题" required/>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="category_id" required>
                                                        <option value="" hidden disabled {{ $post->id ? '' : 'selected' }}>请选择分类</option>
                                                        @foreach ($categories as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                        <textarea name="body" class="form-control" id="editor" rows="3" placeholder="请填入至少三个字符的内容。" required>{{ old('body', $post->body ) }}</textarea>
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
    @stop
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
		$(document).ready(function(){
			var editor = new Simditor({
				textarea: $('#editor'),
				upload: {
					url: '{{ route('posts.upload_image') }}',
					params: { _token: '{{ csrf_token() }}' },
					fileKey: 'upload_file',
					connectionCount: 3,
					leaveConfirm: '文件上传中，关闭此页面将取消上传。'
				},
				pasteImage: true,
			});
		});
    </script>
@stop
