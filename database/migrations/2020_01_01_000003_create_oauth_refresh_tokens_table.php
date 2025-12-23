<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Database\Migrations\XotBaseMigration;

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
            $table->string('id', 100)->primary();
            // $table->string('access_token_id', 100)->index();
            $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            $this->updateUser($table);
        });
<<<<<<< HEAD
=======
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
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }
};
