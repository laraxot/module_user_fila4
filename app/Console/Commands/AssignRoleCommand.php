<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

class AssignRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:assign-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a module to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
<<<<<<< HEAD
    
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
=======
>>>>>>> origin/develop
    public function __construct()
    {
        parent::__construct();
    }
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = text('email ?');
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
        $user = XotData::make()->getUserByEmail($email);
        /**
         * @var array<string, string>
         */
<<<<<<< HEAD
        $opts = Role::all()->pluck('name', 'name')->toArray();
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $opts = Role::all()->pluck('name', 'name')->toArray();
=======
        $opts = Role::all()
            ->pluck('name', 'name')
            ->toArray();
>>>>>>> a12f125f4a (.)
=======
        $opts = Role::all()->pluck('name', 'name')->toArray();
>>>>>>> b93ef594b4 (.)
=======
        $opts = Role::all()
            ->pluck('name', 'name')
            ->toArray();
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

        $rows = multiselect(
            label: 'What roles',
            options: $opts,
            required: true,
            scroll: 10,
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        // validate: function (array $values) {
        //  return ! \in_array(\count($values), [1, 2], false)
        //    ? 'A maximum of two'
        //  : null;
        // }
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
        );

        foreach ($rows as $row) {
            $role = Role::firstOrCreate(['name' => $row]);
            $user->assignRole($role);
        }

<<<<<<< HEAD
        $this->info(implode(', ', $rows) . ' assigned to ' . $email);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->info(implode(', ', $rows) . ' assigned to ' . $email);
=======
        $this->info(implode(', ', $rows).' assigned to '.$email);
>>>>>>> a12f125f4a (.)
=======
        $this->info(implode(', ', $rows) . ' assigned to ' . $email);
>>>>>>> b93ef594b4 (.)
=======
        $this->info(implode(', ', $rows).' assigned to '.$email);
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
