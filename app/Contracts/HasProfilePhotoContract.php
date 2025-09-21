<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\User\Contracts\HasProfilePhotoContract.
 *
 * @phpstan-require-extends Model
 */
interface HasProfilePhotoContract
{
<<<<<<< HEAD
    public function getFilamentAvatarUrl(): null|string;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getFilamentAvatarUrl(): null|string;
=======
    public function getFilamentAvatarUrl(): ?string;
>>>>>>> a12f125f4a (.)
=======
    public function getFilamentAvatarUrl(): null|string;
>>>>>>> b93ef594b4 (.)
=======
    public function getFilamentAvatarUrl(): ?string;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Update the user's profile photo.
     */
<<<<<<< HEAD
    public function updateProfilePhoto(null|string $photo): void;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function updateProfilePhoto(null|string $photo): void;
=======
    public function updateProfilePhoto(?string $photo): void;
>>>>>>> a12f125f4a (.)
=======
    public function updateProfilePhoto(null|string $photo): void;
>>>>>>> b93ef594b4 (.)
=======
    public function updateProfilePhoto(?string $photo): void;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Delete the user's profile photo.
     */
    public function deleteProfilePhoto(): void;

    /**
     * Get the URL to the user's profile photo.
     */
    public function getProfilePhotoUrlAttribute(): string;

    /**
     * Determine if the image file exists.
     */
    public function photoExists(): bool;

    public function filamentDefaultAvatar(): string;

    /**
     * Get the disk that profile photos should be stored on.
     */
    public function profilePhotoDisk(): string;

    /**
     * Get the directory that profile photos should be stored on.
     */
    public function profilePhotoDirectory(): string;
}
