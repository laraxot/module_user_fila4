<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * Run the migrations.
=======
>>>>>>> e4cd89fa (.)
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'team_user';

    /**
     * Esegue la migrazione.
<<<<<<< HEAD
=======
>>>>>>> a382d4f1 (.)
>>>>>>> e4cd89fa (.)
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
<<<<<<< HEAD
            // Rimuoviamo l'id auto-increment e usiamo chiave composita per tabella pivot
=======
<<<<<<< HEAD
            // $table->uuid('id')->primary();
            $table->id();
>>>>>>> e4cd89fa (.)
            $table->foreignId('team_id');
            $table->uuid('user_id')->nullable();
            $table->string('role')->nullable();

<<<<<<< HEAD
            // Chiave primaria composita per tabella pivot
            $table->primary(['team_id', 'user_id']);
=======
            // $table->unique(['team_id', 'user_id']);
=======
            // Rimuoviamo l'id auto-increment e usiamo chiave composita per tabella pivot
            $table->foreignId('team_id');
            $table->uuid('user_id')->nullable();
            $table->string('role')->nullable();

            // Chiave primaria composita per tabella pivot
            $table->primary(['team_id', 'user_id']);
>>>>>>> a382d4f1 (.)
>>>>>>> e4cd89fa (.)
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );

            // $this->updateUser($table);
        });
    }
};
