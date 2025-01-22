@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Создание нового канала</div>
                <div class="card-body">
                    <form action="{{ route('channels.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Название канала</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                required
                                maxlength="100"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Описание канала</label>
                            <textarea 
                                name="description" 
                                class="form-control @error('description') is-invalid @enderror" 
                                maxlength="500"
                                rows="3"
                            ></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input 
                                type="checkbox" 
                                name="is_private" 
                                class="form-check-input" 
                                id="privateChannel"
                            >
                            <label class="form-check-label" for="privateChannel">
                                Приватный канал
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Создать канал
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
