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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_amount');
            $table->date('due_date');
            $table->boolean('is_approved')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('share_id')->constrained('shares');
            $table->foreignId('loans_type_id')->constrained('loan_types');
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
        Schema::dropIfExists('loans');
    }
};
