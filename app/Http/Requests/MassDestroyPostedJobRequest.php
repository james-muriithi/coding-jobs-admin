<?php

namespace App\Http\Requests;

use App\Models\PostedJob;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPostedJobRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('posted_job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:posted_jobs,id',
        ];
    }
}
