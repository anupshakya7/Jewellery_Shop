<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_code');
            $table->string('item_name');
            $table->string('item_gram');
            $table->string('item_making_charge');
            $table->string('item_wastages');
            $table->string('item_stone');
            $table->mediumText('item_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('golds');
    }
};
