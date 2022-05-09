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
        Schema::create('topics', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('article_id');
            $table->boolean('food')->default(false);
            $table->boolean('sports')->default(false);
            $table->boolean('yoga')->default(false);
            $table->boolean('therapy')->default(false);
            $table->boolean('workout')->default(false);
            $table->boolean('nature')->default(false);
            $table->boolean('diet')->default(false);
            $table->boolean('lifestyle')->default(false);
            $table->boolean('psychology')->default(false);

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
        Schema::dropIfExists('topics');
    }
};