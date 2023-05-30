<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ContactPhonebookImport;
use App\Models\ContactPhoneBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ContactPhoneBookController extends Controller
{
    public function index($id)
    {
        $data = [
            'contact' => ContactPhoneBook::query()
                ->where('phonebook_id', $id)
                ->with('phonebook')
                ->latest()
                ->get(),
            'phonebook_id' => $id
        ];

        return view('admin.contactphonebook.index', $data);
    }

    public function create($id)
    {
        $data = [
            'phonebook_id' => $id
        ];

        return view('admin.contactphonebook.create', $data);
    }

    public function store(Request $request, ContactPhoneBook $contactphonebook)
    {
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', '255'],
            'phone' => ['required', 'numeric'],
            'phonebook_id' => ['required']
        ]);

        $val = $data->getData();

        $contactphonebook->create($val);

        return redirect()->route('contact-phonebook.index', [$val['phonebook_id']])->with('success', 'Add data successfully');
    }

    public function edit($id)
    {
        $data = [
            'contact' => ContactPhoneBook::query()->find($id)
        ];

        return view('admin.contactphonebook.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', '255'],
            'phone' => ['required', 'numeric'],
            'phonebook_id' => ['required']
        ]);

        $data = $validation->getData();

        ContactPhoneBook::query()->find($id)->update($data);

        return redirect()->route('contact-phonebook.index', [$data['phonebook_id']])->with('success', 'Update data successfully');
    }

    public function destroy($id)
    {
        $data = ContactPhoneBook::query()->find($id);

        $data->delete();

        return redirect()->route('contact-phonebook.index', [$data->phonebook_id])->with('success', 'Delete data successfully');
    }

    public function importExcel(Request $request, $id)
    {
        $path = $request->file('file');
        Excel::import(new ContactPhonebookImport($id), $path);
        return redirect()->back()->with('success', 'Import successfully');
    }
}
