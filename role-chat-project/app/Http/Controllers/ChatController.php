<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Chat::class, 'chat', [
            'except' => ['index', 'show', 'store', 'allMessages'],
        ]);
    }

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.index', compact('users'));
    }

    public function show($userId)
    {
        $currentUser = Auth::user();
        $chatUser = User::findOrFail($userId);

        if ($currentUser->hasPermissionTo('chat_read_all') || $currentUser->hasRole('admin')) {
            $messages = Chat::where(function ($query) use ($currentUser, $userId) {
                $query->where('sender_id', $currentUser->id)
                    ->where('receiver_id', $userId);
            })->orWhere(function ($query) use ($currentUser, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $currentUser->id);
            })->orderBy('created_at', 'asc')->get();
        } else {
            $messages = Chat::where(function ($query) use ($currentUser, $userId) {
                $query->where('sender_id', $currentUser->id)
                    ->where('receiver_id', $userId);
            })->orWhere(function ($query) use ($currentUser, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $currentUser->id);
            })->orderBy('created_at', 'asc')->get();
        }

        return view('chat.show', compact('messages', 'chatUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required',
        ]);

        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'MEssage sent successfully.');
    }

    public function allMessages()
    {
        $this->authorize('viewAll', Chat::class);
        $messages = Chat::with(['sender', 'receiver'])->orderBy('created_at', 'desc')->paginate(20);
        return view('chat.all', compact('messages'));
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();

        return redirect()->back()->with('error', "You don't have permission to delete!");
    }
}
