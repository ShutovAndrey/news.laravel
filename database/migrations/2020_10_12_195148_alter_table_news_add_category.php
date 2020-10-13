<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableNewsAddCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->default('1');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['category_id']);
        $table->dropColumn(['category_id']);
    }
}
