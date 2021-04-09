<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('value');
            $table->integer('amount');
            $table->integer('state');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete("cascade");
            $table->foreign('client_id')->references('id')->on('client')->onDelete("cascade");
            $table->foreign('book_id')->references('id')->on('book')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loands');
    }
}
