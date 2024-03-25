<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.message.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.message.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:30',
            'no_wa' => 'required|string|max:20',
        ]);

        Message::create($request->all());

        return redirect()->route('admin.messages.index')
            ->with('success', 'Kontak Berhasil Dibuat.');
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.message.show', compact('message'));
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.message.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:30',
            'no_wa' => 'required|string|max:20',
        ]);

        $message = Message::findOrFail($id);
        $message->update($request->all());

        return redirect()->route('admin.messages.index')
            ->with('success', 'Kontak berhasil di Update.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Kontak berhasil di Hapus.');
    }
}
