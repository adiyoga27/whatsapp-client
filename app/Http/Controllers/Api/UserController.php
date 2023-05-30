<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userLevel = auth()->user()->level;
        $userName = auth()->user()->username;

        if ($userLevel == 'admin' || $userLevel == 'user') {
            $user = User::query()
                ->where('level', '!=', 'superadmin')
                ->get();
        } else if ($userLevel == 'superadmin') {
            $user = User::query()
                ->whereNot('username', $userName)
                ->get();
        }

        return UserResource::collection($user)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $request->validate(
            [
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'username' => 'required|string|max:20',
                'level' => 'string',
                'email' => 'required|string|email|max:255|unique:' . User::class,
                'password' => 'required|confirmed',
            ]
        );

        $payload['password'] = Hash::make($request->password);

        $data = User::query()->create($payload);
        if (strtolower($data->email === 'admin@gmail.com')) {
            if ($data) {
                User::find($data->id)->update([
                    'email_verified_at' => Carbon::now()
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $payload = $request->validate(
            [
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'username' => 'required|string|max:20',
                'level' => 'string',
                'email' => 'required|string|email|max:255',
            ]
        );

        User::query()->find($id)->update($payload);

        return (new UserResource(User::query()->find($id)))
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::query()->find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
}
