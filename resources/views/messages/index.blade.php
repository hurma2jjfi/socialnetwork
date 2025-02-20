@extends('layouts.app')

@section('content')
<div class="container messages-container">
    <h2 class="mb-4">Мои сообщения</h2>
    <div class="conversations-grid">
        @foreach($conversations as $conversation)
            <div class="conversation-card">
                <div class="conversation-avatar position-relative">
                    <img 
                        src="{{ $conversation['partner']->avatar ? asset('storage/' . $conversation['partner']->avatar) : asset('default-avatar.png') }}" 
                        alt="{{ $conversation['partner']->username }}" 
                        class="rounded-circle"
                    >
                    @if($conversation['partner']->isOnline())
                        <span class="online-status-badge position-absolute" style="
                            bottom: 0;
                            right: 0;
                            width: 12px;
                            height: 12px;
                            background-color: #4CAF50;
                            border-radius: 50%;
                            border: 2px solid white;
                        "></span>
                    @endif
                    @if($conversation['unread_count'] > 0)
                        <span class="badge unread-badge">{{ $conversation['unread_count'] }}</span>
                    @endif
                </div>
                <div class="conversation-content">
                    <div class="conversation-header">
                        <h5 class="username">
                            {{ $conversation['partner']->username }}
                            @if($conversation['partner']->isOnline())
                                <span class="text-success ml-2" style="font-size: 0.7rem;">Online</span>
                            @else
                                <span class="text-muted ml-2" style="font-size: 0.7rem;">
                                    {{ $conversation['partner']->lastSeenFormatted() }}
                                </span>
                            @endif
                        </h5>
                    </div>
                    <p class="last-message">
                        {{ Str::limit($conversation['last_message']->content ?? 'Нет сообщений', 50) }}
                    </p>
                </div>
                <div class="conversation-actions">
                    <a href="{{ route('messages.conversation', $conversation['partner']) }}" class="btn btn-primary btn-sm">
                        Написать
                    </a>
                    <span class="time">
                        {{ $conversation['last_message']->created_at->diffForHumans() }}
                    </span>
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

.conversations-grid .conversation-avatar .unread-badge {
    position: absolute !important;
    top: -5px !important;
    right: -5px !important;
    background-color: #ff3b5c !important;
    color: white !important;
    border-radius: 50% !important;
    min-width: 25px !important;
    height: 25px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 2px !important;
    font-size: 0.7rem !important;
    font-weight: 600 !important;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12) !important;
    z-index: 10 !important;
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

.conversation-actions {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.time {
    color: #888;
    font-size: 0.7rem;
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
    margin-bottom: 5px;
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
