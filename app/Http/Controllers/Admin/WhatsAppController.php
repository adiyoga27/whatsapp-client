<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function index(Whatsapp $whatsapp)
    {
        $data = [
            'whatsapp' => $whatsapp->latest()->get(),
            'notif' => Profile::first()->notif
        ];
        return view('admin.whatsapp.index', $data);
    }

    public function create()
    {
        return view('admin.whatsapp.create');
    }

    public function store(Request $request, Whatsapp $whatsapp)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'numeric']
        ]);

        $whatsapp->create($data);

        return redirect()->route('whatsapp.index')->with('success', 'Add data successfully');
    }

    public function edit($id)
    {
        $data = [
            'whatsapp' => Whatsapp::query()->find($id)
        ];

        return view('admin.whatsapp.edit', $data);
    }

    public function update(Request $request, Whatsapp $whatsapp)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'numeric']
        ]);

        $whatsapp->update($data);

        return redirect()->route('whatsapp.index')->with('success', 'Update data successfully');
    }

    public function destroy(Whatsapp $whatsapp)
    {
        $whatsapp->delete();

        return redirect()->route('whatsapp.index')->with('success', 'Delete data successfully');
    }

    public function setup(Request $request, $id)
    {
        $whatsapp = Whatsapp::where('id', $id)->first();
        return view('admin.whatsapp.qrcode', compact('whatsapp'));
    }
}
