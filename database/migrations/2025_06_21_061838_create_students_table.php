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
        if(!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table){
                $table->engine = "InnoDB";   
                $table->string('studentId', 15)->primary();
                $table->string('name', 75);
                $table->string('phone', 20);
                $table->text('address');
                $table->date('dateBirth');
                $table->string('addressBirth', 50);
                $table->tinyInteger('religion');
                $table->tinyInteger('sex');
                $table->string('guardian_name',  50);
                $table->year('entry_year');
                $table->tinyInteger('status')->default(1)->comment('1=Aktif, 2=Alumni, 3=Pindah, 4=Drop Out');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
