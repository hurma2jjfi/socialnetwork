@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2>Мои каналы</h2>
        @foreach($channels as $channel)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $channel->name }}</h5>
                    <p>{{ $channel->description }}</p>
                    <a href="{{ route('channels.show', $channel) }}" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-4">
        <h2>Последние сообщения</h2>
        @foreach($messages as $message)
            <div class="card mb-2">
                <div class="card-body">
                    {{ $message->content }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
