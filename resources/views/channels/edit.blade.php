@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование канала</div>
                <div class="card-body">
                    <form action="{{ route('channels.update', $channel) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label>Название канала</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                value="{{ $channel->name }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label>Описание канала</label>
                            <textarea 
                                name="description" 
                                class="form-control"
                                rows="3"
                            >{{ $channel->description }}</textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input 
                                type="checkbox" 
                                name="is_private" 
                                class="form-check-input" 
                                id="privateChannel"
                                {{ $channel->is_private ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="privateChannel">
                                Приватный канал
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Обновить канал
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
