<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request, Channel $channel)
    {
        // Проверка прав на публикацию
        $this->authorize('createPost', $channel);

        // Валидация
        $validated = $request->validate([
            'content' => 'required|string|max:5000',
            'media' => 'nullable|file|mimes:jpeg,png,gif,mp4,avi|max:10240'
        ]);

        // Обработка медиафайла
        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('channel_posts', 'public');
        }

        // Создание поста
        $post = $channel->posts()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'media_url' => $mediaPath
        ]);

        return redirect()->route('channels.show', $channel)
            ->with('success', 'Пост успешно опубликован');
    }

    public function destroy(Post $post)
    {
        // Проверка прав на удаление
        $this->authorize('delete', $post);

        // Удаление медиафайла
        if ($post->media_url) {
            Storage::disk('public')->delete($post->media_url);
        }

        $post->delete();

        return back()->with('success', 'Пост удален');
    }


    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'content' => 'sometimes|max:5000',
            'media' => 'nullable|file|max:10240'
        ]);

        if ($request->hasFile('media')) {
            // Удаляем старый медиафайл
            if ($post->media_url) {
                Storage::disk('public')->delete($post->media_url);
            }

            $mediaPath = $request->file('media')->store('channel_media', 'public');
            $validated['media_url'] = $mediaPath;
        }

        $post->update($validated);

        return response()->json($post);
    }
}

