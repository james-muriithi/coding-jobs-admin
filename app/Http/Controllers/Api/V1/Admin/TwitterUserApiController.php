<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTwitterUserRequest;
use App\Http\Requests\UpdateTwitterUserRequest;
use App\Http\Resources\Admin\TwitterUserResource;
use App\Models\TwitterUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwitterUserApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('twitter_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TwitterUserResource(TwitterUser::all());
    }

    public function store(StoreTwitterUserRequest $request)
    {
        $twitterUser = TwitterUser::updateOrCreate(
            ['user_id_str' => $request->get('user_id_str')],
            $request->except('user_id_str'),
        );

        return (new TwitterUserResource($twitterUser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TwitterUser $twitterUser)
    {
        abort_if(Gate::denies('twitter_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TwitterUserResource($twitterUser);
    }

    public function update(UpdateTwitterUserRequest $request, $user_id)
    {
        $twitterUser = TwitterUser::find($user_id);
        if (!$twitterUser){
            $twitterUser = TwitterUser::where('user_id_str', '=',$user_id)->firstOrFail();
        }
        $twitterUser->update($request->all());

        return (new TwitterUserResource($twitterUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TwitterUser $twitterUser)
    {
        abort_if(Gate::denies('twitter_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
