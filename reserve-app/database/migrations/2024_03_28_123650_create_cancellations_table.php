<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {

        Schema::create('cancellations', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('reservation_number');
            $table->text('reason');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('cancellations');
    }
};
