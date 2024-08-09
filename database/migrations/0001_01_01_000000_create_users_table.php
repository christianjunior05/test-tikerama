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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Utilisation du champ id comme clé primaire
            $table->string('email', 191)->unique(); // Ajouter une contrainte d'unicité sur email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->primary(); // Limitation de la longueur à 191
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 191)->primary(); // Limitation de la longueur à 191
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Vérifier si l'index unique existe avant de le supprimer
        Schema::table('users', function (Blueprint $table) {
            $schemaManager = DB::connection()->getDoctrineSchemaManager();
            $indexes = $schemaManager->listTableIndexes('users');

            if (isset($indexes['email_unique'])) {
                DB::statement('ALTER TABLE users DROP INDEX email_unique');
            }
        });

        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};