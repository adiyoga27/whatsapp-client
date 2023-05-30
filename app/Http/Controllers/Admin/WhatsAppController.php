<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                // 'url' => ['required', 'string', 'max:255'],
                'is_active' => ['required', 'numeric']
            ]);
            $data['prefix'] = 'GS-'.(1000000 + ($whatsapp->latest()->first()->id ?? 0) + 1);

            $response = Http::post('http://wabot.galkasoft.id:7991/create-client', [
                'client_id' => $data['prefix'],
                'name' => $data['name'],
                'description' => "Whatsapp Galkasoft",
                'expired_at' => "2023-01-01 00:00:00"
            ]);

            $result = $response->json();
            $data['response']= $result;
            $data['apikey']= $result['data']['api_key'];
            $whatsapp->create($data);

             DB::commit();
            return redirect()->route('whatsapp.index')->with('success', 'Add data successfully');
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
       
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
            // 'url' => ['required', 'string', 'max:255'],
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
