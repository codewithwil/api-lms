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
       if(!Schema::hasTable('owners')) {
            Schema::create('owners', function (Blueprint $table){
                $table->engine = "InnoDB";   
                $table->string('ownerId', 15)->primary();
                $table->string('name', 75);
                $table->string('phone', 20);
                $table->text('address');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
