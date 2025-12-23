<?php

declare(strict_types=1);

namespace Modules\User\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
return new class extends Migration {
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (!Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');

<<<<<<< HEAD
=======
=======
return new class extends Migration
{
=======
return new class extends Migration {
>>>>>>> b93ef594b4 (.)
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (!Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======

>>>>>>> b93ef594b4 (.)
=======
return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('user')->table('teams', function (Blueprint $table): void {
            if (! Schema::connection('user')->hasColumn('teams', 'owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
