<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('plan_id');
            $table->integer('plan_days');
            $table->integer('package_id');
            $table->integer('package_category_id');
            $table->date('plan_start_date');
            $table->date('plan_end_date');
            $table->boolean('extra_meal')->default(0);
            $table->boolean('replace_breakfast')->default(0);
            $table->string('item_type');
            $table->string('meat_ingredients');
            $table->string('meal_type');
            $table->float('extra_meal_price');
            $table->float('meal_excluded_price');
            $table->float('item_price');
            $table->float('total_item_price');
            $table->integer('quantity');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('order_item');
    }
}
