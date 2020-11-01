<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAssSocialEnter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('social_id',20)->default('');
            $table->index('social_id');
            $table->string('avatar',250)->default('');
            $table->enum('type_auth', ['site', 'vkontakte', 'git', 'yandex'])->default('site');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['social_id', 'avatar', 'type_auth']);
        });
    }
}
