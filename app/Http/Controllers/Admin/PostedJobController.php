<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostedJobRequest;
use App\Models\Job;
use App\Models\PostedJob;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostedJobController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('posted_job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postedJobs = PostedJob::with(['job'])->get();

        return view('admin.postedJobs.index', compact('postedJobs'));
    }

    public function create()
    {
        abort_if(Gate::denies('posted_job_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::all()->pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.postedJobs.create', compact('jobs'));
    }

    public function store(StorePostedJobRequest $request)
    {
        $postedJob = PostedJob::create($request->all());

        return redirect()->route('admin.posted-jobs.index');
    }

    public function show(PostedJob $postedJob)
    {
        abort_if(Gate::denies('posted_job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postedJob->load('job');

        return view('admin.postedJobs.show', compact('postedJob'));
    }
}
