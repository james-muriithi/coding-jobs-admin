<?php

namespace App\Http\Requests;

use App\Models\PostedJob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostedJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('posted_job_create');
    }

    public function rules()
    {
        return [
            'job_id'   => [
                'required',
                'integer',
            ],
            'platform' => [
                'string',
                'required',
            ],
            'link'     => [
                'string',
                'required',
            ],
        ];
    }
}
