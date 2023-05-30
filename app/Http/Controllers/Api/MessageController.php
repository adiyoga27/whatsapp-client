<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\AttachmentMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Message $message)
    {
        $id = $request->id;

        $data = $message->query()
            ->with('whatsapp', 'attachmentmessage')
            ->when($id, function ($query, $id) {
                return $query->find($id);
            })
            ->latest()
            ->paginate();


        return MessageResource::collection($data)
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
            'whatsapp_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer'],
            'message' => ['required', 'string'],
            'attachment.*.url' => ['required', 'string'],
            'attachment.*.type' => ['required', 'string']
        ]);


        $data = Message::query()->create([
            'whatsapp_id' => $payload['whatsapp_id'],
            'title' => $payload['title'],
            'duration' => $payload['duration'],
            'message' => $payload['message'],
        ]);

        foreach ($payload['attachment'] as $item) {
            AttachmentMessage::query()->create([
                'message_id' => $data->id,
                'url' => $item['url'],
                'type' => $item['type']
            ]);
        }

        return (new MessageResource($data))
            ->additional([
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
            'whatsapp_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'integer'],
            'message' => ['required', 'string'],
            'attachment.*.url' => ['required', 'string'],
            'attachment.*.type' => ['required', 'string']
        ]);

        $message = Message::query()->find($id);

        $message->update([
            'whatsapp_id' => $payload['whatsapp_id'],
            'title' => $payload['title'],
            'duration' => $payload['duration'],
            'message' => $payload['message'],
        ]);

        foreach ($payload['attachment'] as $item) {
            AttachmentMessage::query()->updateOrCreate([
                'message_id' => $message->id,
                'url' => $item['url'],
                'type' => $item['type']
            ]);
        }

        return (new MessageResource($message))
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
    public function destroy(Message $message)
    {
        $attachment = $message->attachmentmessage;

        foreach ($attachment as $item) {
            Storage::delete($item->url);
            AttachmentMessage::query()->where('url', $item->url)->delete();
        }

        $message->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'success'
            ]);
    }
}
