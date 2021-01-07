@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.twitterUser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.twitter-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.id') }}
                        </th>
                        <td>
                            {{ $twitterUser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.name') }}
                        </th>
                        <td>
                            {{ $twitterUser->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.screen_name') }}
                        </th>
                        <td>
                            {{ $twitterUser->screen_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.user_id_str') }}
                        </th>
                        <td>
                            {{ $twitterUser->user_id_str }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.email') }}
                        </th>
                        <td>
                            {{ $twitterUser->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $twitterUser->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.subscribed') }}
                        </th>
                        <td>
                            {{ $twitterUser->subscribed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.preference') }}
                        </th>
                        <td>
                            {{ $twitterUser->preference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.twitterUser.fields.profile_image_url') }}
                        </th>
                        <td>
                            {{ $twitterUser->profile_image_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.twitter-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection