<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthAccessToken;
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
        $this->tableCreate(static function (Blueprint $table): void {
            $table->string('id', 100)->primary();
            // $table->string('access_token_id', 100)->index();
            $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
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
            $this->updateUser($table);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->string('id', 100)->primary();
                // $table->string('access_token_id', 100)->index();
                $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
                $table->boolean('revoked');
                $table->dateTime('expires_at')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                $this->updateUser($table);
            }
        );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            $this->updateUser($table);
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
