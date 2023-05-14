<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
