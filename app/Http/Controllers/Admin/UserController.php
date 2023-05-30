<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Whatsapp;
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
    public function index()
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
        // $user = User::all();
        $data = [
            'user' => $user,
            'whatsapp' => Whatsapp::query()->latest()->get()
        ];

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'username' => ['required', 'string', 'max:20'],
            'level' => ['string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $data['password'] = Hash::make($request->password);

        $user = User::query()->create($data);
        if (strtolower($user->email === 'admin@gmail.com')) {
            if ($user) {
                User::find($user->id)->update([
                    'email_verified_at' => Carbon::now()
                ]);
            }
        }

        return redirect()->route('user.index')->with('success', 'Add New Data Successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'user' => User::query()->find($id)
        ];

        return view('admin.user.edit', $data);
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
        $data = $request->validate([
            'full_name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:20'],
            'username' => ['sometimes', 'string', 'max:20'],
            'level' => ['string'],
            'email' => ['sometimes', 'string', 'email', 'max:255'],
            'password' => ['sometimes', 'confirmed'],
        ]);

        $data['password'] = Hash::make($request->password);

        User::query()->where('id', $id)->update($data);

        return redirect()->route('user.index')->with('success', 'Edit Data Successfully');
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

        return redirect()->route('user.index')->with('success', 'Delete Data Successfully');
    }
}
