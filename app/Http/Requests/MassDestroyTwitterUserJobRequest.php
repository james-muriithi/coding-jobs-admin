<?php

namespace App\Http\Requests;

use App\Models\TwitterUserJob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTwitterUserJobRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('twitter_user_job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:twitter_user_jobs,id',
        ];
    }
}
