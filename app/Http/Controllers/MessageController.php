<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class MessageController extends Controller
{
    public function index()
{
    $userId = auth()->id();

    $conversations = Message::where('sender_id', $userId)
        ->orWhere('receiver_id', $userId)
        ->get()
        ->groupBy(function($message) use ($userId) {
            return $message->sender_id == $userId 
                ? $message->receiver_id 
                : $message->sender_id;
        })
        ->map(function($messages) {
            $lastMessage = $messages->sortByDesc('created_at')->first();
            $partnerId = $lastMessage->sender_id == auth()->id() 
                ? $lastMessage->receiver_id 
                : $lastMessage->sender_id;
            
            // Добавляем подсчет непрочитанных сообщений
            $unreadCount = $messages->where('is_read', false)
                                    ->where('receiver_id', auth()->id())
                                    ->count();
            
            return [
                'partner' => User::find($partnerId),
                'last_message' => $lastMessage,
                'unread_count' => $unreadCount // Новое поле
            ];
        });

    return view('messages.index', compact('conversations'));
}


    public function conversation(User $user)
    {
        $messages = Message::where(function($query) use ($user) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')
          ->paginate(50);

        return view('messages.conversation', [
            'messages' => $messages,
            'user' => $user
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|max:1000'
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $validated['receiver_id'],
            'content' => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Сообщение отправлено');
    }

    public function up()
{
    Schema::table('messages', function (Blueprint $table) {
        $table->boolean('is_read')->default(false);
    });
}

}
