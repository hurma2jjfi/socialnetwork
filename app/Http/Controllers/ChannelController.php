<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    public function index()
{
    $channels = Channel::with('owner')
        ->latest()
        ->paginate(20);

    return view('channels.index', compact('channels'));
}


public function create(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|unique:channels|max:100',
        'description' => 'nullable|max:500',
        'is_private' => 'boolean'
    ]);

    $channel = Auth::user()->channels()->create($validated);

    // Перенаправление на страницу созданного канала
    return redirect()->route('channels.create', $channel)
        ->with('success', 'Канал успешно создан');
}


    public function createView()
{
    return view('channels.create');
}


public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:channels',
        'description' => 'nullable|string|max:1000',
    ]);

    $channel = auth()->user()->channels()->create([
        'name' => $validated['name'],
        'description' => $validated['description']
    ]);

    // Редирект с HTML-откликом
    return redirect()->route('channels.show', $channel)
        ->with('success', 'Канал успешно создан');
}

public function show(Channel $channel)
{
    // Проверка возможности постинга
    $canPost = false;
    if (auth()->check()) {
        $canPost = $channel->owner_id === auth()->id() || 
                   $channel->subscribers()->where('user_id', auth()->id())->exists();
    }

    // Подсчет подписчиков
    $subscribersCount = $channel->subscribers()->count();

    // Проверка подписки текущего пользователя
    $isSubscribed = auth()->check() 
        ? $channel->subscribers()->where('user_id', auth()->id())->exists()
        : false;

    return view('channels.show', [
        'channel' => $channel,
        'canPost' => $canPost,
        'subscribersCount' => $subscribersCount,
        'isSubscribed' => $isSubscribed
    ]);
}

public function update(Request $request, Channel $channel)
{
    $this->authorize('update', $channel);

    $validated = $request->validate([
        'name' => 'required|unique:channels,name,' . $channel->id,
        'description' => 'nullable|max:500',
        'is_private' => 'boolean'
    ]);

    $channel->update($validated);

    return redirect()->route('channels.index')
        ->with('success', 'Канал успешно обновлен');
}

    public function subscribe(Channel $channel)
{
    $user = Auth::user();
    
    if (!$channel->subscribers()->where('user_id', $user->id)->exists()) {
        $channel->subscribers()->attach($user->id);
        
        return redirect()->back()->with('success', 'Вы подписались на канал');
    }

    return redirect()->back()->with('info', 'Вы уже подписаны на этот канал');
}

public function unsubscribe(Channel $channel)
{
    $user = Auth::user();
    
    if ($channel->subscribers()->where('user_id', $user->id)->exists()) {
        $channel->subscribers()->detach($user->id);
        
        return redirect()->back()->with('success', 'Вы отписались от канала');
    }

    return redirect()->back()->with('info', 'Вы не были подписаны на этот канал');
}

public function edit(Channel $channel)
{
    // Проверка прав на редактирование
    $this->authorize('update', $channel);

    return view('channels.edit', compact('channel'));
}

public function destroy(Channel $channel)
{
    // Проверка прав на удаление
    $this->authorize('delete', $channel);

    $channel->delete();

    return redirect()->route('channels.index')
        ->with('success', 'Канал успешно удален');
}




}
