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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $menus = [
            "Ketogenic",
            "Gluten-free",
            "Vegetarian",
            "Vegan",
            "Lactose-free",
            "Kids menu",
            "Low-calorie",
            "Lenten",
            "Diabetic-friendly"
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert([
                'name' => $menu,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
