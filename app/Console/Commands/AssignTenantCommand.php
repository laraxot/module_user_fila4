<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Modules\Xot\Contracts\UserContract;
use Illuminate\Support\Collection;
use Illuminate\Console\Command;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

class AssignTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:assign-tenant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a tenant to user';

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
        $email = text('email ?');
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
        $user = XotData::make()->getUserByEmail($email);
        $xot = XotData::make();
        $tenantClass = $xot->getTenantClass();

        /** @var array<int|string, string>|Collection<int|string, string> */
<<<<<<< HEAD
<<<<<<< HEAD
        $opts = $tenantClass::all()->pluck('name', 'id')->toArray();
=======
        $opts = $tenantClass::all()
            ->pluck('name', 'id')
            ->toArray();
>>>>>>> fbc8f8e (.)
=======
        $opts = $tenantClass::all()->pluck('name', 'id')->toArray();
>>>>>>> 6d20fbe (.)

        $rows = multiselect(
            label: 'What tenant',
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

        $user->tenants()->sync($rows);
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
        $this->info(implode(', ', $rows) . ' assigned to ' . $email);
<<<<<<< HEAD
=======
        foreach ($rows as $row) {
            $role = Role::firstOrCreate(['name' => $row]);
            $user->assignRole($role);
        }
        */
        $this->info(implode(', ', $rows).' assigned to '.$email);
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
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
