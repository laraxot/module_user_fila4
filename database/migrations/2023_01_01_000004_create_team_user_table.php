<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
<<<<<<< HEAD
     * Run the migrations.
=======
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'team_user';

    /**
     * Esegue la migrazione.
>>>>>>> a382d4f1 (.)
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
<<<<<<< HEAD
            // $table->uuid('id')->primary();
            $table->id();
            $table->foreignId('team_id');
            $table->uuid('user_id')->nullable()->index();
            // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
            $table->string('role')->nullable();

            // $table->unique(['team_id', 'user_id']);
=======
            // Rimuoviamo l'id auto-increment e usiamo chiave composita per tabella pivot
            $table->foreignId('team_id');
            $table->uuid('user_id')->nullable();
            $table->string('role')->nullable();

            // Chiave primaria composita per tabella pivot
            $table->primary(['team_id', 'user_id']);
>>>>>>> a382d4f1 (.)
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
