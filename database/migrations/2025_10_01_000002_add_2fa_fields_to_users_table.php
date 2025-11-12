<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = \Modules\User\Models\User::class;

    public function up(): void
    {
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('two_factor_secret')) {
                    $table->text('two_factor_secret')->nullable();
                }
                if (! $this->hasColumn('two_factor_recovery_codes')) {
                    $table->text('two_factor_recovery_codes')->nullable();
                }
                if (! $this->hasColumn('two_factor_confirmed_at')) {
                    $table->timestamp('two_factor_confirmed_at')->nullable();
                }
                if (! $this->hasColumn('two_factor_enabled')) {
                    $table->boolean('two_factor_enabled')->default(false);
                }
                if (! $this->hasColumn('sso_provider_id')) {
                    $table->foreignId('sso_provider_id')->nullable()
                        ->constrained('sso_providers')->nullOnDelete();
                }
                if (! $this->hasColumn('sso_identifier')) {
                    $table->string('sso_identifier')->nullable()->unique();
                }
                if (! $this->hasColumn('sso_last_login')) {
                    $table->timestamp('sso_last_login')->nullable();
                }
            },
            'users'
        );
    }
};
