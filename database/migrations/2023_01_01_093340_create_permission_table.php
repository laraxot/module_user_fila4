<?php

declare(strict_types=1);

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
        /**
         * @var array $tableNames
         */
        $tableNames = config('permission.table_names');
        /**
         * @var array $columnNames
         */
        $columnNames = config('permission.column_names');
        /**
         * @var array $teams
         */
        $teams = config('permission.teams');

        if (empty($tableNames)) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
            throw new Exception(
                'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.',
            );
        }

        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new Exception(
                'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.',
            );
<<<<<<< HEAD
=======
            throw new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        }

        /**
         * @var string|null $cache_store
         */
        $cache_store = config('permission.cache.store');

        /**
         * @var string $cache_key
         */
        $cache_key = config('permission.cache.key');

        try {
            // Verifica se l'applicazione è completamente inizializzata
            if (app()->bound('cache')) {
<<<<<<< HEAD
<<<<<<< HEAD
                app('cache')->store($cache_store !== 'default' ? $cache_store : null)->forget($cache_key);
=======
                app('cache')
                    ->store($cache_store !== 'default' ? $cache_store : null)
                    ->forget($cache_key);
>>>>>>> fbc8f8e (.)
=======
                app('cache')->store($cache_store !== 'default' ? $cache_store : null)->forget($cache_key);
>>>>>>> 6d20fbe (.)
            }
        } catch (Exception $e) {
            // Silently ignore cache errors during package discovery
            // echo $e->getMessage();
        }
    }

    /* -- is in xotbasemigration
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
     * public function down(): void
     * {
     * $tableNames = config('permission.table_names');
     *
     * if (empty($tableNames)) {
     * throw new Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
     * }
     *
     * Schema::drop($tableNames['role_has_permissions']);
     * Schema::drop($tableNames['model_has_roles']);
     * Schema::drop($tableNames['model_has_permissions']);
     * Schema::drop($tableNames['roles']);
     * Schema::drop($tableNames['permissions']);
     * }
     */
<<<<<<< HEAD
=======
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
    */
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
};
