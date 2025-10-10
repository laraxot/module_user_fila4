<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Extra;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateExtraTable.
 */
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
    protected null|string $model_class = Extra::class;
=======
return new class extends XotBaseMigration
{
    protected ?string $model_class = Extra::class;
>>>>>>> fbc8f8e (.)
=======
return new class extends XotBaseMigration {
    protected null|string $model_class = Extra::class;
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
            $table->increments('id');
            $table->uuidMorphs('model');
            $table->schemalessAttributes('extra_attributes');
        });

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
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->uuidMorphs('model');
                $table->schemalessAttributes('extra_attributes');



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

>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
    // end down
};
