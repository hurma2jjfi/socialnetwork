@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Регистрация</div>
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

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Имя пользователя</label>
                        <input 
                            type="text" 
                            name="username" 
                            class="form-control @error('username') is-invalid @enderror" 
                            value="{{ old('username') }}"
                            required
                        >
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
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
                    <div class="mb-3">
                        <label>Подтверждение пароля</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            class="form-control @error('password_confirmation') is-invalid @enderror" 
                            required
                        >
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Аватар</label>
                        <input 
                            type="file" 
                            id="avatarInput"  // Исправлено имя ID
                            name="avatar" 
                            class="form-control @error('avatar') is-invalid @enderror"
                            accept="image/*"
                        >
                        @error('avatar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <img 
                            id="avatarPreview" 
                            src="" 
                            class="img-fluid mt-3 rounded" // Добавлены bootstrap классы
                            style="display:none; max-height: 200px;"
                        >
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        <a href="{{ route('login') }}" class="btn btn-link">Уже есть аккаунт?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('avatarInput').addEventListener('change', function(event) {  // Исправлено имя ID
    const file = event.target.files[0];
    const preview = document.getElementById('avatarPreview');
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
});
</script>
@endpush
@endsection
