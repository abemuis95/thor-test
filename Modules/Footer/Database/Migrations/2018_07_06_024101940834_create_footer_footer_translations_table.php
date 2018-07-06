<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterFooterTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer__footer_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->string('footer');
            $table->integer('footer_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['footer_id', 'locale']);
            $table->foreign('footer_id')->references('id')->on('footer__footers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footer__footer_translations', function (Blueprint $table) {
            $table->dropForeign(['footer_id']);
        });
        Schema::dropIfExists('footer__footer_translations');
    }
}
