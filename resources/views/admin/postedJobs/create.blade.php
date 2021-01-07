@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.postedJob.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.posted-jobs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="job_id">{{ trans('cruds.postedJob.fields.job') }}</label>
                <select class="form-control select2 {{ $errors->has('job') ? 'is-invalid' : '' }}" name="job_id" id="job_id" required>
                    @foreach($jobs as $id => $job)
                        <option value="{{ $id }}" {{ old('job_id') == $id ? 'selected' : '' }}>{{ $job }}</option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.postedJob.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="platform">{{ trans('cruds.postedJob.fields.platform') }}</label>
                <input class="form-control {{ $errors->has('platform') ? 'is-invalid' : '' }}" type="text" name="platform" id="platform" value="{{ old('platform', '') }}" required>
                @if($errors->has('platform'))
                    <div class="invalid-feedback">
                        {{ $errors->first('platform') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.postedJob.fields.platform_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="link">{{ trans('cruds.postedJob.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.postedJob.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection