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
     * Run the migrations.
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
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('uuid', 36)->nullable()->index();
            $table->string('email')->index();
            $table->string('token');
            // $table->timestamp('created_at')->nullable();
            $this->timestamps($table);
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
            if ($this->getColumnType('id') === 'uuid') {
                $table->dropColumn('id');
            }
            if (!$this->hasColumn('id')) {
                $table->id();
            }
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->string('uuid', 36)->nullable()->index();
                $table->string('email')->index();
                $table->string('token');
                // $table->timestamp('created_at')->nullable();
                $this->timestamps($table);
            }
        );
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
            if ($this->getColumnType('id') === 'uuid') {
                $table->dropColumn('id');
            }
<<<<<<< HEAD
        );
>>>>>>> a12f125f4a (.)
=======
            if (!$this->hasColumn('id')) {
                $table->id();
            }
        });
>>>>>>> b93ef594b4 (.)
=======

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                // $this->updateUser($table);
                if ($this->getColumnType('id') === 'uuid') {
                    $table->dropColumn('id');
                }
                if (! $this->hasColumn('id')) {
                    $table->id();
                }
            }
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
