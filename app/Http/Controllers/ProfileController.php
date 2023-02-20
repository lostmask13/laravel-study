<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = auth()->user()->profiles()->paginate(4);
        return view('user.profile.index', compact('profiles'));
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $profile = self::findOrFail();
        return response()->json($profile);
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.create');
    }

    /**
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'in:' . auth()->user()->id,
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        $profile = Profile::create($request->all());
        return redirect()
            ->route('user.profile.show', ['profile' => $profile->id])
            ->with('success', 'New profile was created');
    }

    /**
     *
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        if ($profile->user_id !== auth()->user()->id) {
            abort(404); // это чужой профиль
        }
        return view('user.profile.show', compact('profile'));
    }

    /**
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        if ($profile->user_id !== auth()->user()->id) {
            abort(404); // это чужой профиль
        }
        return view('user.profile.edit', compact('profile'));
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $this->validate($request, [
            'user_id' => 'in:' . auth()->user()->id,
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        $profile->update($request->all());
        return redirect()
            ->route('user.profile.show', ['profile' => $profile->id])
            ->with('success', 'Profile was edited');
    }

    /**
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        if ($profile->user_id !== auth()->user()->id) {
            abort(404);
        }
        $profile->delete();
        return redirect()
            ->route('user.profile.index')
            ->with('success', 'Profile was deleted');
    }
}
