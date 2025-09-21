<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
use Override;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
<<<<<<< HEAD
=======
=======
use Modules\User\Models\Team;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
>>>>>>> a12f125f4a (.)
=======
use Override;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
>>>>>>> b93ef594b4 (.)
=======
use Modules\User\Models\Team;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Modules\Xot\Contracts\UserContract;

/**
 * Interfaccia che combina le funzionalità di HasTeamsContract e UserContract
 */
interface HasTeamsAndUserContract extends HasTeamsContract, UserContract
{
    /**
     * Ottiene il ruolo dell'utente nel team
     */
<<<<<<< HEAD
    #[Override]
    public function teamRole(TeamContract $team): null|Role;
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function teamRole(TeamContract $team): null|Role;
=======
    public function teamRole(TeamContract $team): ?Role;
>>>>>>> a12f125f4a (.)
=======
    #[Override]
    public function teamRole(TeamContract $team): null|Role;
>>>>>>> b93ef594b4 (.)
=======
    public function teamRole(TeamContract $team): ?Role;
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Verifica se l'utente può rimuovere un membro dal team
     */
    public function canRemoveTeamMember(Team $team, HasTeamsContract $user): bool;

    /**
     * Verifica se l'utente può aggiornare un membro del team
     */
    public function canUpdateTeamMember(Team $team, HasTeamsContract $user): bool;
}
