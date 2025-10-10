<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

use function Laravel\Prompts\text;

class CreateTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:team-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a team';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $modelClass = XotData::make()->getTeamClass();

        $name = text(
            label: 'What is name of team?',
            placeholder: 'E.g. Moderator, ',
<<<<<<< HEAD
<<<<<<< HEAD
        // default: $user->name,
        // hint: 'This will be displayed on your profile.'
=======
            // default: $user->name,
            // hint: 'This will be displayed on your profile.'
>>>>>>> fbc8f8e (.)
=======
        // default: $user->name,
        // hint: 'This will be displayed on your profile.'
>>>>>>> 6d20fbe (.)
        );

        $modelClass::create([
            'name' => $name,
        ]);

<<<<<<< HEAD
<<<<<<< HEAD
        $map = static fn(Model $row) => $row->toArray();
=======
        $map = static function (Model $row) {
            return $row->toArray();
        };
>>>>>>> fbc8f8e (.)
=======
        $map = static fn(Model $row) => $row->toArray();
>>>>>>> 6d20fbe (.)

        $rows = $modelClass::get()->map($map);

        if (\count($rows) > 0) {
            $first = $rows[0];
            Assert::isArray($first);
            $headers = array_keys($first);

            $this->newLine();
            $this->table($headers, $rows);
            $this->newLine();
        } else {
            $this->newLine();
<<<<<<< HEAD
<<<<<<< HEAD
            $this->warn('⚡ No Teams [' . $modelClass . ']');
=======
            $this->warn('⚡ No Teams ['.$modelClass.']');
>>>>>>> fbc8f8e (.)
=======
            $this->warn('⚡ No Teams [' . $modelClass . ']');
>>>>>>> 6d20fbe (.)
            $this->newLine();
        }
    }
}
