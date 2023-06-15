<?php

namespace App\Http\Controllers\Admin;

use App\Events\ImportCondition;
use App\Exports\QueuDataExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\QueueMessageResource;
use App\Http\Resources\QueueResource;
use App\Imports\QueueImport;
use App\Models\AttachmentMessage;
use App\Models\ContactPhoneBook;
use App\Models\Message;
use App\Models\PhoneBook;
use App\Models\QueueMessage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QueueController extends Controller
{
    public function index($id)
    {
        $data = [
            'id' => $id,
            'message' => Message::query()->find($id),
            'queue' => QueueMessage::query()->with('phonebook')->where('message_id', $id)->latest()->get(),
            'phonebook' => PhoneBook::all(),
            'images' => AttachmentMessage::query()->where('message_id', $id)->where('type', 'images')->get(),
            'videos' => AttachmentMessage::query()->where('message_id', $id)->where('type', 'videos')->get(),
            'file' => AttachmentMessage::query()->where('message_id', $id)->where('type', 'file')->get(),
            'isSending' => QueueMessage::query()->with('phonebook')->where('message_id', $id)->where('status', 'progress')->exists() ?? false
        ];


        return view('admin.queue.index', $data);
    }

    public function storeManual(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'message_id' => ['required'],
            'status' => ['required']
        ]);

        QueueMessage::query()->create($data);

        return redirect()->back()->with('success', 'Add data successfully');
    }

    public function importPhonebook(Request $request)
    {
        $phonebook_id = $request->phonebook;

        for ($i = 0; $i < count($phonebook_id); $i++) {
            $contact[] = ContactPhoneBook::query()->where('phonebook_id', $phonebook_id[$i])->get();
        }
        foreach ($contact as $data) {
            foreach ($data as $val) {
                QueueMessage::query()->updateOrCreate([
                    'phonebook_id' => $val->phonebook_id,
                    'message_id' => $request->message_id,
                    'phone' => ImportCondition::dispatch($val->phone)[0],
                    'name' => $val->name,
                    'status' => 'pending'
                ]);
            }
        }

        return redirect()->route('queue.index', [$request->message_id])->with('success', 'Import Successfully');
    }

    public function importExcel(Request $request)
    {
        $path = $request->file('file');
        $id = $request->message_id;
        Excel::import(new QueueImport($id), $path);

        return redirect()->back()->with('success', 'Import successfully');
    }

    public function exportExcel()
    {
        return Excel::download(new QueuDataExport, 'Excel Data Example.xlsx');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'message_id' => ['required'],
            'status' => ['required']
        ]);

        QueueMessage::query()->find($id)->update($data);

        return redirect()->back()->with('success', 'Update data successfully');
    }

    public function edit($id)
    {
        $data = QueueMessage::query()->find($id);

        return [
            'name' => $data->name,
            'status' => $data->status,
            'phone' => $data->phone,
            'id' => $data->id
        ];
    }

    public function destroy($id)
    {
        QueueMessage::query()->find($id)->delete();

        return redirect()->back()->with('success', 'Delete data successfully');
    }

    public function delete($id)
    {
        QueueMessage::query()->where('message_id', $id)->delete();

        return redirect()->back()->with('success', 'Delete data successfully');
    }

    public function queueMessage(Request $request, $id)
    {
        $queue = QueueMessage::where('message_id', $id)->get();

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => array(
                    'queue'=> QueueMessageResource::collection($queue),
                    'status'=> array(
                        'all' => QueueMessage::where('message_id', $id)->count(),
                        'pending' => QueueMessage::where('message_id', $id)->where('status', 'pending')->count(),
                        'success' => QueueMessage::where('message_id', $id)->where('status', 'success')->count(),
                        'failed' => QueueMessage::where('message_id', $id)->where('status', 'failed')->count(),
                        'progress' => QueueMessage::where('message_id', $id)->where(fn($q) => $q->where('status', 'ongoing')->orWhere('status', 'progress'))->count(),
                    )
                )
        ]);
    }
}
