<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table->integer('user_id')->unsigned();//make the listing specfic to one user
            $table->integer('area_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->boolean('live')->default(false);
            $table->softDeletes();//if the user accidently deletes the listing
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//if you delete the use everything that belongs to the userID gets deleted.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
