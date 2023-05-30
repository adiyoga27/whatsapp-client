<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Resources\TestimonialResource;
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
    public function index(Request $request, Testimonial $testimonial)
    {
        $id = $request->id;

        $data = $testimonial->query()
            ->when($id, function ($query, $id) {
                return $query->where('id', $id);
            })
            ->latest()
            ->get();

        return TestimonialResource::collection($data)
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
    public function store(StoreTestimonialRequest $request)
    {
        $payload = $request->validated();

        $payload['photo'] = $request->file('photo')->store('testimonial-img', ['disk' => 'public']);

        $data = Testimonial::query()->create($payload);

        return (new TestimonialResource($data))
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
    public function update(UpdateTestimonialRequest $request, $id)
    {
        $payload = $request->validated();

        $testimonial = Testimonial::query()->find($id);

        $photo = $request->file('photo');

        if ($photo) {
            $payload['photo'] = $photo->store('testimonial-img', ['disk' => 'public']);
            Storage::delete($testimonial->photo);
        } else {
            $payload['photo'] = $testimonial->photo;
        }

        $testimonial->update($payload);

        return (new TestimonialResource($testimonial))
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
    public function destroy(Testimonial $testimonial)
    {
        Storage::delete($testimonial->photo);

        $testimonial->delete();

        return response()
            ->json([
                'status' => true,
                'message' => 'Data deleted'
            ]);
    }
}
