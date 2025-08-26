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
        Schema::create('cuisines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $countries = [
            "Australia",
            "Belgium",
            "China",
            "France",
            "Germany",
            "Italy",
            "Mexico",
            "Poland",
            "Portugal",
            "Spain",
            "Turkey",
            "Ukraine",
            "United Kingdom",
            "United States"
        ];

        foreach ($countries as $country) {
            DB::table('cuisines')->insert([
                'name' => $country,
                'created_at' => now(),
                'updated_at' => now(),A
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuisines');
    }
};
