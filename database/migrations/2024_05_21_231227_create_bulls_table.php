<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bulls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bull-number');
            $table->date('bull_date')->nullable(); 
            $table->date('due_date')->nullable();
            $table->string('product');
            $table->decimal('discount');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->decimal('Amount_collection', 8, 2)->nullable();;
            $table->decimal('Amount_Commission', 8, 2);
            $table->decimal('Value_VAT',8,2)->default(0);
            $table->string('Rate_VAT', 999)->default(0);
            $table->decimal('total', 8, 2);
            $table->string('Status', 50)->default(0);
            $table->integer('Value_Status')->default(0);
            $table->string('note')->nullable();
            $table->date('Payment_Date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulls');
    }
};
