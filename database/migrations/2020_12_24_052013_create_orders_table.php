<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('order_cancle_request')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'declined'])->default('pending');
            $table->decimal('grand_total',10,2);
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->enum('payment_method', ['cash_on_delivery', 'paypal', 'stripe', 'card'])->default('cash_on_delivery');

            $table->string('billing_fullname');
            $table->string('billing_address');
            $table->string('billing_address2')->nullable();
            $table->string('billing_city');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->text('notes')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
