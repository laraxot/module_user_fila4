<?php

declare(strict_types=1);

namespace Modules\User\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
return new class extends Migration {
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (! Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');

<<<<<<< HEAD
=======
return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (! Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
                // opzionale: $table->foreign('owner_id')->references('id')->on('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->dropColumn('owner_id');
            }
        });
    }
};
