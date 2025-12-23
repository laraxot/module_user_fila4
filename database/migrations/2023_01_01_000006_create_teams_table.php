<?php

/**
 * ---.
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
<<<<<<< HEAD
use Modules\User\Models\Team;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected string $table = 'teams';
    protected ?string $connection = 'user';
    protected ?string $model_class = Team::class;

    /**
<<<<<<< HEAD
=======
=======
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
>>>>>>> laraxot/develop
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'teams';

    /**
<<<<<<< HEAD
>>>>>>> 220cf97b (.)
=======
>>>>>>> laraxot/develop
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid')->nullable()->index();
            $table->string('user_id', 36)->nullable()->index();
            // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
            $table->string('name');
            $table->boolean('personal_team')->default(false);
        });
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
<<<<<<< HEAD

            if (! $this->hasColumn('owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');
            }

            $this->updateTimestamps($table, true);
=======
            $this->updateTimestamps($table, true);

            // $this->updateUser($table);
>>>>>>> laraxot/develop
        });
    }
};
