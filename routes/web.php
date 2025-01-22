<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    Auth\AuthController,
    UserController,
    ChannelController,
    PostController,
    MessageController,
    HomeController
};

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);


});

Route::middleware(['auth'])->group(function() {
    // Основные маршруты
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
    // Профиль пользователя
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile']);

    // Каналы
    Route::resource('channels', ChannelController::class);
    Route::get('/channels', [ChannelController::class, 'index'])->name('channels.index');
    Route::post('/channels/{channel}/subscribe', [ChannelController::class, 'subscribe']);
    Route::post('/channels/{channel}/unsubscribe', [ChannelController::class, 'unsubscribe']);
    Route::get('/channels/create', [ChannelController::class, 'createView'])->name('channels.create');
    Route::post('/channels', [ChannelController::class, 'create'])->name('channels.store');
    Route::post('/channels/{channel}/posts', [PostController::class, 'store'])->name('channels.posts.store');
    Route::post('/channels/{channel}/subscribe', [ChannelController::class, 'subscribe'])
    ->name('channels.subscribe');
Route::delete('/channels/{channel}/unsubscribe', [ChannelController::class, 'unsubscribe'])
    ->name('channels.unsubscribe');


    // Посты
    Route::post('/channels/{channel}/posts', [PostController::class, 'store']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    // Сообщения
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::get('/messages/{user:username}/conversation', [MessageController::class, 'conversation'])
    ->name('messages.conversation');
    Route::post('/messages/send', [MessageController::class, 'sendMessage'])
    ->name('messages.send');
    Route::get('/messages/{user}', [MessageController::class, 'getConversation']);
    Route::post('/messages', [MessageController::class, 'sendMessage']);
});


Route::get('/', function () {
    return view('welcome');
});
