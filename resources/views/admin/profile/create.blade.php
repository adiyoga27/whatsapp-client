@extends('admin.dashboard-temp')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h2 class="text-center mb-5">Add New Website Profile</h2>
                        <section>
                            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input type="hidden" name="old-logo" value="">
                                        <img src="{{ asset('assets/images/product/img-1.png') }}" id="img-view"
                                            width="100%" alt="">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-webname-input">Website Name</label>
                                                    <input type="text"
                                                        class="form-control @error('website_name') is-invalid @enderror"
                                                        name="website_name" value="" id="basicpill-webname-input"
                                                        placeholder="Enter The Website Name">
                                                </div>
                                            </div>
                                            @error('website_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-store-address-input">Store Address</label>
                                                    <input type="text"
                                                        class="form-control @error('store_address') is-invalid @enderror"
                                                        name="store_address" value=""
                                                        id="basicpill-store-address-input"
                                                        placeholder="Enter Store Address">
                                                </div>
                                                @error('store_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-maps-input">Maps</label>
                                                    <input type="text"
                                                        class="form-control @error('maps') is-invalid @enderror"
                                                        name="maps" value="" id="basicpill-maps-input"
                                                        placeholder="Enter Google Maps Link">
                                                </div>
                                                @error('maps')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="" id="basicpill-email-input"
                                                        placeholder="Enter Your Email address">
                                                </div>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phone_cs_1-input">Phone Number CS 1</label>
                                                    <input type="text"
                                                        class="form-control @error('phone_cs_1') is-invalid @enderror"
                                                        name="phone_cs_1" value="" id="basicpill-phone_cs_1-input"
                                                        placeholder="Enter Phone Number">
                                                </div>
                                                @error('phone_cs_1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phone_cs_2-input">Phone Number CS 2</label>
                                                    <input type="phone_cs_2"
                                                        class="form-control @error('phone_cs_2') is-invalid @enderror"
                                                        name="phone_cs_2" value="" id="basicpill-phone_cs_2-input"
                                                        placeholder="Enter Phone Number">
                                                </div>
                                                @error('phone_cs_2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-logo-input">Logo</label>
                                                    <input type="file"
                                                        class="form-control @error('logo') is-invalid @enderror"
                                                        name="logo" id="basicpill-logo-input"
                                                        onchange="showPreview(event)">
                                                </div>
                                                @error('logo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Active/Deactivate</label>

                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '2' ? 'checked' : '' }} type="radio"
                                                            name="is_active" id="inlineRadio1" value="2">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '3' ? 'checked' : '' }} type="radio"
                                                            name="is_active" id="inlineRadio2" value="3">
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
