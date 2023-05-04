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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->string('type_transaction');
            $table->float('qty_out');
            $table->float('total');
            $table->float('tax');
            $table->float('money_changes');
            $table->float('payment');
            $table->float('discount_user');
            $table->float('service_charge');
            $table->integer('sub_total');
            $table->integer('user_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('transaction_histories');
    }
};
