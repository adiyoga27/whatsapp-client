@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-website-sub-profile">Website Profile</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-profile-header">Profile</a></li>
                    <li class="breadcrumb-item active" key="t-website-sub-profile">Website Profile</li>
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
                    <div class="col-lg-3 text-center">
                        <input type="hidden" name="old_logo" value="{{ $profile_data['logo'] }}">
                        <input type="hidden" name="old_section1" value="{{ $profile_data['section1_img'] }}">
                        <input type="hidden" name="old_image1" value="{{ $profile_data['image1'] }}">
                        <input type="hidden" name="old_image2" value="{{ $profile_data['image2'] }}">
                        <input type="hidden" name="old_image3" value="{{ $profile_data['image3'] }}">
                        <input type="hidden" name="tagline_img" value="{{ $profile_data['tagline_img'] }}">
                        <img src="{{ asset('storage/' . $profile_data->logo) }}" id="img-view" width="60%"
                            alt="profile-img">
                    </div>
                    <div class="col-lg-9">


                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label for="basicpill-store-address-input" key="t-store-address">Store Address</label>
                                    <input type="text" class="form-control @error('store_address') is-invalid @enderror"
                                        name="store_address"
                                        value="{{ old('store_address') ? old('store_address') : $profile_data->store_address }}"
                                        id="basicpill-store-address-input" placeholder="Enter Store Address">
                                    @error('store_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-maps-input" key="t-maps">Maps</label>
                                    <input type="text" class="form-control @error('maps') is-invalid @enderror"
                                        name="maps" value="{{ old('maps') ? old('maps') : $profile_data->maps }}"
                                        id="basicpill-maps-input" placeholder="Enter Google Maps Link">
                                    @error('maps')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-phone_cs_1-input" key="t-phone-cs">Phone Number CS 1</label>
                                    <input type="text" class="form-control @error('phone_cs_1') is-invalid @enderror"
                                        name="phone_cs_1"
                                        value="{{ old('phone_cs_1') ? old('phone_cs_1') : $profile_data->phone_cs_1 }}"
                                        id="basicpill-phone_cs_1-input" placeholder="Enter Phone Number">
                                    <span class="text-danger ps-1" style="font-size: 11px"><span
                                            key="t-example">Example:</span>
                                        088123001923</span>
                                    @error('phone_cs_1')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="basicpill-whatsapp-input">WhatsApp</label><br>
                                    <input type="text" class="form-control @error('whatsapp') is-invalid @enderror"
                                        name="whatsapp"
                                        value="{{ old('whatsapp') ? old('whatsapp') : $profile_data->whatsapp }}"
                                        id="basicpill-whatsapp-input" placeholder="Enter Phone Number">
                                    <span class="text-danger ps-1" style="font-size: 11px"><span
                                            key="t-example">Example:</span>
                                        6285113002890</span>
                                    @error('whatsapp')
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
                <section class="mt-3 mb-5">
                    <h3 key="t-img-preview">Image Preview</h3>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="" key="t-img-header">Image Header</label>
                            <img src="{{ asset('storage/' . $profile_data->section1_img) }}" id="img-view-section1"
                                width="100%" alt="">
                        </div>
                        <div class="col-md-2">
                            <label for="" key="t-img-1">Image Product 1</label>
                            <img src="{{ asset('storage/' . $profile_data->image1) }}" id="img-view-section2"
                                width="100%" alt="">

                        </div>
                        <div class="col-md-2">
                            <label for="" key="t-img-2">Image Product 2</label>
                            <img src="{{ asset('storage/' . $profile_data->image2) }}" id="img-view-section3"
                                width="100%" alt="">

                        </div>
                        <div class="col-md-2">
                            <label for="" key="t-img-3">Image Product 3</label>
                            <img src="{{ asset('storage/' . $profile_data->image3) }}" id="img-view-section4"
                                width="100%" alt="">

                        </div>
                        <div class="col-md-2">
                            <label for="" key="t-tagline-img">Tagline Image</label>
                            <img src="{{ asset('storage/' . $profile_data->tagline_img) }}" id="img-view-section5"
                                width="100%" alt="">

                        </div>
                    </div>
                </section>
                <section class="mb-4">
                    <h4 class="text-start" key="t-content-section-1">Content Section 1 - Header</h4>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="web_name" key="t-website-name">Website Name</label>
                                <input type="text" class="form-control @error('web_name') is-invalid @enderror"
                                    name="web_name"
                                    value="{{ old('web_name') ? old('web_name') : $profile_data->web_name }}"
                                    id="web_name" placeholder="Enter The Website Name">
                            </div>
                            @error('web_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="description-section" key="t-table-description">Description</label>
                                <input type="text" class="form-control @error('sub_web_name') is-invalid @enderror"
                                    name="sub_web_name"
                                    value="{{ old('sub_web_name') ? old('sub_web_name') : $profile_data->sub_web_name }}"
                                    id="description-section" placeholder="Enter Description">
                                @error('sub_web_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="image-section-1" key="t-img-header">Image Header</label>
                                <input type="file" class="form-control @error('section1_img') is-invalid @enderror"
                                    name="section1_img" id="image-section-1" onchange="showPreviewSectionOne(event)">
                                @error('section1_img')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-4">
                    <h4 class="text-start" key="t-section-content-3">Content Section 3 - Product Variatif</h4>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section1_3" key="t-section-name">Section Name</label>
                                <input type="text" class="form-control @error('section_3') is-invalid @enderror"
                                    name="section_name_3" value="{{ $profile_data->section_name_3 }}" id="section1_3"
                                    placeholder="Enter section name">
                                @error('section_3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section2_3" key="t-section-title">Section Title</label>
                                <input type="text" class="form-control @error('section_3') is-invalid @enderror"
                                    name="section_title_3" value="{{ $profile_data->section_title_3 }}" id="section2_3"
                                    placeholder="Enter section title">
                                @error('section_3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="section3_3" key="t-section-description">Section Description</label>
                                <input type="text" class="form-control @error('section_3') is-invalid @enderror"
                                    name="section_description_3" value="{{ $profile_data->section_description_3 }}"
                                    id="section3_3" placeholder="Enter section description">
                                @error('section_3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="basicpill-input" key="t-img-1">Image Product 1</label>
                                <input type="file" class="form-control @error('image1') is-invalid @enderror"
                                    name="image1" id="basicpill-input" onchange="showPreviewSectionTwo(event)">
                                @error('image1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="basicpill-input" key="t-img-2">Image Product 2</label>
                                <input type="file" class="form-control @error('image2') is-invalid @enderror"
                                    name="image2" id="basicpill-input" onchange="showPreviewSectionThree(event)">
                                @error('image2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="basicpill-input" key="t-img-3">Image Product 3</label>
                                <input type="file" class="form-control @error('image3') is-invalid @enderror"
                                    name="image3" id="basicpill-input" onchange="showPreviewSectionFour(event)">
                                @error('image3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>
                <section class="mb-4">
                    <h4 class="text-start" key="t-content-section-8">Content Section 8 - Tagline</h4>

                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="tagline_section" key="t-tagline">Tagline Name</label>
                                <input type="text" class="form-control @error('tagline_section') is-invalid @enderror"
                                    name="tagline_section" value="{{ $profile_data->tagline_section }}"
                                    id="tagline_section" placeholder="Enter section name">
                                @error('tagline_section')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="tagline_img" key="t-tagline-img">Tagline Image</label>
                                <input type="file" class="form-control @error('tagline_img') is-invalid @enderror"
                                    name="tagline_img" id="tagline_img" onchange="showPreviewSectionFive(event)">
                                @error('tagline_img')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>

                @can('isSuperadmin')
                    <section class="mb-4">
                        <h4 class="text-start">Whatsapp Notification</h4>
                        <div class="col-lg">
                            <div class="mb-3">

                                <textarea name="notif" class=" @error('notif') is-invalid @enderror" id="description" rows="20"
                                    placeholder="Enter Product notif">{{ old('notif') ? old('notif') : $profile_data->notif }}</textarea>

                                @error('notif')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </section>
                @endcan



                <div class="row my-3 ">
                    <div class="col-lg">
                        <h2 class="text-center" key="t-choose-template">Choose Templates</h2>
                        <div class="row">
                            @for ($i = 0; $i < count($template); $i++)
                                <div class="col-md-4 templates">
                                    <input type="radio" name="template" id="cb{{ $i }}"
                                        {{ old('template') ? 'checked' : ($template[$i]->name == $profile_data->template ? 'checked' : '') }}
                                        value="{{ $template[$i]->name }}" />
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
                            <button type="submit" class="btn btn-success waves-effect waves-light"
                                key="t-save">Save</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
