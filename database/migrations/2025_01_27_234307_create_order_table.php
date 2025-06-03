<?php
// filepath: /c:/Users/PC/vs code/laravel api 1/resturan-QR-scaner/database/migrations/2025_01_27_234307_create_order_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('tabel_id'); 
                $table->unsignedBigInteger('dish_id'); 
                $table->string('status');
                $table->string('note')->nullable();
                $table->string('payment');
                $table->string('payment_status');
                $table->foreign('tabel_id')->references('id')->on('tabels')->onDelete('cascade'); 
                $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade'); 
                $table->timestamps();
            });
        }
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