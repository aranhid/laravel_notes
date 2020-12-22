<?php

namespace App\Providers;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Note;
use App\Models\NotesHistory;
use Carbon\Carbon;

class NoteChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $oldNote;
    public $newNote;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Note $oldNote, Note $newNote)
    {
        $this->oldNote = $oldNote;
        $this->newNote = $newNote;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
