# PHPStan Fixes Roadmap - User Module

This document outlines the plan to fix the PHPStan errors found in the User module.

## Files with Errors

*   **app/Filament/Pages/Auth/PasswordExpired.php**
    *   Error: `Property Modules\User\Filament\Pages\Auth\PasswordExpired::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Resources/ClientResource/Widgets/ClientHeader.php**
    *   Error: `Property Modules\User\Filament\Resources\ClientResource\Widgets\ClientHeader::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Resources/TeamUserResource.php**
    *   Error: `Method Modules\User\Filament\Resources\TeamUserResource::getPages() has invalid return type Modules\User\Filament\Resources\PageRegistration.`
    *   Error: `Method Modules\User\Filament\Resources\TeamUserResource::getPages() should return array<string, Modules\User\Filament\Resources\PageRegistration> but returns array<string, Filament\Resources\Pages\PageRegistration>.`
*   **app/Filament/Resources/TenantUserResource.php**
    *   Error: `Method Modules\User\Filament\Resources\TenantUserResource::getPages() has invalid return type Modules\User\Filament\Resources\PageRegistration.`
    *   Error: `Method Modules\User\Filament\Resources\TenantUserResource::getPages() should return array<string, Modules\User\Filament\Resources\PageRegistration> but returns array<string, Filament\Resources\Pages\PageRegistration>.`
*   **app/Filament/Resources/UserResource/Widgets/UserOverview.php**
    *   Error: `Property Modules\User\Filament\Resources\UserResource\Widgets\UserOverview::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Resources/UserResource/Widgets/UserWidget.php**
    *   Error: `Property Modules\User\Filament\Resources\UserResource\Widgets\UserWidget::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Widgets/Auth/ForgotPasswordWidget.php**
    *   Error: `Property Modules\User\Filament\Widgets\Auth\ForgotPasswordWidget::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Widgets/Auth/RegisterWidget.php**
    *   Error: `Property Modules\User\Filament\Widgets\Auth\RegisterWidget::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Widgets/Auth/ResetPasswordWidget.php**
    *   Error: `Property Modules\User\Filament\Widgets\Auth\ResetPasswordWidget::$view (view-string) does not accept default value of type string.`
*   **app/Filament/Widgets/PasswordExpiredWidget.php**
    *   Error: `Property Modules\User\Filament\Widgets\PasswordExpiredWidget::$view (view-string) does not accept default value of type string.`
*   **app/Http/Livewire/Auth/Login.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Http/Livewire/Auth/Logout.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Http/Livewire/Profile/DeleteAccount.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Http/Livewire/Profile/SuperAdmin.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Http/Livewire/Socialite/Buttons.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Http/Livewire/Team/Change.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Http/Livewire/TermsOfService.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/Livewire/Logout.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`
*   **app/View/Components/Mail/Message.php**
    *   Error: `Parameter #1 $view of function view expects view-string|null, string given.`