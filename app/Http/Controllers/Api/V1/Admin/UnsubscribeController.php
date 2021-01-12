<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TwitterUserResource;
use App\Models\TwitterUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnsubscribeController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $user_id
     */
    public function update(Request $request, $user_id)
    {
        $twitterUser = TwitterUser::find($user_id);
        if (!$twitterUser){
            $twitterUser = TwitterUser::where('user_id_str', '=',$user_id)->firstOrFail();
        }

        $twitterUser->update(['subscribed' => '0']);

        return (new TwitterUserResource($twitterUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
