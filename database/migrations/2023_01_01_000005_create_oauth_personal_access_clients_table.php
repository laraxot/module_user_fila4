<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthClient;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
<<<<<<< HEAD
<<<<<<< HEAD
return new class() extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/develop
=======
return new class extends XotBaseMigration {
>>>>>>> a382d4f1 (.)
>>>>>>> e4cd89fa (.)
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
    }
};
