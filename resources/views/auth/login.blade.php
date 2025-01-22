@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Вход</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Пароль</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            class="form-check-input" 
                            id="remember"
                        >
                        <label class="form-check-label" for="remember">
                            Запомнить меня
                        </label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Войти</button>
                        <a href="{{ route('register') }}" class="btn btn-link">Регистрация</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
