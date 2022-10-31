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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->default(1);
            $table->boolean('is_approved')->default(0);
            $table->string('description');
            $table->bigInteger('amount_without_interest')->nullable();
            $table->bigInteger('amount_with_interest')->nullable();
            $table->unsignedBigInteger('account_id');
            $table->date('due_date')->nullable();
            $table->foreignId('details_id')->constrained('account_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
