@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.job.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.id') }}
                        </th>
                        <td>
                            {{ $job->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.job_title') }}
                        </th>
                        <td>
                            {{ $job->job_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.company') }}
                        </th>
                        <td>
                            {{ $job->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.location') }}
                        </th>
                        <td>
                            {{ $job->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.salary') }}
                        </th>
                        <td>
                            {{ $job->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.summary') }}
                        </th>
                        <td>
                            {{ $job->summary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.post_date') }}
                        </th>
                        <td>
                            {{ $job->post_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.link') }}
                        </th>
                        <td>
                            <a href="{{ $job->link ?? '#' }}" target="_blank" rel="noreferrer noopener" class="text-primary">{{ $job->link ?? '' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.full_text') }}
                        </th>
                        <td>
                            {{ $job->full_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.new') }}
                        </th>
                        <td>
                            {{ $job->new }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.twitter') }}
                        </th>
                        <td>
                            {{ $job->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.job.fields.created_at') }}
                        </th>
                        <td>
                            {{ $job->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#job_posted_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.postedJob.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="job_posted_jobs">
            @includeIf('admin.jobs.relationships.jobPostedJobs', ['postedJobs' => $job->jobPostedJobs])
        </div>
    </div>
</div>

@endsection
