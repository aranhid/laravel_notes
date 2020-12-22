<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notes_id');
            $table->string('old_title');
            $table->string('new_title');
            $table->text('old_text');
            $table->text('new_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes_history');
    }
}
