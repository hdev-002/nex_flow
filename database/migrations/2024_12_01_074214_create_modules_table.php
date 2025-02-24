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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique(); 
            $table->text('description')->nullable();
            $table->string('repository');
            $table->string('branch')->default('main');
            $table->enum('status', ['not-installed', 'installed', 'archived'])->default('not-installed');
            $table->unsignedBigInteger('download_count')->default(0);
            $table->unsignedBigInteger('view_count')->default(0);
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('is_verified')->default(false);
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->string('license')->default('MIT');
            $table->timestamp('last_updated_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        
        Schema::create('module_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->string('version');
            $table->string('changelog')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->timestamps();
        });

        
        Schema::create('module_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
