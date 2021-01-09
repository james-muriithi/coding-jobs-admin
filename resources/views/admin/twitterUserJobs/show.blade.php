@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.twitterUserJob.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.twitter-user-jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.id') }}
                        </th>
                        <td>
                            {{ $twitterUserJob->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.user') }}
                        </th>
                        <td>
                            {{ $twitterUserJob->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.job') }}
                        </th>
                        <td>
                            {{ $twitterUserJob->job->job_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.created_at') }}
                        </th>
                        <td>
                            {{ $twitterUserJob->created_at ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUserJob.fields.preference') }}
                        </th>
                        <td>
                            {{ strtoupper($twitterUserJob->user->preference) ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.twitter-user-jobs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
