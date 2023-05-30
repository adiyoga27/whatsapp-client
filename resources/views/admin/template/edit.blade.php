@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data Template</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Template</a></li>
                    <li class="breadcrumb-item active">Edit Data Template</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="basic-example">
                        <!-- Seller Details -->
                        @include('admin.flash-message')
                        <section>
                            <form action="{{ route('template.update', [$templates->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <input type="hidden" name="old_img" value="{{ $templates->thumbnail }}">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <img src="{{ asset('storage/' . $templates->thumbnail) }}" id="img-view"
                                            class="" style="width: 100%; min-height: 300px" alt="testimonial-img">
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                @can('isSuperadmin')
                                                    <div class="mb-3">
                                                        <label for="basicpill-name-input">Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name"
                                                            value="{{ old('name') ? old('name') : $templates->name }}"
                                                            id="basicpill-name-input" placeholder="Enter template name">

                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <label for="basicpill-name-input">Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name"
                                                            value="{{ old('name') ? old('name') : $templates->name }}"
                                                            id="basicpill-name-input" placeholder="Enter template name"
                                                            readonly>

                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endcan
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Active/Deactivate</label>

                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '1' ? 'checked' : ($templates->is_active == 1 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio1"
                                                            value="1">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '0' ? 'checked' : ($templates->is_active == 0 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio2"
                                                            value="0">
                                                        <label class="form-check-label" for="inlineRadio2">Non
                                                            Active</label>
                                                    </div>

                                                    @error('is_active')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="upload-img">Image</label>
                                                    <input type="file"
                                                        class="form-control @error('thumbnail') is-invalid @enderror"
                                                        name="thumbnail" onchange="showPreview(event)" id="upload-img">
                                                    @error('thumbnail')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="">
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light">Save</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </section>

                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
