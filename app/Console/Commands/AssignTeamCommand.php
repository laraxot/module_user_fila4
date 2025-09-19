<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Modules\Xot\Contracts\UserContract;
use Illuminate\Support\Collection;
use Illuminate\Console\Command;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

class AssignTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:assign-team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a team to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
    public function __construct()
    {
        parent::__construct();
    }
>>>>>>> fbc8f8e (.)
=======
    
>>>>>>> 6d20fbe (.)

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $xot = XotData::make();
        $email = text('email ?');
        $user_class = $xot->getUserClass();
        /** @var UserContract */
        $user = XotData::make()->getUserByEmail($email);

        $teamClass = $xot->getTeamClass();

        /** @var array<int|string, string>|Collection<int|string, string> */
<<<<<<< HEAD
<<<<<<< HEAD
        $opts = $teamClass::pluck('name', 'id')->toArray();
=======
        $opts = $teamClass::pluck('name', 'id')
            ->toArray();
>>>>>>> fbc8f8e (.)
=======
        $opts = $teamClass::pluck('name', 'id')->toArray();
>>>>>>> 6d20fbe (.)

        $rows = multiselect(
            label: 'What teams',
            options: $opts,
            required: true,
            scroll: 10,
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
        // validate: function (array $values) {
        //  return ! \in_array(\count($values), [1, 2], false)
        //    ? 'A maximum of two'
        //  : null;
        // }
<<<<<<< HEAD
=======
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], false)
            //    ? 'A maximum of two'
            //  : null;
            // }
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
        );

        $user->teams()->sync($rows);
        /*
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
         * foreach ($rows as $row) {
         * $role = Role::firstOrCreate(['name' => $row]);
         * $user->assignRole($role);
         * }
         */
        $this->info('Teams :' . implode(', ', $rows) . ' assigned to ' . $email);
<<<<<<< HEAD
=======
        foreach ($rows as $row) {
            $role = Role::firstOrCreate(['name' => $row]);
            $user->assignRole($role);
        }
        */
        $this->info('Teams :'.implode(', ', $rows).' assigned to '.$email);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

        $rows = $user->teams()->get()->toArray();

        if (\count($rows) > 0) {
            Assert::isArray($rows[0]);
            $headers = array_keys($rows[0]);

            $this->newLine();
            $this->table($headers, $rows);
            $this->newLine();
        } else {
            $this->newLine();
<<<<<<< HEAD
<<<<<<< HEAD
            $this->warn('⚡ No teams [' . $teamClass . ']');
=======
            $this->warn('⚡ No teams ['.$teamClass.']');
>>>>>>> fbc8f8e (.)
=======
            $this->warn('⚡ No teams [' . $teamClass . ']');
>>>>>>> 6d20fbe (.)
            $this->newLine();
        }
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
