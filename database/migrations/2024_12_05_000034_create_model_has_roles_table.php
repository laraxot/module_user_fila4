<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\User\Models\Role;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
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
        $this->tableCreate(static function (Blueprint $table): void {
            $team_class = XotData::make()->getTeamClass();
            $table->id();
            // $table->foreignIdFor(Role::class, 'role_id')->nullable();
            $table->integer('role_id')->index()->nullable();
            $table->uuidMorphs('model');
            $table->foreignIdFor($team_class, 'team_id')->nullable();
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $team_class = XotData::make()->getTeamClass();
            if (!$this->hasColumn('team_id')) {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table): void {
                $team_class = XotData::make()->getTeamClass();
                $table->id();
                // $table->foreignIdFor(Role::class, 'role_id')->nullable();
                $table->integer('role_id')->index()->nullable();
                $table->uuidMorphs('model');
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
<<<<<<< HEAD
        );
>>>>>>> a12f125f4a (.)
=======
            if ($this->getColumnType('role_id') === 'uuid') {
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
>>>>>>> b93ef594b4 (.)
=======
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $team_class = XotData::make()->getTeamClass();
                if (! $this->hasColumn('team_id')) {
                    $table->foreignIdFor($team_class, 'team_id')->nullable();
                }
                if ($this->getColumnType('model_id') === 'uuid') {
                    $table->string('model_id', 36)->index()->change();
                }
                if ($this->getColumnType('role_id') === 'uuid') {
                    $table->integer('role_id')->index()->change();
                }
                // $this->updateUser($table);
                $this->updateTimestamps($table);
            }
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
