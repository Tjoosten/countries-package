<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopLevelDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_level_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tld');
            $table->timestamps();
        });

        Schema::create('country_top_level_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('top_level_domains_id')->unsigned()->index();
            $table->foreign('top_level_domains_id')->references('id')->on('top_level_domains')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('country_top_level_domains');
        Schema::dropIfExists('top_level_domains');
        Schema::enableForeignKeyConstraints();
    }
}