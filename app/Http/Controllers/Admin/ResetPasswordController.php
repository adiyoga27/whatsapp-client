<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('admin.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = Auth::user();

        if (Hash::check($request->old_password, $user->password)) {
            $data['password'] = Hash::make($request->password);

            User::query()->find($user->id)->update([
                'password' => $data['password']
            ]);

            return redirect()->back()->with('success', 'Reset password successfully');
        } else {
            return redirect()->back()->with('error', "The old password didn't match our records");
        }
    }
}
