<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPhoneBook;
use App\Models\PhoneBook;
use App\Models\User;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneBookController extends Controller
{
    public function index(PhoneBook $phonebook)
    {
        $data = [
            'phonebook' => $phonebook->with('whatsapp')->latest()->get()
        ];

        return view('admin.phonebook.index', $data)->render();
    }

    public function create()
    {
        $user = User::query()->find(Auth::user()->id);
        if ($user->whatsapp_access_id != null) {
            $whatsapp = Whatsapp::query()->where('is_active', 1)->whereIn('id', json_decode($user->whatsapp_access_id))->get();
        } else {
            $whatsapp = Whatsapp::query()->where('is_active', 1)->get();
        }
        $data = [
            'whatsapp' => $whatsapp
        ];
        return view('admin.phonebook.create', $data);
    }

    public function store(Request $request, PhoneBook $phonebook)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'whatsapp_id' => ['required', 'numeric']
        ]);

        $phonebook->create($data);

        return redirect()->route('phonebook.index')->with('success', 'Add data successfully');
    }

    public function edit($id)
    {
        $user = User::query()->find(Auth::user()->id);
        if ($user->whatsapp_access_id != null) {
            $whatsapp = Whatsapp::query()->whereIn('id', json_decode($user->whatsapp_access_id))->get();
        } else {
            $whatsapp = Whatsapp::query()->where('is_active', 1)->get();
        }
        $data = [
            'phonebook' => PhoneBook::query()->find($id),
            'whatsapp' => $whatsapp
        ];
        return view('admin.phonebook.edit', $data);
    }

    public function update(Request $request, PhoneBook $phonebook)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'whatsapp_id' => ['required', 'numeric']
        ]);

        $phonebook->update($data);

        return redirect()->route('phonebook.index')->with('success', 'Update data successfully');
    }

    public function destroy(PhoneBook $phonebook)
    {
        $phonebook->delete();

        return redirect()->route('phonebook.index')->with('success', 'Delete data successfully');
    }
}
