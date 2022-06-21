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
        Schema::create('chart', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('period')->nullable();
            $table->date('from');
            $table->date('to');
            $table->foreignId('income_id')->nullable()->constrained('income')->onDelete('cascade');
            $table->foreignId('expense_id')->nullable()->constrained('income')->onDelete('cascade');
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
        Schema::dropIfExists('chart');
    }
};
