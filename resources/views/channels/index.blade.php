@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('channels.create') }}" class="btn btn-success mb-3">Создать канал</a>
            
            @foreach($channels as $channel)
                <div class="card mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{{ $channel->name }}</h5>
                            <p>{{ $channel->description }}</p>
                            <small>Подписчиков: {{ $channel->subscribers()->count() }}</small>
                        </div>
                        
                        <div class="channel-actions d-flex">
                            <a href="{{ route('channels.show', $channel) }}" class="btn btn-primary btn-sm mr-2">
                                Подробнее
                            </a>
                            
                            @if(auth()->id() == $channel->owner_id)
                                <a href="{{ route('channels.edit', $channel) }}" class="btn btn-warning btn-sm mr-2">
                                    Редактировать
                                </a>
                                <form action="{{ route('channels.destroy', $channel) }}" 
                                      method="POST" 
                                      class="d-inline" 
                                      onsubmit="return confirm('Вы уверены, что хотите удалить канал?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Удалить
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
