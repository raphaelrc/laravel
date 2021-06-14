<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $users = $user->newQuery();

        if ($request->query('email')) {
            $users->where('email', '=', $request->email);
        }

        if ($request->query('name')) {
            $users->where('name', '=', $request->name);
        }

        return $users->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'name' => ['required']
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name
        ]);

        return response($user->fresh(), 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response('', 404);
        }

        $user->email = is_null($request->email) ? $user->email : $request->email;
        $user->name = is_null($request->name) ? $user->name : $request->name;
        $user->save();

        return $user;
    }

    /**
     * List the users's social media.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSocialMedia($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response('User not found', 404);
        }

        return $user->socialMedia;
    }

    /**
     * Add a new social media for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSocialMedia(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response('User not found', 404);
        }

        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $socialMedia = SocialMedia::find($request->id);

        if (!$socialMedia) {
            return response('Social media not found', 404);
        }

        if ($user->socialMedia->contains($socialMedia->id)) {
            return response('Social media already assigned to user', 409);
        }
        
        $user->socialMedia()->save($socialMedia);

        return $user->refresh();
    }
}
