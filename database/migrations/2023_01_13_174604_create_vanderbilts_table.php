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
        Schema::create('vanderbilts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->timestamp('created_date')->nullable();
            // $table->timestamp('last_push')->nullable();
            $table->text('description');
            $table->string('name');
            $table->string('url');
            $table->integer('number_stars');
            $table->integer('ghproject_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanderbilts');
    }
};
