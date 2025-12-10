<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Device;
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
            $user_class = XotData::make()->getUserClass();
            $table->id('id');
            $table->foreignIdFor(Device::class, 'device_id')->index();
            $table->foreignIdFor($user_class, 'user_id')->index();
            $table->dateTime('login_at')->nullable();
            $table->dateTime('logout_at')->nullable();
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('push_notifications_token')) {
                $table->string('push_notifications_token')->nullable();
            }

            if (! $this->hasColumn('push_notifications_enabled')) {
                $table->boolean('push_notifications_enabled')->nullable();
            }
            // -- change
            if ($this->hasColumn('device_id')) {
                $table->string('device_id', 36)->nullable()->change();
            }
            // dddx($this->getColumnType('device_id'));//varchar
            if ('uuid' === $this->getColumnType('user_id')) {
                $table->string('user_id', 36)->nullable()->change();
            }

            $this->updateTimestamps($table);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            function (Blueprint $table): void {
                $user_class = XotData::make()->getUserClass();
                $table->id('id');
                $table->foreignIdFor(Device::class, 'device_id')->index();
                $table->foreignIdFor($user_class, 'user_id')->index();
                $table->dateTime('login_at')->nullable();
                $table->dateTime('logout_at')->nullable();
            }
        );
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            if (!$this->hasColumn('push_notifications_token')) {
                $table->string('push_notifications_token')->nullable();
            }
<<<<<<< HEAD
        );
>>>>>>> a12f125f4a (.)
=======

            if (!$this->hasColumn('push_notifications_enabled')) {
                $table->boolean('push_notifications_enabled')->nullable();
            }
            // -- change
            if ($this->hasColumn('device_id')) {
                $table->string('device_id', 36)->nullable()->change();
            }
            // dddx($this->getColumnType('device_id'));//varchar
            if ($this->getColumnType('user_id') === 'uuid') {
                $table->string('user_id', 36)->nullable()->change();
            }

            $this->updateTimestamps($table);
        });
>>>>>>> b93ef594b4 (.)
=======
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('push_notifications_token')) {
                    $table->string('push_notifications_token')->nullable();
                }

                if (! $this->hasColumn('push_notifications_enabled')) {
                    $table->boolean('push_notifications_enabled')->nullable();
                }
                // -- change
                if ($this->hasColumn('device_id')) {
                    $table->string('device_id', 36)->nullable()->change();
                }
                // dddx($this->getColumnType('device_id'));//varchar
                if ($this->getColumnType('user_id') == 'uuid') {
                    $table->string('user_id', 36)->nullable()->change();
                }

                $this->updateTimestamps($table);
            }
        );
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
