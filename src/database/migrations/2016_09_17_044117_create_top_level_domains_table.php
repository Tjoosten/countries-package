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

        // SQLSTATE[42S02]: Base table or view not found: 1146
        // Table 'root.country_top_level_domains' doesn't exist
        // (SQL: insert into `country_top_level_domains` (`country_id`, `top_level_domains_id`) values (251, 1))

        // $table->foreign('author_id')->references('id')->on('authors');
        // $table->foreign('book_id')->references('id')->on('books');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_level_domains');
    }
}