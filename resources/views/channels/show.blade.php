@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2>{{ $channel->name }}</h2>
                    <p>{{ $channel->description }}</p>
                    <small>{{ $subscribersCount }} подписчиков</small>
                </div>

                @auth
                    @if(!$isSubscribed)
                        <form action="{{ route('channels.subscribe', $channel) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Подписаться</button>
                        </form>
                    @else
                        <form action="{{ route('channels.unsubscribe', $channel) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">Отписаться</button>
                        </form>
                    @endif
                @endauth
            </div>

            @if($canPost)
            <form action="{{ route('channels.store', $channel) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" placeholder="Напишите сообщение..." required></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" name="media" class="form-control" accept="image/*,video/*">
                </div>
                <button type="submit" class="btn btn-primary">Опубликовать</button>
            </form>
            @endif

            <div class="posts-container">
                @foreach($channel->posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            @if($post->media_url)
                                <img src="{{ asset('storage/' . $post->media_url) }}" class="img-fluid mb-3">
                            @endif
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
