<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Extra;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateExtraTable.
 */
<<<<<<< HEAD
return new class extends XotBaseMigration {
    protected null|string $model_class = Extra::class;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
    protected null|string $model_class = Extra::class;
=======
return new class extends XotBaseMigration
{
    protected ?string $model_class = Extra::class;
>>>>>>> a12f125f4a (.)
=======
return new class extends XotBaseMigration {
    protected null|string $model_class = Extra::class;
>>>>>>> b93ef594b4 (.)
=======
return new class extends XotBaseMigration
{
    protected ?string $model_class = Extra::class;
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
            $table->increments('id');
            $table->uuidMorphs('model');
            $table->schemalessAttributes('extra_attributes');
        });
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('name')) {
            //    $table->string('name')->nullable();
            // }
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );

            if ($this->hasColumn('model_id') && $this->getColumnType('model_id') === 'bigint') {
                $table->string('model_id', 36)->index()->change();
            }
        });
    }

    // end up
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->uuidMorphs('model');
                $table->schemalessAttributes('extra_attributes');
<<<<<<< HEAD



            }
        );
=======
>>>>>>> b93ef594b4 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('name')) {
            //    $table->string('name')->nullable();
            // }
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );

            if ($this->hasColumn('model_id') && $this->getColumnType('model_id') === 'bigint') {
                $table->string('model_id', 36)->index()->change();
            }
        });
    }

    // end up
<<<<<<< HEAD

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
                
                
                
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('name')) {
                //    $table->string('name')->nullable();
                // }
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);

                if ($this->hasColumn('model_id') && $this->getColumnType('model_id') === 'bigint') {
                    $table->string('model_id', 36)->index()->change();
                }
            }
        );
    }

    // end up

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    // end down
};
