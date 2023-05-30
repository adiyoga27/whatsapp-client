<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Permission $permission, Whatsapp $whatsapp, User $user)
    {
        $data = [
            'permissions' => $permission->get(),
            'whatsapps' => $whatsapp->get(),
            'users' => $user->get(),

        ];

        return view('admin.permission.index', $data)->render();
    }

    public function create()
    {

        return view('admin.phonebook.create');
    }

    public function store(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'whatsapp_id' => ['required'],
            'user_id' => ['required']
        ]);

        $permission->create($data);

        return redirect()->route('permission.index')->with('success', 'Add data successfully');
    }

    public function edit($id)
    {
      
        return view('admin.phonebook.edit', compact([
            'permission' => Permission::where('id', $id)->first()
        ]));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'whatsapp_id' => ['required']
        ]);

        $permission->update($data);

        return redirect()->route('permission.index')->with('success', 'Update data successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permission.index')->with('success', 'Delete data successfully');
    }
}
