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
        Schema::create('activities_groups', function (Blueprint $table) {
            $table->id();
            $table ->foreingId('id_activity')->constrained();
            $table ->foreingId('id_group')->constrained();
            $table->timestamps();
     });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_groups');
    }
};
