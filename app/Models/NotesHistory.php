<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotesHistory extends Model
{
    protected $fillable = [
        'notes_id',
        'old_title',
        'new_title',
        'old_text',
        'new_text',
    ];
}