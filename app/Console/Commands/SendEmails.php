<?php

namespace App\Console\Commands;

use App\Mail\EmailDemo;
use App\Models\TwitterUser;
use App\Models\TwitterUserJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends emails to subscribed users';

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
     * @return int
     */
    public function handle()
    {
        if (!empty($this->argument('user'))){
            $emailSubscribedUser = TwitterUser::find($this->argument('user'));
            if (!$emailSubscribedUser){
                $emailSubscribedUser = TwitterUser::where('user_id_str', '=',$this->argument('user'))->firstOrFail();
            }

            $newJobs = getNewUserJobs($emailSubscribedUser['user_id_str']);
            if (count($newJobs) > 0){
                Mail::to($emailSubscribedUser['email'])->send(new EmailDemo($newJobs));
                foreach ($newJobs as $newJob) {
                    TwitterUserJob::create([
                        'user_id' =>  $emailSubscribedUser['id'],
                        'job_id' => $newJob['id'],
                    ]);
                }
            }else{
                echo 'No new jobs for user '.$emailSubscribedUser['name'].PHP_EOL;
            }
        }else{
            $emailSubscribedUsers = TwitterUser::where('subscribed', '=', 1)
                ->where('preference', '=', 'email')
                ->whereNotNull('email')
                ->get();
            foreach ($emailSubscribedUsers as $emailSubscribedUser) {
                $newJobs = getNewUserJobs($emailSubscribedUser['user_id_str']);
                if (count($newJobs) > 0){
                    foreach ($newJobs as $newJob) {
                        TwitterUserJob::create([
                            'user_id' =>  $emailSubscribedUser['id'],
                            'job_id' => $newJob['id'],
                        ]);
                    }
                    Mail::to($emailSubscribedUser['email'])->send(new EmailDemo($newJobs));
                }else{
                    echo 'No new jobs for user '.$emailSubscribedUser['name'].PHP_EOL;
                }
            }
        }
    }
}
