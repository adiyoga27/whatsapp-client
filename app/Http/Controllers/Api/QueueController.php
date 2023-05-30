<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QueueResource;
use App\Imports\QueueImport;
use App\Models\ContactPhoneBook;
use App\Models\Message;
use App\Models\QueueMessage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QueueController extends Controller
{
    public function index($id)
    {
        $data = Message::query()
            ->where('id', $id)
            ->with('queuemessage', 'attachmentmessage')
            ->get();

        return QueueResource::collection($data)
            ->additional([
                'status' => true,
                'message' => 'success'
            ]);
    }

    public function StoreManualQueue(Request $request)
    {
        $payload = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'message_id' => ['required', 'numeric'],
            'status' => ['required']
        ]);

        $data = QueueMessage::query()->create($payload);

        return response()->json([
            'data' => $data,
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'message_id' => ['required', 'numeric'],
            'status' => ['required']
        ]);

        $queue = QueueMessage::query()->find($id);

        $queue->update($payload);

        return response()->json([
            'data' => $queue,
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function destroy($id)
    {

        QueueMessage::query()->find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function importPhonebook(Request $request)
    {
        for ($i = 0; $i < count($request->phonebook); $i++) {
            $contact[] = ContactPhoneBook::query()->where('phonebook_id', $request->phonebook[$i])->get();
        }

        foreach ($contact as $data) {
            foreach ($data as $val) {
                QueueMessage::query()->updateOrCreate([
                    'phonebook_id' => $val->phonebook_id,
                    'message_id' => $request->message_id,
                    'phone' => $val->phone,
                    'name' => $val->name,
                    'status' => 'pending'
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function importExcel(Request $request)
    {
        $path = $request->file('file');
        $id = $request->message_id;

        Excel::import(new QueueImport($id), $path);

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }

    public function deleteAllQueue($id)
    {
        QueueMessage::query()->where('message_id', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
}
