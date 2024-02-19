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
        //
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('denomenation');
            $table->integer('ice');
            $table->string( 'address' );
            $table->string('tel');
            $table->string('email');
            $table->string('city');
            $table->string('state');
            $table->string('zipCode');
            $table->integer('tp');
            $table->integer('cnss');
            $table->integer('idf');
            $table->string('fullName');
            $table->integer('telRes');
            $table->string('emailRes');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
