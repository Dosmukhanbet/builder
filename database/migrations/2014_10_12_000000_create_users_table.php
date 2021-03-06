<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('city_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable()->default();
            $table->enum('type', ['client', 'master', 'admin']);
            $table->string('phone_number')->unique();
            $table->boolean('confirmed')->default(false);
            $table->string('token')->nullable();
            $table->string('email')->unique();
            $table->string('photo_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
