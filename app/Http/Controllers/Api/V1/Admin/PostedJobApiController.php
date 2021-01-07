<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostedJobRequest;
use App\Http\Resources\Admin\PostedJobResource;
use App\Models\PostedJob;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostedJobApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('posted_job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostedJobResource(PostedJob::with(['job'])->get());
    }

    public function store(StorePostedJobRequest $request)
    {
        $postedJob = PostedJob::create($request->all());

        return (new PostedJobResource($postedJob))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PostedJob $postedJob)
    {
        abort_if(Gate::denies('posted_job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostedJobResource($postedJob->load(['job']));
    }
}
