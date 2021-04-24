<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableSources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sources');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)
                ->unique();
            $table->string('url', 100)
                ->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
