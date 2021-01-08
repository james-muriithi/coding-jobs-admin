<?php

use App\Models\Job;
use App\Models\TwitterUser;
use App\Models\TwitterUserJob;
use Carbon\Carbon;

function getNewUserJobs($user_id, $limit = 10){
    $twitterUser = TwitterUser::find($user_id);
    if(!$twitterUser){
        $twitterUser = TwitterUser::where('user_id_str', '=',$user_id)->firstOrFail();
        $user_id = $twitterUser->id;
    }
    $twitterUserJobs = TwitterUserJob::where('user_id', $user_id)->pluck('job_id');

    return Job::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->whereNotIn('id', $twitterUserJobs)
        ->take($limit)
        ->get();
}
