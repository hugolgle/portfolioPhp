<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($id)
    {
        $message = Message::find($id);
        return view('admin.messagesById', compact('message'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $data['name'],
            'subject' => $data['subject'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);

        return redirect()->to(url('/'))
            ->with('success', 'Votre message a bien été enregistré.');
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->update($request->all());
        return response()->json($message, 200);
    }

    public function updateVisibility(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => $request->boolean('is_read')]);
        return response()->json($message, 200);
    }


    public function destroy($id)
    {
        Message::destroy($id);
        return redirect()->route('admin.messages')
            ->with('success', 'Message supprimé avec succès.');
    }
}
