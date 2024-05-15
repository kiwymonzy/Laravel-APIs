<?php

// In create_projects_table.php

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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Add other project-related fields as needed
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};