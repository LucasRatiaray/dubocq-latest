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
        Schema::create('project_user', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\User::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(\App\Models\Project::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->unique(['user_id', 'project_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
    }
};
