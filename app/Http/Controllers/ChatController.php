<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;  

class ChatController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $subjects = Subject::all();
        $sessions = ChatSession::where('user_id', Auth::id())
            ->with('subject')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('ai.chat', compact('subjects', 'sessions'));
    }

    public function createSession(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $subject = Subject::findOrFail($validated['subject_id']);

        $session = ChatSession::create([
            'user_id' => Auth::id(),
            'subject_id' => $validated['subject_id'],
            'title' => "{$subject->name}",
        ]);

        return response()->json([
            'id' => $session->id,
            'title' => $session->title,
            'subject' => $subject->name,
        ]);
    }

    public function deleteSession(ChatSession $session)
    {
        $this->authorize('manage', $session);
        $session->delete();
        return response()->json(['success' => true]);
    }

    public function renameSession(Request $request, ChatSession $session)
    {
        $this->authorize('manage', $session);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $session->update(['title' => $validated['title']]);
        
        return response()->json([
            'id' => $session->id,
            'title' => $session->title,
        ]);
    }

    public function getSession(ChatSession $session)
    {
        $this->authorize('view', $session);
        
        $session->load(['messages', 'subject']);
        
        return response()->json($session);
    }
}
