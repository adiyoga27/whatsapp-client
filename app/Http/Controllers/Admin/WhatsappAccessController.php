<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WhatsappAccessController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = json_encode($request->whatsapp);

        User::query()->find($id)->update([
            'whatsapp_access_id'  => $data
        ]);

        return redirect()->back()->with('success', 'Add access successfully');
    }

    public function getWhatsapp()
    {
        $data = Whatsapp::all();
        $val = $data->map(function ($data) {
            return [
                'id' => $data->id,
                'name' => $data->name
            ];
        });

        return $val;
    }
}
