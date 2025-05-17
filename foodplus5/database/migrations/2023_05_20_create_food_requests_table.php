<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Recipient user ID
            $table->foreignId('food_id')->constrained('foods'); // Food item being requested
            $table->integer('quantity')->default(1);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'approved', 'in_transit', 'received', 'cancelled'])->default('pending');
            $table->timestamp('received_at')->nullable();
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
        Schema::dropIfExists('food_requests');
    }
}