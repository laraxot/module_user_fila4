<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Modules\Xot\Datas\XotData;
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
            // $table->bigIncrements('id');
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreignIdFor(XotData::make()->getUserClass(), 'user_id')->nullable()->index();
            $table->string('name');
            $table->string('secret', 100)->nullable();
            $table->string('provider')->nullable();
            $table->text('redirect');
            $table->boolean('personal_access_client');
            $table->boolean('password_client');
            $table->boolean('revoked');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            if ($this->getColumnType('id') !== 'string') {
                $table->uuid('id')->change(); // is  just primary
            }
            $this->updateTimestamps($table, false);
            $this->updateUser($table);
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
            // $table->bigIncrements('id');
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreignIdFor(XotData::make()->getUserClass(), 'user_id')->nullable()->index();
            $table->string('name');
            $table->string('secret', 100)->nullable();
            $table->string('provider')->nullable();
            $table->text('redirect');
            $table->boolean('personal_access_client');
            $table->boolean('password_client');
            $table->boolean('revoked');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            if ($this->getColumnType('id') !== 'string') {
                $table->uuid('id')->change(); // is  just primary
            }
<<<<<<< HEAD
        );
>>>>>>> a12f125f4a (.)
=======
            $this->updateTimestamps($table, false);
            $this->updateUser($table);
        });
>>>>>>> b93ef594b4 (.)
=======
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $table): void {
                // $table->bigIncrements('id');
                $table->uuid('id')->primary();
                // $table->unsignedBigInteger('user_id')->nullable()->index();
                $table->foreignIdFor(Modules\Xot\Datas\XotData::make()->getUserClass(), 'user_id')->nullable()->index();
                $table->string('name');
                $table->string('secret', 100)->nullable();
                $table->string('provider')->nullable();
                $table->text('redirect');
                $table->boolean('personal_access_client');
                $table->boolean('password_client');
                $table->boolean('revoked');
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if ($this->getColumnType('id') !== 'string') {
                    $table->uuid('id')->change();  // is  just primary
                }
                $this->updateTimestamps($table, false);
                $this->updateUser($table);
            }
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
