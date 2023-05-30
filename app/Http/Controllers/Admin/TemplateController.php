<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'templates' => Template::query()->latest()->get()
        ];
        return view('admin.template.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'is_actvie' => ['required', 'integer']
        ]);

        $data = $validated->getData();

        $img = $request->file('thumbnail');

        if ($img) {
            $data['thumbnail'] = $img->store('template-img', ['disk' => 'public']);
        }

        Template::query()->create($data);

        return redirect()->route('template.index')->with('success', 'New data added successfully');
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
    public function edit($id)
    {
        $data = [
            'templates' => Template::find($id)
        ];

        return view('admin.template.edit', $data);
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
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:1024'],
            'is_actvie' => ['required', 'integer']
        ]);

        $data = $validated->getData();

        $img = $request->file('thumbnail');
        $old_img = $request->input('old_img');

        if ($img) {
            $data['thumbnail'] = $img->store('template-img', ['disk' => 'public']);
            Storage::delete($old_img);
        } else {
            $data['thumbnail'] = $old_img;
        }

        Template::query()->find($id)->update($data);

        return redirect()->route('template.index')->with('success', 'Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Template::find($id);

        Storage::delete($data->thumbnail);

        Template::query()->find($id)->delete();

        return redirect()->route('template.index')->with('success', 'Data deleted successfully');
    }
}
