<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
use Illuminate\Database\Migrations\Migration;
>>>>>>> 6849bc76 (.)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class extends XotBaseMigration {
    /**
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'teams';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('owner_id')) {
=======
return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (! Schema::connection('user')->hasColumn('teams', 'owner_id')) {
>>>>>>> 6849bc76 (.)
                $table->uuid('owner_id')->nullable()->after('id');
            }
        });
    }
};
