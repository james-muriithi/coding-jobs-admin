@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.job.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jobs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="job_title">{{ trans('cruds.job.fields.job_title') }}</label>
                <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text" name="job_title" id="job_title" value="{{ old('job_title', '') }}" required>
                @if($errors->has('job_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.job_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company">{{ trans('cruds.job.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}" required>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location">{{ trans('cruds.job.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}" required>
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary">{{ trans('cruds.job.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="text" name="salary" id="salary" value="{{ old('salary', '') }}" required>
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="summary">{{ trans('cruds.job.fields.summary') }}</label>
                <textarea class="form-control {{ $errors->has('summary') ? 'is-invalid' : '' }}" name="summary" id="summary" required>{{ old('summary') }}</textarea>
                @if($errors->has('summary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('summary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.summary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="post_date">{{ trans('cruds.job.fields.post_date') }}</label>
                <input class="form-control {{ $errors->has('post_date') ? 'is-invalid' : '' }}" type="text" name="post_date" id="post_date" value="{{ old('post_date', '') }}" required>
                @if($errors->has('post_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('post_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.post_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="link">{{ trans('cruds.job.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_text">{{ trans('cruds.job.fields.full_text') }}</label>
                <textarea class="form-control {{ $errors->has('full_text') ? 'is-invalid' : '' }}" name="full_text" id="full_text" required>{{ old('full_text') }}</textarea>
                @if($errors->has('full_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.full_text_helper') }}</span>
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