<?php

namespace App\Http\Requests;

use App\Models\TwitterUserJob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreTwitterUserJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('twitter_user_job_access');
    }

    public function rules()
    {
        return [
            'job_id' => [
                'required',
                'integer',
                'exists:jobs,id',
            ],
            'user_id' => [
                'required',
            ]
        ];
    }
}
