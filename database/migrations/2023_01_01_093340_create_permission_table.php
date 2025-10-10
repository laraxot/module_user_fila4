<?php

declare(strict_types=1);

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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
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
=======
=======
>>>>>>> origin/develop
            throw new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
            throw new Exception(
                'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.',
            );
        }

        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new Exception(
                'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.',
            );
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
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
                app('cache')->store($cache_store !== 'default' ? $cache_store : null)->forget($cache_key);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                app('cache')->store($cache_store !== 'default' ? $cache_store : null)->forget($cache_key);
=======
                app('cache')
                    ->store($cache_store !== 'default' ? $cache_store : null)
                    ->forget($cache_key);
>>>>>>> a12f125f4a (.)
=======
                app('cache')->store($cache_store !== 'default' ? $cache_store : null)->forget($cache_key);
>>>>>>> b93ef594b4 (.)
=======
                app('cache')
                    ->store($cache_store !== 'default' ? $cache_store : null)
                    ->forget($cache_key);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            }
        } catch (Exception $e) {
            // Silently ignore cache errors during package discovery
            // echo $e->getMessage();
        }
    }

    /* -- is in xotbasemigration
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
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
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
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
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
};
