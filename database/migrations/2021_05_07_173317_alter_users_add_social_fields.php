<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersAddSocialFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('social_id', 50)->default('');
            $table->enum('type_auth', ['site', 'vk', 'fb'])->default('site');
            $table->string('avatar', 255)->default('');
            $table->index('social_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('social_id');
            $table->dropColumn('social_id');
            $table->dropColumn('type_auth');
            $table->dropColumn('avatar');
            $table->dropColumn('social_id');
        });
    }
}
