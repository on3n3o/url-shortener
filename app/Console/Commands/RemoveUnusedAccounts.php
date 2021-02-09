<?php

namespace App\Console\Commands;

use App\ShortLink;
use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;

class RemoveUnusedAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accounts:unused:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove accounts that been registered for longer than 3 years';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $usersToDeleteIds = User::where('last_logged_in', '<', Carbon::now()->subYears(3))->pluck('id');
        ShortLink::whereIn('user_id', $usersToDeleteIds)->update(['user_id' => null]);
        User::where('last_logged_in', '<', Carbon::now()->subYears(3))->delete();
    }
}
