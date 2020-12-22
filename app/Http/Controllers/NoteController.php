<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use Auth;

class NoteController extends Controller
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
        $notes = Auth::user()->notes;
        return view('home', compact('notes'));
    }

    public function new()
    {
        return view('note.new');
    }

    
    public function edit($id)
    {
        $note = Note::find($id);
        session([
            'title' => $note->title,
            'text' => $note->text,
        ]);

        return view('note.edit', compact('note'));
    }

    public function create(Request $request)
    {
        session([
            'title' => $request['title'],
            'text' => $request['text'],
        ]);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $note = Note::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'user_id' => Auth::user()->id,
        ]);

        $note->save();

        session([
            'title' => '',
            'text' => '',
        ]);

        return redirect()->route('home');
    }

    public function update(Request $request, Note $note)
    {
        session([
            'title' => $request['title'],
            'text' => $request['text'],
        ]);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $note->update($request->all());

        session([
            'title' => '',
            'text' => '',
        ]);

        return redirect()->route('home');
    }

    public function delete(Note $note)
    {
        $note->delete();
        
        return redirect()->route('home');
    }
}
