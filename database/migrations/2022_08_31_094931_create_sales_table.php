<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('payme_sale_id');
            $table->string('payme_sale_code');
            $table->string('transaction_id');
            $table->string('sale_payment_method');
            $table->string('status_code');
            $table->enum('state',['Todo','Done']);
            $table->text('description');
            $table->bigInteger('price');
            $table->string('currency');
            $table->string('sale_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
