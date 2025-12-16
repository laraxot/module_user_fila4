<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreatePermissionsTable.
 */
return new class extends XotBaseMigration {
    /**
     * <<<<<<< HEAD
     * =======
     * <<<<<<< HEAD
     * Run the migrations.
     * =======
     * >>>>>>> e4cd89fa (.)
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'permissions';

    /**
     * Esegue la migrazione.
     * <<<<<<< HEAD
     * =======
     * >>>>>>> a382d4f1 (.).
     * >>>>>>> e4cd89fa (.).
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            // permission id
            $table->string('name');
            // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name');
            // For MySQL 8.0 use string('guard_name', 125);
            $table->unique(['name', 'guard_name']);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
