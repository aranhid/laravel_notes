<?php

namespace App\Providers;

use App\Providers\NoteChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\NotesHistory;

class WriteNoteChangeToDatabase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NoteChanged  $event
     * @return void
     */
    public function handle(NoteChanged $event)
    {
        $oldNote = $event->oldNote;
        $newNote = $event->newNote;

        $history = NotesHistory::create([
            'notes_id' => $oldNote->id,
            'old_title' => $oldNote->title,
            'new_title' => $newNote->title,
            'old_text' => $oldNote->text,
            'new_text' => $newNote->text,
        ]);
    }
}
