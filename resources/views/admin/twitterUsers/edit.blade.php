@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.twitterUser.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.twitter-users.update", [$twitterUser->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.twitterUser.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $twitterUser->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="screen_name">{{ trans('cruds.twitterUser.fields.screen_name') }}</label>
                <input class="form-control {{ $errors->has('screen_name') ? 'is-invalid' : '' }}" type="text" name="screen_name" id="screen_name" value="{{ old('screen_name', $twitterUser->screen_name) }}" required>
                @if($errors->has('screen_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('screen_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.screen_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id_str">{{ trans('cruds.twitterUser.fields.user_id_str') }}</label>
                <input class="form-control {{ $errors->has('user_id_str') ? 'is-invalid' : '' }}" type="text" name="user_id_str" id="user_id_str" value="{{ old('user_id_str', $twitterUser->user_id_str) }}" required>
                @if($errors->has('user_id_str'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_id_str') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.user_id_str_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.twitterUser.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $twitterUser->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.twitterUser.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $twitterUser->phone_number) }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subscribed">{{ trans('cruds.twitterUser.fields.subscribed') }}</label>
                <input class="form-control {{ $errors->has('subscribed') ? 'is-invalid' : '' }}" type="number" name="subscribed" id="subscribed" value="{{ old('subscribed', $twitterUser->subscribed) }}" step="1">
                @if($errors->has('subscribed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subscribed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.subscribed_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="preference">{{ trans('cruds.twitterUser.fields.preference') }}</label>
                <input class="form-control {{ $errors->has('preference') ? 'is-invalid' : '' }}" type="text" name="preference" id="preference" value="{{ old('preference', $twitterUser->preference) }}">
                @if($errors->has('preference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('preference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.preference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile_image_url">{{ trans('cruds.twitterUser.fields.profile_image_url') }}</label>
                <input class="form-control {{ $errors->has('profile_image_url') ? 'is-invalid' : '' }}" type="text" name="profile_image_url" id="profile_image_url" value="{{ old('profile_image_url', $twitterUser->profile_image_url) }}">
                @if($errors->has('profile_image_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile_image_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.twitterUser.fields.profile_image_url_helper') }}</span>
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