<?php

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
            $table->id('id');
            $table->string('uuid', 36)->nullable()->index();
            $table->string('mobile_id')->nullable()->index();
            $table->string('languages')->nullable(); // ['en-us', 'en'] ;
            $table->string('device')->nullable(); // "Macintosh"
            $table->string('platform')->nullable(); // "OS X"
            $table->string('browser')->nullable(); // "Safari"
            $table->string('version')->nullable(); // $agent->version($browser)
            $table->boolean('is_robot')->nullable(); // bool
            $table->string('robot')->nullable(); // the robot name
            $table->boolean('is_desktop')->nullable();
            $table->boolean('is_mobile')->nullable();
            $table->boolean('is_tablet')->nullable();
            $table->boolean('is_phone')->nullable();
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
            $this->updateTimestamps($table);
        });
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id('id');
                $table->string('uuid', 36)->nullable()->index();
                $table->string('mobile_id')->nullable()->index();
                $table->string('languages')->nullable();                // ['en-us', 'en'] ;
                $table->string('device')->nullable();                // "Macintosh"
                $table->string('platform')->nullable();                // "OS X"
                $table->string('browser')->nullable();                // "Safari"
                $table->string('version')->nullable();                // $agent->version($browser)
                $table->boolean('is_robot')->nullable();                // bool
                $table->string('robot')->nullable();                // the robot name
                $table->boolean('is_desktop')->nullable();
                $table->boolean('is_mobile')->nullable();
                $table->boolean('is_tablet')->nullable();
                $table->boolean('is_phone')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                $this->updateTimestamps($table);
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
            $this->updateTimestamps($table);
        });
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }
};
