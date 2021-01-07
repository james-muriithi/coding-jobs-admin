<?php

namespace App\Http\Requests;

use App\Models\TwitterUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTwitterUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('twitter_user_edit');
    }

    public function rules()
    {
        return [
            'name'              => [
                'string',
                'nullable',
            ],
            'screen_name'       => [
                'string',
                'nullable',
            ],
            'phone_number'      => [
                'string',
                'regex:/^(0|\+?254)(\d){9}$/',
                'nullable',
            ],
            'email'             => [
                'nullable',
                'email',
            ],
            'subscribed'        => [
                'nullable',
                'integer',
            ],
            'preference'        => [
                'string',
                'nullable',
            ],
            'profile_image_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
