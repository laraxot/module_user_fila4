<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateRolesTable.
 */
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> fbc8f8e (.)
=======
return new class extends XotBaseMigration {
>>>>>>> 6d20fbe (.)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->foreignId('team_id')->nullable()->index();
            $table->string('name');
            $table->string('guard_name')->default('web');
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            if (!$this->hasColumn('id')) {
                $table->id();
            }
            if (!$this->hasColumn('team_id')) {
                $table->foreignId('team_id')->nullable()->index();
            }
            $this->updateTimestamps($table);
        });
<<<<<<< HEAD
=======
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->foreignId('team_id')->nullable()->index();
                $table->string('name');
                $table->string('guard_name')->default('web');
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('id')) {
                    $table->id();
                }
                if (! $this->hasColumn('team_id')) {
                    $table->foreignId('team_id')->nullable()->index();
                }
                $this->updateTimestamps($table);
            }
        );
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }
};
