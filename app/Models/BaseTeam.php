<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Override;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> a12f125f4a (.)
=======
use Override;
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\HasExtraTrait;

/**
 * Modules\User\Models\Team.
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $personal_team
<<<<<<< HEAD
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
=======
<<<<<<< HEAD
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property UserContract|null $owner
 * @property EloquentCollection<int, TeamInvitation> $teamInvitations
 * @property int|null $team_invitations_count
 * @property EloquentCollection<int, Model&UserContract> $users
 * @property int|null $users_count
 *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
 * @method static TeamFactory factory($count = null, $state = [])
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team query()
 * @method static Builder|Team whereCreatedAt($value)
 * @method static Builder|Team whereId($value)
 * @method static Builder|Team whereName($value)
 * @method static Builder|Team wherePersonalTeam($value)
 * @method static Builder|Team whereUpdatedAt($value)
 * @method static Builder|Team whereUserId($value)
 *
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder|Team whereCreatedBy($value)
 * @method static Builder|Team whereDeletedAt($value)
 * @method static Builder|Team whereDeletedBy($value)
 * @method static Builder|Team whereUpdatedBy($value)
 *
 * @property Membership $membership
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $uuid
 *
 * @method static Builder|Team whereUuid($value)
<<<<<<< HEAD
=======
=======
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 *
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedBy($value)
 *
 * @property Membership $membership
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property string $uuid
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUuid($value)
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
 *
 * @mixin \Eloquent
 */
abstract class BaseTeam extends BaseModel implements TeamContract
{
    // Se ho bisogno di extra in customer aggiungo extra in customer
    // use HasExtraTrait;

    /** @var list<string> */
    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'personal_team',
    ];

    /** @var list<string> */
    protected $with = [
        // 'extra',
    ];

    /**
     * Get the owner of the team.
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function owner(): BelongsTo
    {
        $xotData = XotData::make();
        /** @var class-string<Model> */
        $user_class = $xotData->getUserClass();

        return $this->belongsTo($user_class, 'user_id');
    }

    /**
     * Get all of the team's users including its owner.
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function allUsers(): Collection
    {
        if (!($this->owner instanceof User)) {
<<<<<<< HEAD
=======
=======
    public function allUsers(): Collection
    {
        if (! $this->owner instanceof User) {
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function allUsers(): Collection
    {
        if (!($this->owner instanceof User)) {
>>>>>>> b93ef594b4 (.)
=======
    public function allUsers(): Collection
    {
        if (! $this->owner instanceof User) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            return $this->users;
        }

        return $this->users->merge([$this->owner]);
    }

    /**
     * Get all of the users that belong to the team.
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function users(): BelongsToMany
    {
        $xotData = XotData::make();
        /** @var class-string<Model> */
        $userClass = $xotData->getUserClass();

        return $this->belongsToManyX($userClass);
    }

    /**
     * Ottiene tutti i membri del team (alias di users).
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTeam>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTeam>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model, \Modules\User\Models\BaseTeam>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function members(): BelongsToMany
    {
        return $this->users();
    }

    /**
     * Determina se l'utente specificato appartiene al team.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @param UserContract $user L'utente da verificare
     * @return bool True se l'utente appartiene al team, false altrimenti
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * 
     * @param \Modules\Xot\Contracts\UserContract $user L'utente da verificare
     * @return bool True se l'utente appartiene al team, false altrimenti
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function hasUser(UserContract $user): bool
    {
        // Corretto l'errore di tipo per il metodo contains
        // Verifico se l'ID dell'utente è presente nella collection degli utenti del team
        if ($this->users->contains('id', $user->getKey())) {
            return true;
        }

        return $user->ownsTeam($this);
    }

    /**
     * Determina se l'indirizzo email specificato appartiene a un utente del team.
     *
     * @param string $email Indirizzo email da verificare
     * @return bool True se un utente con quell'email appartiene al team, false altrimenti
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function hasUserWithEmail(string $email): bool
    {
        return $this->allUsers()->contains(static fn($user): bool => $user->email === $email);
<<<<<<< HEAD
=======
=======
    public function hasUserWithEmail(string $email): bool
    {
        return $this->allUsers()->contains(static fn ($user): bool => $user->email === $email);
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function hasUserWithEmail(string $email): bool
    {
        return $this->allUsers()->contains(static fn($user): bool => $user->email === $email);
>>>>>>> b93ef594b4 (.)
=======
    public function hasUserWithEmail(string $email): bool
    {
        return $this->allUsers()->contains(static fn ($user): bool => $user->email === $email);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Determina se l'utente specificato ha il permesso indicato sul team.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @param UserContract $userContract L'utente da verificare
     * @param string $permission Il permesso da controllare
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
<<<<<<< HEAD
    #[Override]
=======
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @param \Modules\Xot\Contracts\UserContract $userContract L'utente da verificare
     * @param string $permission Il permesso da controllare
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function userHasPermission(UserContract $userContract, string $permission): bool
    {
        return $userContract->hasTeamPermission($this, $permission);
    }

    /**
     * Ottiene tutti gli inviti utente pendenti per il team.
     *
<<<<<<< HEAD
     * @return HasMany<TeamInvitation, \Modules\User\Models\BaseTeam>
     * @phpstan-return HasMany<TeamInvitation, $this>
     */
    #[Override]
=======
<<<<<<< HEAD
     * @return HasMany<TeamInvitation, \Modules\User\Models\BaseTeam>
     * @phpstan-return HasMany<TeamInvitation, $this>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> a12f125f4a (.)
=======
    #[Override]
>>>>>>> b93ef594b4 (.)
=======
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\TeamInvitation, \Modules\User\Models\BaseTeam>
     * @phpstan-return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\TeamInvitation, $this>
     */
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    public function teamInvitations(): HasMany
    {
        return $this->hasMany(TeamInvitation::class);
    }

    /**
     * Rimuove l'utente specificato dal team.
     *
<<<<<<< HEAD
     * @param UserContract $userContract L'utente da rimuovere dal team
     * @return void
     */
=======
<<<<<<< HEAD
     * @param UserContract $userContract L'utente da rimuovere dal team
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
    #[Override]
    public function removeUser(UserContract $userContract): void
    {
        if ($userContract->current_team_id === $this->id) {
            $userContract->forceFill([
                'current_team_id' => null,
            ])->save();
<<<<<<< HEAD
=======
=======
=======
     * @param \Modules\Xot\Contracts\UserContract $userContract L'utente da rimuovere dal team
     * @return void
     */
>>>>>>> origin/develop
    public function removeUser(UserContract $userContract): void
    {
        if ($userContract->current_team_id === $this->id) {
            $userContract->forceFill(
                [
                    'current_team_id' => null,
                ]
            )->save();
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function removeUser(UserContract $userContract): void
    {
        if ($userContract->current_team_id === $this->id) {
            $userContract->forceFill([
                'current_team_id' => null,
            ])->save();
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        }

        $this->users()->detach($userContract);
    }

    /**
     * Rimuove tutte le risorse del team.
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     *
     * @return void
     */
    #[Override]
    public function purge(): void
    {
        $this->owner()->where('current_team_id', $this->id)->update(['current_team_id' => null]);

        $this->users()->where('current_team_id', $this->id)->update(['current_team_id' => null]);
<<<<<<< HEAD
=======
=======
     * 
=======
     *
>>>>>>> b93ef594b4 (.)
     * @return void
     */
    #[Override]
    public function purge(): void
    {
        $this->owner()->where('current_team_id', $this->id)->update(['current_team_id' => null]);

<<<<<<< HEAD
        $this->users()->where('current_team_id', $this->id)
            ->update(['current_team_id' => null]);
>>>>>>> a12f125f4a (.)
=======
        $this->users()->where('current_team_id', $this->id)->update(['current_team_id' => null]);
>>>>>>> b93ef594b4 (.)
=======
     * 
     * @return void
     */
    public function purge(): void
    {
        $this->owner()->where('current_team_id', $this->id)
            ->update(['current_team_id' => null]);

        $this->users()->where('current_team_id', $this->id)
            ->update(['current_team_id' => null]);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $this->users()->detach();

        $this->delete();
    }
}
