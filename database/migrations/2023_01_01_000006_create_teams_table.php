<?php

/**
 * ---.
 */

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
     * <<<<<<< HEAD
     * Run the migrations.
     * =======
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'teams';

    /**
     * Esegue la migrazione.
     * >>>>>>> a382d4f1 (.).
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
            $table->id();
            $table->uuid('uuid')->nullable()->index();
            $table->string('user_id', 36)->nullable()->index();
            // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
            $table->string('name');
            $table->boolean('personal_team')->default(false);
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // MySqlConnection::getDoctrineSchemaManager does not exist.
            // MySqlConnection::getSchemaGrammar() ?
            // if ($this->hasIndexName('team_invitations_team_id_foreign')) {
            //    $table->dropForeign('team_invitations_team_id_foreign');
            // }
            if ($this->hasColumn('uuid')) {
                $table->uuid('uuid')->nullable()->change();
            }
            if ($this->hasColumn('personal_team')) {
                $table->boolean('personal_team')->default(false)->change();
            }

            if (! $this->hasColumn('code')) {
                $table->string('code', 36)->nullable()->index();
            }
            $this->updateTimestamps($table, true);

            // $this->updateUser($table);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->uuid('uuid')->nullable()->index();
                $table->string('user_id', 36)->nullable()->index();
                // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
                $table->string('name');
                $table->boolean('personal_team')->default(false);
            }
        );
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // MySqlConnection::getDoctrineSchemaManager does not exist.
            // MySqlConnection::getSchemaGrammar() ?
            // if ($this->hasIndexName('team_invitations_team_id_foreign')) {
            //    $table->dropForeign('team_invitations_team_id_foreign');
            // }
            if ($this->hasColumn('uuid')) {
                $table->uuid('uuid')->nullable()->change();
            }
<<<<<<< HEAD
        );
>>>>>>> a12f125f4a (.)
=======
            if ($this->hasColumn('personal_team')) {
                $table->boolean('personal_team')->default(false)->change();
            }

            if (!$this->hasColumn('code')) {
                $table->string('code', 36)->nullable()->index();
            }
            $this->updateTimestamps($table, true);

            // $this->updateUser($table);
        });
>>>>>>> b93ef594b4 (.)
=======
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // MySqlConnection::getDoctrineSchemaManager does not exist.
                // MySqlConnection::getSchemaGrammar() ?
                // if ($this->hasIndexName('team_invitations_team_id_foreign')) {
                //    $table->dropForeign('team_invitations_team_id_foreign');
                // }
                if ($this->hasColumn('uuid')) {
                    $table->uuid('uuid')->nullable()->change();
                }
                if ($this->hasColumn('personal_team')) {
                    $table->boolean('personal_team')->default(false)->change();
                }

                if (! $this->hasColumn('code')) {
                    $table->string('code', 36)->nullable()->index();
                }
                $this->updateTimestamps($table, true);
                // $this->updateUser($table);
            }
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
