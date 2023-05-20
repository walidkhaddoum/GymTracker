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
        Schema::create('catalogue_group_session', function (Blueprint $table) {
            $table->unsignedBigInteger('catalogue_id');
            $table->unsignedBigInteger('group_session_id');
            $table->timestamps();
            $table->foreign('catalogue_id')->references('id')->on('catalogues')->onDelete('cascade');
            $table->foreign('group_session_id')->references('id')->on('group_sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogue_group_session');
    }
};
