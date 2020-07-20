<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('Title');
            $table->mediumText('Description');
            $table->char('ManagerID',15) -> references("managerID") -> on("managers") -> onDelete('cascade');
            $table->String('ImageUrl');
            $table->longText('Content');
            $table->dateTime('TimeUpLoad');
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
        Schema::dropIfExists('articles');
    }
}
