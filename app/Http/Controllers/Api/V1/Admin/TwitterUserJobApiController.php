<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTwitterUserJobRequest;
use App\Http\Resources\Admin\JobResource;
use App\Http\Resources\Admin\TwitterUserJobResource;
use App\Models\TwitterUser;
use App\Models\TwitterUserJob;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TwitterUserJobApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('twitter_user_job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TwitterUserJobResource(TwitterUserJob::with(['user', 'job'])->get());
    }

    public function show(TwitterUserJob $twitterUserJob)
    {
        abort_if(Gate::denies('twitter_user_job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TwitterUserJobResource($twitterUserJob->load(['user', 'job']));
    }

    public function store(StoreTwitterUserJobRequest $request)
    {
        $twitterUser = TwitterUser::find($request->get('user_id'));
        if (!$twitterUser){
            $twitterUser = TwitterUser::where('user_id_str', '=',$request->get('user_id'))->firstOrFail();
        }
        $userId = $twitterUser->id;

        $twitterUserJob = TwitterUserJob::create(['user_id'=>$userId, 'job_id' => $request->get('job_id')]);

        $twitterUserJob->load(['user','job']);

        return (new TwitterUserJobResource($twitterUserJob))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function destroy(TwitterUserJob $twitterUserJob)
    {
        abort_if(Gate::denies('twitter_user_job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUserJob->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function new($user_id)
    {
        $newUserJobs = getNewUserJobs($user_id);

        return new JobResource($newUserJobs);
    }
}
