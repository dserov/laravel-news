<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNewsAddFields1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table){
            $table->string('title', 255)->change();
            $table->string('enclosure', 255);
            $table->string('guid', 255)->nullable();
            $table->unique('guid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table){
            $table->string('title', 50)->change();
            $table->dropColumn('enclosure');
            $table->dropColumn('guid');
        });
    }
}
