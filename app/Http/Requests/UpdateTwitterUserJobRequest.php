<?php

namespace App\Http\Requests;

use App\Models\TwitterUserJob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTwitterUserJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('twitter_user_job_edit');
    }

    public function rules()
    {
        return [
            'job_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
