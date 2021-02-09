<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortLinkIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_link_ips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ip_id');
            $table->foreign('ip_id')->references('id')->on('ips');
            $table->unsignedBigInteger('short_link_id');
            $table->foreign('short_link_id')->references('id')->on('short_links');
            $table->bigInteger('visits')->default(0);
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
        Schema::dropIfExists('short_link_ips');
    }
}
