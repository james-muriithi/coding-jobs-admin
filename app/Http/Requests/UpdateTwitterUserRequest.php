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
            'phone_number'      => [
                'string',
                'nullable',
            ],
            'subscribed'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
