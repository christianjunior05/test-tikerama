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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Identifiant auto-incrémenté
            $table->string('order_number', 50); // Numéro de la commande
            $table->foreignId('order_event_id')->constrained('events')->onDelete('cascade'); // Clé étrangère vers events
            $table->mediumInteger('order_price'); // Prix de la commande
            $table->string('order_type', 50); // Type de la commande
            $table->string('order_payment', 100); // Mode de paiement
            $table->text('order_info')->nullable(); // Informations supplémentaires
            $table->timestamps(); // Crée les colonnes created_at et updated_at automatiquement
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};