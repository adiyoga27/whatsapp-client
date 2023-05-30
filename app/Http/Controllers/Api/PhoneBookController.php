<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhonebookResource;
use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;

        $data = PhoneBook::query()->with('whatsapp')
            ->when($id, function ($query, $id) {
                return $query->where('id', $id);
            })
            ->paginate(10);

        return PhonebookResource::collection($data)
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
        $payload =  $request->validate([
            'whatsapp_id' => ['required', 'numeric'],
            'title' => ['required',]
        ]);

        $data = PhoneBook::query()->create($payload);

        return (new PhonebookResource($data))
            ->additional([
                'status' => true,
                'message' => 'success',
            ]);
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
        $phonebook = PhoneBook::query()->find($id);

        $payload =  $request->validate([
            'whatsapp_id' => ['required', 'numeric'],
            'title' => ['required',]
        ]);

        $phonebook->update($payload);

        return (new PhonebookResource($phonebook))
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
    public function destroy(PhoneBook $phonebook)
    {
        $phonebook->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
}
