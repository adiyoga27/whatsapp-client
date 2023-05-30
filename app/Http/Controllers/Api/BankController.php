<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bank = Bank::query()
            ->when($request->id, function ($query, $id) {
                $query->find($id);
            })->paginate(10);

        return BankResource::collection($bank)
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
            'account_name' => ['required', 'string'],
            'account_number' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);

        $data = Bank::query()->create($payload);

        return response()
            ->json([
                'data' => $data,
                'status' => true,
                'message' => 'success'
            ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'account_name' => ['required', 'string'],
            'account_number' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);

        $bank = Bank::query()->find($id);

        $bank->update($payload);

        return (new BankResource($bank))
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
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
