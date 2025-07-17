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
        if(!Schema::hasTable('teachers')) {
            Schema::create('teachers', function (Blueprint $table){
                $table->engine = "InnoDB";   
                $table->string('teacherId', 15)->primary();
                $table->string('name', 75);
                $table->string('nip', 20)->unique();
                $table->tinyInteger('type');
                $table->string('phone', 20);
                $table->text('address');
                $table->date('dateBirth');
                $table->string('addressBirth', 50);
                $table->tinyInteger('religion');
                $table->tinyInteger('sex');
                $table->date('dateEmp');
                $table->tinyInteger('teacherStatus');
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
