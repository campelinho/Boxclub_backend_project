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
    Schema::table('users', function (Blueprint $table) {
        $table->string('gebruikersnaam')->nullable();
        $table->date('verjaardag')->nullable();
        $table->text('over_mij')->nullable();
        $table->string('profielfoto')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['gebruikersnaam', 'verjaardag', 'over_mij', 'profielfoto']);
    });
}

};
