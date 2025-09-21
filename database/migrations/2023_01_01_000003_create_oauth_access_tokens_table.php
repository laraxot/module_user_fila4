<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthClient;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

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
    public function up(): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $this->tableCreate(static function (Blueprint $table) use ($userClass): void {
            $table->string('id', 100)->primary();
            $table->foreignIdFor($userClass, 'user_id')->nullable()->index();
            $table->foreignIdFor(OauthClient::class, 'client_id');
            $table->string('name')->nullable();
            $table->text('scopes')->nullable();
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateUser($table);
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table) use ($userClass): void {
                $table->string('id', 100)->primary();
                $table->foreignIdFor($userClass, 'user_id')->nullable()->index();
                $table->foreignIdFor(OauthClient::class, 'client_id');
                $table->string('name')->nullable();
                $table->text('scopes')->nullable();
                $table->boolean('revoked');
                $table->dateTime('expires_at')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateUser($table);
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateUser($table);
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
