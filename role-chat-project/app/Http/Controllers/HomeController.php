<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Chat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $stats = [
                'users' => User::count(),
                'roles' => Role::count(),
                'permissions' => Permission::count(),
                'messages' => Chat::count(),
            ];
        } else {
            $stats = [
                'sent_messages' => Chat::where('sender_id', auth()->id())->count(),
                'received_messages' => Chat::where('receiver_id', auth()->id())->count(),
            ];
        }

        return view('home', compact('stats'));
    }
}
