<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
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
            // $table->uuid('id')->primary();
            $table->id();
            $table->foreignId('tenant_id');
            $table->uuid('user_id')->nullable()->index();

            // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
            // $table->string('role')->nullable();
            // $table->unique(['team_id', 'user_id']);
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
        });
<<<<<<< HEAD
=======
        $this->tableCreate(
            static function (Blueprint $table): void {
                // $table->uuid('id')->primary();
                $table->id();
                $table->foreignId('tenant_id');
                $table->uuid('user_id')->nullable()->index();
                // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
                // $table->string('role')->nullable();
                // $table->unique(['team_id', 'user_id']);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    }
};
