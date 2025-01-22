<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function profile()
{
    $user = auth()->user(); // Получаем текущего авторизованного пользователя
    
    $user->load([
        'channels' => function($query) {
            $query->latest()->limit(10); // Загружаем последние 10 каналов
        },
        'posts' => function($query) {
            $query->latest()->limit(10); // Загружаем последние 10 постов
        }
    ]);

    return view('profile', compact('user'));
}


public function updateProfile(Request $request)
{
    $user = auth()->user();

    $validated = $request->validate([
        'username' => 'sometimes|unique:users,username,' . $user->id,
        'email' => 'sometimes|email|unique:users,email,' . $user->id,
        'avatar' => 'nullable|image|max:2048',
        'bio' => 'nullable|string|max:500',
        'password' => 'nullable|min:6|confirmed',
        'private_profile' => 'boolean'
    ]);

    // Обработка аватара
    if ($request->hasFile('avatar')) {
        // Удаление старого аватара
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $validated['avatar'] = $avatarPath;
    }

    // Обновление пароля
    if ($request->filled('password')) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    return redirect()->back()->with('success', 'Профиль успешно обновлен');
}

    public function search(Request $request)
    {
        $query = $request->input('query');

        return User::where('username', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->limit(10)
            ->get();
    }


    public function dashboard()
{
    $user = auth()->user();
    $channels = $user->channels;
    $messages = $user->messages()->latest()->take(5)->get();

    return view('dashboard', compact('channels', 'messages'));
}

}
