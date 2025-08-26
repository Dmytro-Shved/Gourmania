<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->enum('type', ['popular', 'latest', 'category']);
            $table->string('category_slug')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('visible')->default(true);
            $table->integer('limit')->default(4);
            $table->timestamps();
        });

        $sections = include(database_path('data/sections.php'));

        $data = [];
        foreach ($sections as $section) {
            $section['slug'] = Str::slug($section['name']);
            $section['created_at'] = now();
            $section['updated_at'] = now();

            $data[] = $section;
        }

        DB::table('homepage_sections')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_sections');
    }
};
