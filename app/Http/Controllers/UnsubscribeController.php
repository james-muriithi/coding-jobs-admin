<?php

namespace App\Http\Controllers;

use App\Http\Resources\Admin\TwitterUserResource;
use App\Models\TwitterUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnsubscribeController extends Controller
{
    public function index($user_id)
    {
        $twitterUser = TwitterUser::find($user_id);
        if (!$twitterUser){
            $twitterUser = TwitterUser::where('user_id_str', '=',$user_id)->firstOrFail();
        }
        $userId = $twitterUser->id;
        return view('unsubscribe', compact('userId'));
    }

    public function update(Request $request)
    {
        $twitterUser = TwitterUser::find($request->get('user'));
        $twitterUser->update(['subscribed' => '0']);

        return (new TwitterUserResource($twitterUser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
