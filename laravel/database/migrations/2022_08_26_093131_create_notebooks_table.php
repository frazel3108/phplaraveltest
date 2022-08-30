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
        Schema::create('notebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('full_name')->nullable(false);
            $table->text('company')->nullable(true);
            $table->text('tel')->nullable(false);
            $table->text('email')->nullable(false);
            $table->date('date_birth')->nullable(true);
            $table->text('photo')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notebooks');
    }
};
