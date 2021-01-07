<?php

namespace App\Http\Requests;

use App\Models\PostedJob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePostedJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('posted_job_edit');
    }

    public function rules()
    {
        return [];
    }
}
