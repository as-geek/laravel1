<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('news');
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->text('content');
            $table->unsignedBigInteger('rubrics_id');
            $table->dateTime('publish_date')->useCurrent();
            $table->timestamps();

            $table->foreign('rubrics_id')
                ->references('id')
                ->on('rubrics')
                ->onDelete('cascade');

            $table->index('rubrics_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
