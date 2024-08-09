<?php

use App\Enum\EventCategoryEnum;
use App\Enum\EventStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->enum('event_category', EventCategoryEnum::getAll());
            $table->string('event_title');
            $table->mediumtext('event_description');
            $table->dateTime('event_date');
            $table->string('event_image')->nullable();
            $table->string('event_city');
            $table->string('event_address');
            $table->enum('event_status', EventStatusEnum::getAll());
            $table->timestamp('event_created_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};