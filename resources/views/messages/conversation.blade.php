@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <img 
                src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('default-avatar.png') }}" 
                alt="{{ $user->username }}" 
                class="rounded-circle mr-3"
                style="width: 50px; height: 50px; object-fit: cover;"
            >
            <h5 class="mb-0 ml-3">Переписка с {{ $user->username }}</h5>
        </div>
        <div class="card-body">
            @foreach($messages as $message)
                <div class="message mb-3 d-flex 
                    {{ $message->sender_id == auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                    @if($message->sender_id != auth()->id())
                        <img 
                            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('default-avatar.png') }}" 
                            alt="{{ $user->username }}" 
                            class="rounded-circle mr-2"
                            style="width: 40px; height: 40px; object-fit: cover;"
                        >
                    @endif
                    <div class="message-content 
                        {{ $message->sender_id == auth()->id() ? 'bg-primary text-white' : 'bg-light' }} 
                        p-2 rounded">
                        {{ $message->content }}
                        <small class="text-muted d-block 
                            {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                            {{ $message->created_at->diffForHumans() }}
                        </small>
                    </div>
                    @if($message->sender_id == auth()->id())
                        <img 
                            src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('default-avatar.png') }}" 
                            alt="{{ auth()->user()->username }}" 
                            class="rounded-circle ml-2"
                            style="width: 40px; height: 40px; object-fit: cover;"
                        >
                    @endif
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <form action="{{ route('messages.send') }}" method="POST">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <textarea name="content" class="form-control" required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Отправить</button>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
.message-content {
    max-width: 70%;
}
</style>
