<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;

class RegisterTenant extends BaseRegisterTenant
{
    use TransTrait;

    public string $resource;

    public static function getLabel(): string
    {
        $tenantClass = XotData::make()->getTenantClass();
        $func = Str::of(__FUNCTION__)->snake()->toString();
        if (Str::startsWith($func, 'get_')) {
            $func = Str::of($func)->after('get_')->toString();
        }
        $key = Str::of(class_basename(__CLASS__))
            ->snake()
            ->prepend('actions.')
            ->append('.'.$func)
            ->toString();
        $str = static::transClass($tenantClass, $key);

        return $str;
    }

    public function form(Schema $schema): Schema
    {
        $tenantClass = XotData::make()->getTenantClass();
        $resource = Str::of($tenantClass)
            ->replace('\Models\\', '\Filament\Resources\\')
            ->append('Resource')
            ->toString();
        $this->resource = $resource;

        /** @var array<\Illuminate\Contracts\Support\Htmlable|string> $components */
        $components = $this->getFormSchema();

        return $schema->components($components);
    }

    /**
     * @return array<\Illuminate\Contracts\Support\Htmlable|string>
     */
    public function getFormSchema(): array
    {
        $formSchema = $this->resource::getFormSchema();
        /** @var array<\Illuminate\Contracts\Support\Htmlable|string> $result */
        $result = is_array($formSchema) ? $formSchema : [];

        return $result;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    protected function handleRegistration(array $data): Model
    {
        $tenantClass = XotData::make()->getTenantClass();

        $tenant = $tenantClass::create($data);
        Assert::implementsInterface($tenant, TenantContract::class);

        $users = $tenant->users();
        Assert::isInstanceOf($users, \Illuminate\Database\Eloquent\Relations\BelongsToMany::class);
        $users->attach(auth()->user());

        return $tenant;
    }
}
