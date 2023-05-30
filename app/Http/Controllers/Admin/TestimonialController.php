<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'testimonial' => Testimonial::latest()->get()
        ];

        return view('admin.testimonial.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('testimonial-img', ['disk' => 'public']);
        }

        Testimonial::query()->create($data);

        return redirect()->route('testimonial.index')->with('success', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Testimonial::query()->find($id);

        return $data;
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
            'testimonial' => Testimonial::find($id)
        ];

        return view('admin.testimonial.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
        $data = $request->validated();

        $old_photo = $request->old_photo;
        $new_img = $request->file('photo');
        if ($new_img) {
            $data['photo'] = $new_img->store('testimonial-img', ['disk' => 'public']);
            Storage::delete($old_photo);
        } else {
            $data['photo'] = $old_photo;
        }

        Testimonial::query()->find($id)->update($data);

        return redirect()->route('testimonial.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Testimonial::query()->find($id);

        Storage::delete($data->photo);

        Testimonial::query()->find($id)->delete();

        return redirect()->route('testimonial.index')->with('success', 'Data Delete Successfully');
    }
}
