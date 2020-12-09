<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->foreignId('organiser_user_id')->constrained('users')
            ->onDelete('cascade');
            $table->string('description');
            $table->string('picture');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('views')->default('0');
            $table->unsignedInteger('status')->default('1');
            $table->unsignedInteger('max_attendees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
