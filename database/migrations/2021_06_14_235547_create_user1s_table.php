<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user1s', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id');
            $table->string('username', 255);
            $table->text('profile_path')->default("/photo-profile/default.jpg");
            $table->string('status', 255)->nullable();
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('account1s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user1s');
    }
}
