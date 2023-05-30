<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactPhonebookResource;
use App\Imports\ContactPhonebookImport;
use App\Models\ContactPhoneBook;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContactPhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $data = ContactPhoneBook::query()
            ->with('phonebook')
            ->when($id, function ($query, $id) {
                $query->where('id', $id);
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return ContactPhonebookResource::collection($data)
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
        $payload = $request->validate([
            'phonebook_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric']
        ]);

        $data = ContactPhoneBook::query()->create($payload);

        return (new ContactPhonebookResource($data))
            ->additional([
                'status' => true,
                'message' => 'success'
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
        $contact = ContactPhoneBook::query()->find($id);

        $payload = $request->validate([
            'phonebook_id' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric']
        ]);

        $contact->update($payload);

        return (new ContactPhonebookResource($contact))
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
        ContactPhoneBook::query()->find($id)->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'success'
            ]);
    }

    public function importExcel(Request $request, $id)
    {
        $file = $request->file('file');

        Excel::import(new ContactPhonebookImport($id), $file);

        return response()
            ->json([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
