<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'bank' => Bank::all()
        ];
        return view('admin.bank.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank.create');
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
            'account_number' => ['required', 'numeric'],
            'account_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:50'],
            'is_active' => ['required', 'numeric']
        ]);

        Bank::query()->create($data);

        return redirect()->route('bank.index')->with('success', 'Add data successfully');
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
    public function edit(Bank $bank)
    {
        $data = [
            'bank' => $bank
        ];

        return view('admin.bank.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $data = $request->validate([
            'account_number' => ['required', 'numeric'],
            'account_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:50'],
            'is_active' => ['required', 'numeric']
        ]);

        $bank->update($data);

        return redirect()->route('bank.index')->with('success', 'Update data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('bank.index')->with('success', 'Delete data successfully');
    }
}
