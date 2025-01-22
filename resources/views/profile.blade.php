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
            <div class="card mb-4">
                <div class="card-header">
                    Настройки профиля
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Имя пользователя</label>
                            <input 
                                type="text" 
                                name="username" 
                                class="form-control @error('username') is-invalid @enderror" 
                                value="{{ old('username', $user->username) }}"
                            >
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email', $user->email) }}"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Аватар</label>
                            <input 
                                type="file" 
                                name="avatar" 
                                class="form-control @error('avatar') is-invalid @enderror" 
                                accept="image/*"
                            >
                            @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Биография</label>
                            <textarea 
                                name="bio" 
                                class="form-control @error('bio') is-invalid @enderror" 
                                rows="3"
                            >{{ old('bio', $user->bio ?? '') }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Смена пароля</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                placeholder="Оставьте пустым, если не хотите менять"
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Подтверждение пароля</label>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                class="form-control" 
                                placeholder="Повторите новый пароль"
                            >
                        </div>

                        <div class="mb-3 form-check">
                            <input 
                                type="checkbox" 
                                name="private_profile" 
                                class="form-check-input" 
                                id="privateProfile"
                                {{ $user->private_profile ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="privateProfile">
                                Приватный профиль
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Обновить профиль
                        </button>
                    </form>
                </div>
            </div>

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
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger">
        Выйти
    </button>
</form>

            
        </div>
    </div>
</div>
@endsection
