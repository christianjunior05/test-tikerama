<?php

use App\Enum\TicketStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_event_id')->constrained('events')->onDelete('cascade');
            $table->string('ticket_email');
            $table->string('ticket_phone', 20);
            $table->mediumInteger('ticket_price');
            $table->string('ticket_key', 100);

            $table->enum('ticket_status', TicketStatusEnum::getAll());
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
