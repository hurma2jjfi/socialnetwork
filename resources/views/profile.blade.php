@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'default-avatar.png' }}" 
                     alt="Avatar" 
                     class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->username }}</h5>
                    <p class="card-text">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3>Мои каналы</h3>
            @forelse($user->channels as $channel)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5>{{ $channel->name }}</h5>
                        <p>{{ $channel->description }}</p>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    У вас пока нет каналов :(
                </div>
            @endforelse

            <h3>Мои посты</h3>
            @forelse($user->posts as $post)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $post->content }}
                        @if($post->media_url)
                            <img src="{{ Storage::url($post->media_url) }}" 
                                 class="img-fluid mt-2" 
                                 alt="Post media">
                        @endif
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    У вас пока нет постов :(
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
