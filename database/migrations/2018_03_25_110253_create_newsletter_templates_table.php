<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsletterTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('newsletter_id')->unsigned()->index();
            $table->string('type');
            $table->integer('index')->default(0);
            $table->integer('item1');
            $table->integer('item2')->nullable();

            $table->foreign('newsletter_id')->references('id')->on('newsletters')->onDelete('cascade');

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
        Schema::dropIfExists('newsletter_templates');
    }
}
