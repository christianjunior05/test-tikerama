<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_type_event_id')->constrained('events')->cascadeOnDelete();
            $table->string('ticket_type_name', 50);
            $table->mediumInteger('ticket_type_price');
            $table->integer('ticket_type_quantity');
            $table->integer('ticket_type_real_quantity');
            $table->integer('ticket_type_total_quantity');
            $table->mediumText('ticket_type_description')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets__types');
    }
};
