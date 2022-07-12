<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
   
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->enum('status', ['Active', 'Resolved']);
            $table->string('message');
            $table->string('comment')->nullable();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}