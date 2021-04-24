<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExportRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)
                ->nullable(true);
            $table->string('phone', 100)
                ->nullable(true);
            $table->string('email', 100);
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('export_requests');
    }
}
