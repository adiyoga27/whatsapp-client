<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttachmentMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function index($id)
    {
        $data = [
            'attach' => AttachmentMessage::query()->where('message_id', $id)->latest()->get(),
            'message_id' => $id,
        ];

        return view('admin.attach.index', $data);
    }

    public function upload(Request $request, AttachmentMessage $attachment_message)
    {
        $data = $request->validate(
            [
                'message_id' => ['required', 'numeric'],
                'type' => ['required', 'string'],
                'url' => ['required', 'mimes:mp4,mpg,mpeg,avi,mov,wmv,jpeg,jpg,png,xlsx,pdf,docx,doc,pptx,ppt,mp3',  'max:15000000'],
            ],
            [
                'url' => [
                    'max' => 'File you upload is to large, max size: 15MB',
                    'required' => 'This field is required',
                    'mimes' => 'Invalid file extention'
                ]
            ]
        );

        $file = $request->file('url');
        if ($file) {
            $data['url'] = $file->store('attachment', ['disk' => 'public']);
        }

        $attachment_message->create($data);

        return redirect()->route('attach.index', [$data['message_id']])->with('success', 'Upload file successfully');
    }

    public function destroy($id)
    {
        $data = AttachmentMessage::query()->find($id);

        Storage::delete($data->url);

        $data->delete();

        return redirect()->route('message.edit', [$data->message_id])->with('success', 'Delete data successfully');
    }

    public function edit($id)
    {
        $attach = AttachmentMessage::find($id);

        $data = [
            'attach' => $attach,
            'message_id' => $attach->message_id,
        ];

        return view('admin.attach.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $attachmentmessage = AttachmentMessage::find($id);

        $data = $request->validate(
            [
                'message_id' => ['required', 'numeric'],
                'type' => ['required', 'string'],
                'url' => ['required', 'mimes:mp4,mpg,mpeg,avi,mov,wmv,jpeg,jpg,png,xlsx,pdf,docx,doc,pptx,ppt,mp3',  'max:15000000'],
            ],
            [
                'url' => [
                    'max' => 'File you upload is to large, max size: 15MB',
                    'required' => 'This field is required',
                    'mimes' => 'Invalid file extention'
                ]
            ]
        );

        $fileLama = $request->fileLama;
        $file = $request->file('url');

        if ($file) {
            $data['url'] = $file->store('attachment', ['disk' => 'public']);
            Storage::delete($fileLama);
        } else {
            $data['url'] = $fileLama;
        }

        $attachmentmessage->update($data);

        return redirect()->route('attach.index', [$attachmentmessage->message_id])->with('success', 'Update data successfully');
    }
}
