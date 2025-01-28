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
        Schema::create('trade_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('min', 18,2)->nullable();
            $table->decimal('max', 18,2)->nullable();
            $table->decimal('profit', 18,2)->nullable();
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
        Schema::dropIfExists('trade_levels');
    }
};
