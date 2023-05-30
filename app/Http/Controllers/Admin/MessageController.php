<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttachmentMessage;
use App\Models\Message;
use App\Models\Permission;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index(Message $message)
    {
        $data = [
            'message' => $message->with('whatsapp')->latest()->get()
        ];
        return view('admin.message.index', $data)->render();
    }

    public function create()
    {
        
        $data = [
            'whatsapp' => Whatsapp::whereHas('permission', fn($q) => $q->where('user_id',  Auth::user()->id))->get()
        ];

        return view('admin.message.create', $data);
    }

    public function store(Request $request, Message $message)
    {
        $fileUpload = $request->file('group-a');
        $data = $request->validate([
            'whatsapp_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer'],
            'message' => ['required', 'string'],
            'group-a.*.attachment' => ['required', 'mimes:mp4,mpg,mpeg,avi,mov,wmv,jpeg,jpg,png,xlsx,pdf,docx,doc,pptx,ppt,mp3',  'max:15000000'],
        ], [
            'group-a.*.attachment' => [
                'max' => 'File you upload is to large, max size: 15MB',
                'required' => 'This field is required',
                'mimes' => 'Invalid file extention'
            ]
        ]);

        $val = $message->create($data);
        if ($fileUpload) {

            foreach ($fileUpload as $item) {
                $fileType = $item['attachment']->getMimeType();
                if ($fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/jpg') {
                    $type = 'images';
                } else if ($fileType == 'video/mp4') {
                    $type = 'videos';
                } else {
                    $type = 'file';
                }
                $path = $item['attachment']->store('attachment', ['disk' => 'public']);
                AttachmentMessage::query()->create([
                    'message_id' => $val->id,
                    'url' => $path,
                    'type' => $type
                ]);
            }
        }

        return redirect()->route('message.index')->with('success', 'Add data successfully');
    }

    public function edit(Message $message)
    {
        $data = [
            'message' => $message,
            'whatsapp' => Whatsapp::all(),
            'attach' => AttachmentMessage::query()->where('message_id', $message->id)->get()
        ];

        return view('admin.message.edit', $data);
    }

    public function update(Request $request, Message $message)
    {
        $fileUpload = $request->file('group-a');
        $data = $request->validate([
            'whatsapp_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer'],
            'message' => ['required', 'string'],
            'group-a.*.attachment' => ['sometimes', 'mimes:mp4,mpg,mpeg,avi,mov,wmv,jpeg,jpg,png,xlsx,pdf,docx,doc,pptx,ppt,mp3',  'max:15000000'],
        ], [
            'group-a.*.attachment' => [
                'max' => 'File you upload is to large, max size: 15MB',
                'required' => 'This field is required',
                'mimes' => 'Invalid file extention'
            ]
        ]);

        $message->update($data);

        if ($fileUpload) {
            foreach ($fileUpload as $item) {

                $fileType = $item['attachment']->getMimeType();
                if ($fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/jpg') {
                    $type = 'images';
                } else if ($fileType == 'video/mp4') {
                    $type = 'videos';
                } else {
                    $type = 'file';
                }
                $path = $item['attachment']->store('attachment', ['disk' => 'public']);
                AttachmentMessage::query()->create([
                    'message_id' => $message->id,
                    'url' => $path,
                    'type' => $type
                ]);
            }
        }

        return redirect()->route('message.index')->with('success', 'Update data successfully');
    }

    public function show($id)
    {
        $data = Message::query()->find($id);

        $val = [
            'name' => $data->whatsapp->name,
            'title' => $data->title,
            'message' => $data->message,
            'duration' => $data->duration
        ];

        return $val;
    }

    public function destroy(Message $message)
    {
        $attachment = $message->attachmentmessage;
        foreach ($attachment as $item) {
            Storage::delete($item->url);
            AttachmentMessage::query()->where('url', $item->url)->delete();
        }

        $message->delete();

        return redirect()->route('message.index')->with('success', 'Delete data successfully');
    }

    public function deleteAttachment($id)
    {
        $data = AttachmentMessage::find($id);

        Storage::delete($data->url);

        $data->delete();

        return redirect()->back();
    }
}
