<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create()
    {
        return view('web.pesan');
    }

    public function store(MessageRequest $request)
    {
        Message::create($request->validated());

        return redirect()->route('pesan.create')
            ->with('success', 'Pesan berhasil dikirim.');
    }

    public function index()
    {
        $messages = Message::all();
        return view('admin.message.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
