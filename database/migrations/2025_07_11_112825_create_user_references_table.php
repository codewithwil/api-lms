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
       if(!Schema::hasTable('user_references')) {
            Schema::create('user_references', function (Blueprint $table){
                $table->engine = "InnoDB";   
                $table->string('usReffId', 15)->primary();
                $table->uuid('userUUID');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('ref_type'); 
                $table->string('ref_id', 15);
                $table->timestamps();

                $table->unique('user_id');
                $table->index(['ref_type', 'ref_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('user_references');
    }
};
