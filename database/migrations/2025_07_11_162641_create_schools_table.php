<?php

use Illuminate\{
    Database\Migrations\Migration,
    Database\Schema\Blueprint,
    Support\Facades\Schema
};

return new class extends Migration
{
    public function up(): void
    {
        if(!Schema::hasTable('schools')) {
            Schema::create('schools', function (Blueprint $table){
                $table->engine = "InnoDB";   
                $table->string('schoolId', 15)->primary();
                $table->integer('npsn')->unique();
                $table->text('address');
                $table->string('phone', 20)->nullable(true);
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
