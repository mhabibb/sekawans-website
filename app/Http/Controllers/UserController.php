<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('superAdmin');
        $users = User::select('id', 'name', 'email')->where('role', 0)->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('superAdmin');
        $request = $request->validated();
        User::create($request);
        return to_route('admin.users.index')->withSuccess("Admin Berhasil Dibuat!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user != auth()->user()) {
            return to_route('admin.users.show', auth()->id());
        }

        return view('admin.user.show', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $request = $request->validated();
        $user->update($request);
        return to_route('admin.users.show', $user)->withSuccess("Profil berhasil diperbarui!");
    }

    public function firstLogin(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'password'               => 'required|confirmed|string|not_in:password|min:8',
                'password_confirmation'  => 'required',
            ]);

            $user = User::find(auth()->id());
            if ($validator->fails()) {
                return response()->json(['status' => false]);
            } else {
                $user->password = bcrypt($request['password']);
                $user->saveQuietly();
            }
            return response()->json(['status' => $user->wasChanged()]);
        }
    }

    public function reset(User $user)
    {
        $this->authorize('superAdmin');
        $user->updateQuietly(['password'=>bcrypt('password')]);
        return $user->wasChanged();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('superAdmin');
        $user->delete();
        if (request()->ajax()) {
            return true;
        }
        return to_route('admin.users.index');
    }
}
