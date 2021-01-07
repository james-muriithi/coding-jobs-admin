<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTwitterUserJobRequest;
use App\Models\TwitterUserJob;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwitterUserJobController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('twitter_user_job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUserJobs = TwitterUserJob::with(['user', 'job'])->get();

        return view('admin.twitterUserJobs.index', compact('twitterUserJobs'));
    }

    public function show(TwitterUserJob $twitterUserJob)
    {
        abort_if(Gate::denies('twitter_user_job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUserJob->load('user', 'job');

        return view('admin.twitterUserJobs.show', compact('twitterUserJob'));
    }

    public function destroy(TwitterUserJob $twitterUserJob)
    {
        abort_if(Gate::denies('twitter_user_job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUserJob->delete();

        return back();
    }

    public function massDestroy(MassDestroyTwitterUserJobRequest $request)
    {
        TwitterUserJob::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
