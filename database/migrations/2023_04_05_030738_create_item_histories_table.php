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
        Schema::create('item_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('item_stock_id');
            $table->integer('transaction_type_id');
            $table->integer('qty')->nullable();
            $table->integer('qty_change')->nullable();
            $table->integer('qty_current')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('item_histories');
    }
};
