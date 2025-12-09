<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthClient;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('client_id');
            // $table->uuid('client_id');
            $table->foreignIdFor(OauthClient::class, 'client_id');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('uuid')) {
            //    $table->uuid('uuid')->nullable();
            // }

            $this->updateUser($table);
            $this->updateTimestamps($table, false);
        });
<<<<<<< HEAD
=======
=======
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> b93ef594b4 (.)
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('client_id');
            // $table->uuid('client_id');
            $table->foreignIdFor(OauthClient::class, 'client_id');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('uuid')) {
            //    $table->uuid('uuid')->nullable();
            // }

<<<<<<< HEAD
=======
return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->uuid('id')->primary();
                // $table->unsignedBigInteger('client_id');
                // $table->uuid('client_id');
                $table->foreignIdFor(OauthClient::class, 'client_id');
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('uuid')) {
                //    $table->uuid('uuid')->nullable();
                // }

>>>>>>> origin/develop
                $this->updateUser($table);
                $this->updateTimestamps($table, false);
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            $this->updateUser($table);
            $this->updateTimestamps($table, false);
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
