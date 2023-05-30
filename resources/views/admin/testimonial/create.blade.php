@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-add-data">Add New Testimonial</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-testimonial-header">Testimonial</a></li>
                    <li class="breadcrumb-item active" key="t-add-data">Add New Testimonial</li>
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
                            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ asset('assets/images/default.png') }}" id="img-view" class=""
                                            style="width: 100%; min-height: 300px" alt="testimonial-img">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-name-input" key="t-table-name">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" id="basicpill-name-input"
                                                        placeholder="Enter testimonial name">

                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phone-input" key="t-table-phone">Phone</label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" value="{{ old('phone') }}"
                                                        id="basicpill-phone-input" placeholder="Enter phone number">

                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-rate_star-input" key="t-table-rate-star">Rate
                                                        Star</label>
                                                    <input type="number"
                                                        class="form-control @error('rate_star') is-invalid @enderror"
                                                        name="rate_star" value="{{ old('rate_star') }}"
                                                        id="basicpill-rate_star-input"
                                                        placeholder="Enter the rate star 0 - 5">

                                                    @error('rate_star')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Active/Deactivate</label>

                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '1' ? 'checked' : '' }} type="radio"
                                                            name="is_active" id="inlineRadio1" value="1">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '0' ? 'checked' : '' }} type="radio"
                                                            name="is_active" id="inlineRadio2" value="0">
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
                                                    <label for="upload-img" key="t-table-image">Image</label>
                                                    <input type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        name="photo" value="{{ old('photo') }}"
                                                        onchange="showPreview(event)" id="upload-img">
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="float-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light"
                                                key="t-save">Save</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">

                                            <label for="description" key="t-table-description">Description</label>
                                            <textarea name="description" class=" @error('description') is-invalid @enderror" id="description" rows="3"
                                                placeholder="Enter Testimonial Description">{{ old('description') }}</textarea>

                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg">
                                        <button type="button" class="btn btn-sm btn-secondary" id="paste-text">
                                            Paste Text
                                        </button>
                                    </div>
                                </div> --}}
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
