@extends('layouts.app')

@section('content')
<div class="container messages-container">
    <h2 class="mb-4">Мои сообщения</h2>
    <div class="conversations-grid">
        @foreach($conversations as $conversation)
            <div class="conversation-card">
                <div class="conversation-avatar">
                    <img 
                        src="{{ $conversation['partner']->avatar ? asset('storage/' . $conversation['partner']->avatar) : asset('default-avatar.png') }}" 
                        alt="{{ $conversation['partner']->username }}" 
                        class="rounded-circle"
                    >
                    {{-- блок для счетчика --}}
                    @if($conversation['unread_count'] > 0)
                        <span class="badge unread-badge">{{ $conversation['unread_count'] }}</span>
                    @endif
                </div>
                <div class="conversation-content">
                    <div class="conversation-header">
                        <h5 class="username">{{ $conversation['partner']->username }}</h5>
                        <span class="time">
                            {{ $conversation['last_message']->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="last-message">
                        {{ Str::limit($conversation['last_message']->content ?? 'Нет сообщений', 50) }}
                    </p>
                </div>
                <div class="conversation-actions">
                    <a href="{{ route('messages.conversation', $conversation['partner']) }}" class="btn btn-primary btn-sm">
                        Написать
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection




<style>
.messages-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 0;
}

.conversations-grid {
    display: grid;
    grid-gap: 10px;
    background-color: #f0f2f5;
    border-radius: 10px;
    padding: 10px;
}

.conversation-card {
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: 15px;
    background-color: white;
    border-radius: 10px;
    padding: 10px;
    transition: background-color 0.3s ease;
}

.conversation-card:hover {
    background-color: #f8f9fa;
}

.conversation-avatar {
    position: relative;
}

.conversation-avatar img {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.unread-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #2196F3;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 0.7rem;
}

.conversation-content {
    overflow: hidden;
}

.conversation-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.username {
    margin: 0;
    font-weight: 600;
}

.time {
    color: #888;
    font-size: 0.8rem;
}

.last-message {
    margin: 5px 0 0;
    color: #666;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.conversation-actions .btn {
    padding: 5px 10px;
}

@media (max-width: 576px) {
    .conversations-grid {
        grid-gap: 5px;
        padding: 5px;
    }

    .conversation-card {
        gap: 10px;
        padding: 8px;
    }

    .conversation-avatar img {
        width: 40px;
        height: 40px;
    }
}
</style>
