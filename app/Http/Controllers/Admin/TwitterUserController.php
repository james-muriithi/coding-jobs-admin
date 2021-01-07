<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTwitterUserRequest;
use App\Http\Requests\StoreTwitterUserRequest;
use App\Http\Requests\UpdateTwitterUserRequest;
use App\Models\TwitterUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwitterUserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('twitter_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUsers = TwitterUser::all();

        return view('admin.twitterUsers.index', compact('twitterUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('twitter_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.twitterUsers.create');
    }

    public function store(StoreTwitterUserRequest $request)
    {
        $twitterUser = TwitterUser::create($request->all());

        return redirect()->route('admin.twitter-users.index');
    }

    public function edit(TwitterUser $twitterUser)
    {
        abort_if(Gate::denies('twitter_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.twitterUsers.edit', compact('twitterUser'));
    }

    public function update(UpdateTwitterUserRequest $request, TwitterUser $twitterUser)
    {
        $twitterUser->update($request->all());

        return redirect()->route('admin.twitter-users.index');
    }

    public function show(TwitterUser $twitterUser)
    {
        abort_if(Gate::denies('twitter_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.twitterUsers.show', compact('twitterUser'));
    }

    public function destroy(TwitterUser $twitterUser)
    {
        abort_if(Gate::denies('twitter_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $twitterUser->delete();

        return back();
    }

    public function massDestroy(MassDestroyTwitterUserRequest $request)
    {
        TwitterUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
