@if (count($posts))

    <ul class="list-unstyled p-0">
        @foreach ($posts as $post)
            <li class="media bg-light p-4 my-3">
                <a href="{{ route('users.show', [$post->user_id]) }}">
                    <img class="mr-3 rounded-circle" style="width: 52px; height: 52px;" src="{{ $post->user->avatar }}" title="{{ $post->user->name }}">
                </a>
                <div class="media-body">
                    <div class="media-heading">
                        <a href="{{ $post->link() }}" title="{{ $post->title }}">
                            <span class="h5 mt-0 mb-1">
                                {{ $post->title }}
                            </span>
                        </a>
                        <a class="pull-right" href="{{ $post->link() }}">
                            <span class="badge badge-primary"> {{ $post->reply_count }} </span>
                        </a>
                    </div>
                    <div class="media-body mt-1">
                        <a class="mr-2 text-secondary " href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                            {{ $post->category->name }}
                        </a>
                        <span class="text-primary"> / </span>
                        <a class="mr-2" href="{{ route('users.show', [$post->user_id]) }}" title="{{ $post->user->name }}">
                            {{ $post->user->name }}
                        </a>
                        <span class="text-primary"> / </span>
                        <span class="text-secondary" title="最后活跃于">{{ $post->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </li>

        @endforeach
    </ul>
    {{ $posts->links() }}

@else
    <div class="empty-block">暂无数据 ~_~</div>
@endif