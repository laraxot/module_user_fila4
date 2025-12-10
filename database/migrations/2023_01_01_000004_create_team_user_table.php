<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> a12f125f4a (.)
=======
return new class extends XotBaseMigration {
>>>>>>> b93ef594b4 (.)
=======
return new class extends XotBaseMigration
{
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );

            // $this->updateUser($table);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table): void {
                // $table->uuid('id')->primary();
                $table->id();
                $table->foreignId('team_id');
                $table->uuid('user_id')->nullable()->index();
                // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
                $table->string('role')->nullable();
                // $table->unique(['team_id', 'user_id']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
                // $this->updateUser($table);
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );

            // $this->updateUser($table);
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
