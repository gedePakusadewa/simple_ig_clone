<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id');
            $table->integer('postingan_id');
            $table->text('comment');
            $table->integer('parent_chat_id')->nullable();

            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('postingan_id')->references('id')->on('postingans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_replies');
    }
}
