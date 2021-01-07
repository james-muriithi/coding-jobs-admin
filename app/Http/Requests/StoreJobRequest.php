<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_create');
    }

    public function rules()
    {
        return [
            'job_title' => [
                'string',
                'required',
            ],
            'company'   => [
                'string',
                'required',
            ],
            'location'  => [
                'string',
                'required',
            ],
            'salary'    => [
                'string',
                'required',
            ],
            'summary'   => [
                'required',
            ],
            'post_date' => [
                'string',
                'required',
            ],
            'link'      => [
                'string',
                'required',
                'unique:jobs',
            ],
            'full_text' => [
                'required',
            ],
            'new'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'twitter'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
