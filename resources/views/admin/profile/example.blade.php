@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Website Profile</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                    <li class="breadcrumb-item active">Website Profile</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('profile-update', [$profile_data['id']]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                @include('admin.flash-message')
                <div class="row">
                    <div class="col-lg-3">
                        <input type="hidden" name="old-logo" value="{{ $profile_data['logo'] }}">
                        <img src="{{ asset('storage/' . $profile_data->logo) }}" id="img-view" width="100%"
                            alt="profile-img">
                    </div>
                    <div class="col-lg-9">


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-store-address-input">Store Address</label>
                                    <input type="text" class="form-control @error('store_address') is-invalid @enderror"
                                        name="store_address"
                                        value="{{ old('store_address') ? old('store_address') : $profile_data->store_address }}"
                                        id="basicpill-store-address-input" placeholder="Enter Store Address">
                                    @error('store_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-maps-input">Maps</label>
                                    <input type="text" class="form-control @error('maps') is-invalid @enderror"
                                        name="maps" value="{{ old('maps') ? old('maps') : $profile_data->maps }}"
                                        id="basicpill-maps-input" placeholder="Enter Google Maps Link">
                                    @error('maps')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-phone_cs_1-input">Phone Number CS 1</label>
                                    <input type="text" class="form-control @error('phone_cs_1') is-invalid @enderror"
                                        name="phone_cs_1"
                                        value="{{ old('phone_cs_1') ? old('phone_cs_1') : $profile_data->phone_cs_1 }}"
                                        id="basicpill-phone_cs_1-input" placeholder="Enter Phone Number">
                                    @error('phone_cs_1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-phone_cs_2-input">Phone Number CS 2</label>
                                    <input type="text" class="form-control @error('phone_cs_2') is-invalid @enderror"
                                        name="phone_cs_2"
                                        value="{{ old('phone_cs_2') ? old('phone_cs_2') : $profile_data->phone_cs_2 }}"
                                        id="basicpill-phone_cs_2-input" placeholder="Enter Phone Number">
                                    @error('phone_cs_2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-logo-input">Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        name="logo" id="basicpill-logo-input" onchange="showPreview(event)">
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-email-input">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') ? old('email') : $profile_data->email }}"
                                        id="basicpill-email-input" placeholder="Enter Your Email address">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- img preview --}}
                <section class="mt-3 mb-5">
                    <h3>Image Preview</h3>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/images/default.png') }}" id="img-view-section1" width="100%"
                                alt="">
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('assets/images/default.png') }}" id="img-view-section2" width="100%"
                                alt="">

                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('assets/images/default.png') }}" id="img-view-section3" width="100%"
                                alt="">

                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('assets/images/default.png') }}" id="img-view-section4" width="100%"
                                alt="">

                        </div>
                    </div>
                </section>

                <section class="mb-4">
                    <h4 class="text-start">Content Section 1 - Header</h4>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="basicpill-webname-input">Website Name</label>
                                <input type="text" class="form-control @error('section_1') is-invalid @enderror"
                                    name="section_1[]" value="" id="basicpill-webname-input"
                                    placeholder="Enter The Website Name">
                            </div>
                            @error('section_1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="basicpill-store-address-input">Sub Name</label>
                                <input type="text" class="form-control @error('sub_web_name') is-invalid @enderror"
                                    name="section_1[]" value="" id="basicpill-store-address-input"
                                    placeholder="Enter Store Address">
                                @error('sub_web_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="basicpill-logo-input">Image</label>
                                <input type="file" class="form-control @error('section_1') is-invalid @enderror"
                                    name="section_1[]" id="basicpill-logo-input" onchange="showPreviewSectionOne(event)">
                                @error('section_1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>
                <section class="mb-4">
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <h4 class="text-start">Content Section 2 - Company</h4>

                                <table class="table table-bordered table-hover" id="dynamic_field">
                                    <tr>
                                        <td>Company Name</td>
                                        <td>Company Address</td>
                                        <td>Action</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="company_name[]"
                                                placeholder="Enter the company name" class="form-control name_list" />
                                        </td>
                                        <td><input type="text" name="company_address[]"
                                                placeholder="Enter company adddress" class="form-control name_email" />
                                        </td>
                                        <td><button type="button" name="add" id="add"
                                                class="btn btn-primary">Add
                                                More</button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="mb-4">
                    <h4 class="text-start">Content Section 3 - Product Variatif</h4>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section1_3">Section Name</label>
                                <input type="text" class="form-control @error('section_3') is-invalid @enderror"
                                    name="section_3[]" value="" id="section1_3" placeholder="Enter section name">
                                @error('section_3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section2_3">Section Title</label>
                                <input type="text" class="form-control @error('section_3') is-invalid @enderror"
                                    name="section_3[]" value="" id="section2_3" placeholder="Enter section title">
                                @error('section_3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section3_3">Section Description</label>
                                <input type="text" class="form-control @error('section_3') is-invalid @enderror"
                                    name="section_3[]" value="" id="section3_3"
                                    placeholder="Enter section description">
                                @error('section_3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="basicpill-input">Image</label>
                                <input type="file" class="form-control @error('section_1') is-invalid @enderror"
                                    name="section_3[]" id="basicpill-input" onchange="showPreviewSectionTwo(event)">
                                @error('section_1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="basicpill-input">Image</label>
                                <input type="file" class="form-control @error('section_1') is-invalid @enderror"
                                    name="section_3[]" id="basicpill-input" onchange="showPreviewSectionTwo(event)">
                                @error('section_1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="basicpill-input">Image</label>
                                <input type="file" class="form-control @error('section_1') is-invalid @enderror"
                                    name="section_3[]" id="basicpill-input" onchange="showPreviewSectionTwo(event)">
                                @error('section_1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>
                <section class="mb-4">
                    <h4 class="text-start">Content Section 4 - Product</h4>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section1_4">Section Name</label>
                                <input type="text" class="form-control @error('section_4') is-invalid @enderror"
                                    name="section_4[]" value="" id="section1_4" placeholder="Enter section name">
                                @error('section_4')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-4">
                                <label for="section2_4">Section Title</label>
                                <input type="text" class="form-control @error('section_4') is-invalid @enderror"
                                    name="section_4[]" value="" id="section2_4" placeholder="Enter section title">
                                @error('section_4')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-4">
                                <label for="section2_4">Section Description</label>
                                <input type="text" class="form-control @error('section_4') is-invalid @enderror"
                                    name="section_4[]" value="" id="section2_4" placeholder="Enter section title">
                                @error('section_4')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row my-3 ">
                    <div class="col-lg">
                        <h2 class="text-center">Choose Templates</h2>
                        <div class="row">
                            @for ($i = 0; $i < count($template); $i++)
                                <div class="col-md-4 templates">
                                    <input type="radio" name="template_id" id="cb{{ $i }}"
                                        {{ old('template_id') ? 'checked' : ($template[$i]->id == $profile_data->template_id ? 'checked' : '') }}
                                        value="{{ $template[$i]->id }}" />
                                    <label for="cb{{ $i }}"><img
                                            src="{{ asset('storage/' . $template[$i]->thumbnail) }}" />
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="mb-3 float-end">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
