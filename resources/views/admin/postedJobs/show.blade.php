@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.postedJob.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posted-jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.postedJob.fields.id') }}
                        </th>
                        <td>
                            {{ $postedJob->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postedJob.fields.job') }}
                        </th>
                        <td>
                            {{ $postedJob->job->job_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postedJob.fields.platform') }}
                        </th>
                        <td>
                            {{ $postedJob->platform }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postedJob.fields.link') }}
                        </th>
                        <td>
                            {{ $postedJob->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.postedJob.fields.post_date') }}
                        </th>
                        <td>
                            {{ $postedJob->post_date ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posted-jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
