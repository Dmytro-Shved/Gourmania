<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dish_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_category_id')->constrained('dish_categories')->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });

        $categories = include(database_path('data/dish_categories.php'));

        foreach ($categories as $categoryName => $subcategories){
            $data = [];

            // get id of category by name
            $categoryId = DB::table('dish_categories')
                ->where('name', $categoryName)
                ->value('id');

            if (!$categoryId) {
                continue;
            }

            foreach ($subcategories as $subcategoryName){
                $data[] = [
                    'dish_category_id' =>  $categoryId,
                    'name' => $subcategoryName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // change length in case there is too much data (1000)
            foreach (array_chunk($data, 300) as $chunk) {
                DB::table('dish_subcategories')->insert($chunk);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_subcategories');
    }
};
