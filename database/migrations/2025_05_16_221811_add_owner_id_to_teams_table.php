<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

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
            if (! Schema::hasColumn($this->table_name, 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');
=======
namespace Modules\User\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (! Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');

                // opzionale: $table->foreign('owner_id')->references('id')->on('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->dropColumn('owner_id');
>>>>>>> laraxot/develop
            }
        });
    }
};
