<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('collection_id')->unsigned()->index();
            $table->string('title');
            $table->string('slug');
            $table->string('overTitle')->nullable();
            $table->string('subTitle')->nullable();
            $table->text('short');
            $table->text('body');
            $table->string('image')->nullable();
            $table->timestamp('publish_at')->useCurrent();
            $table->boolean('publish')->default(1);
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
        Schema::dropIfExists('products');
    }
}
