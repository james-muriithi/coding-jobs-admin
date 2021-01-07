<?php

namespace App\Http\Requests;

use App\Models\TwitterUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTwitterUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('twitter_user_create');
    }

    public function rules()
    {
        return [
            'name'              => [
                'string',
                'required',
            ],
            'screen_name'       => [
                'string',
                'required',
            ],
            'user_id_str'       => [
                'string',
                'required',
            ],
            'email'             => [
                'optional',
                'email'
            ],
            'phone_number'      => [
                'string',
                'nullable',
                'regex:/^(0|\+?254)(\d){9}$/',
            ],
            'subscribed'        => [
                'nullable',
                'integer'
            ],
            'preference'        => [
                'string',
                'nullable',
            ],
            'profile_image_url' => [
                'string',
                'required',
            ],
        ];
    }
}
