<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Template $template)
    {
        $id = $request->id;

        $data = $template->query()
            ->when($id, function ($query, $id) {
                $query->where('id', $id);
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return TemplateResource::collection($data)
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
            'name' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'is_active' => ['required', 'boolean']
        ]);

        $thumbnail = $request->file('thumbnail');

        if ($thumbnail) {
            $payload['thumbnail'] = $thumbnail->store('template-img', ['disk' => 'public']);
        }

        $data = Template::query()->create($payload);

        return (new TemplateResource($data))
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
    public function update(Request $request, Template $template)
    {
        $payload = $request->validate([
            'name' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'is_active' => ['required', 'boolean']
        ]);

        $thumbnail = $request->file('thumbnail');

        if ($thumbnail) {
            $payload['thumbnail'] = $thumbnail->store('template-img', ['disk' => 'public']);
            Storage::delete($template->thumbnail);
        } else {
            $payload['thumbnail'] = $template->thumbnail;
        }

        $template->update($payload);

        return (new TemplateResource($template))
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
    public function destroy(Template $template)
    {
        Storage::delete($template->thumbnail);

        $template->delete();

        return response()->json([
            'status' => true,
            'message' => 'success'
        ]);
    }
}
