<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
use Override;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
<<<<<<< HEAD
=======
use Modules\User\Models\Team;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
<<<<<<< HEAD
    #[Override]
    public function teamRole(TeamContract $team): null|Role;
=======
    public function teamRole(TeamContract $team): ?Role;
>>>>>>> fbc8f8e (.)
=======
    #[Override]
    public function teamRole(TeamContract $team): null|Role;
>>>>>>> 6d20fbe (.)

    /**
     * Verifica se l'utente può rimuovere un membro dal team
     */
    public function canRemoveTeamMember(Team $team, HasTeamsContract $user): bool;

    /**
     * Verifica se l'utente può aggiornare un membro del team
     */
    public function canUpdateTeamMember(Team $team, HasTeamsContract $user): bool;
}
