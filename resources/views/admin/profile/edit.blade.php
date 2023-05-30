@extends('admin.dashboard-temp')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h1 class="text-center mb-5">Edit Website profile</h1>
                        <section>
                            <form action="{{ route('profile-update', [$profile_data['id']]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <input type="hidden" name="old-logo" value="{{ $profile_data['logo'] }}">
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
                                                        name="website_name" value="{{ $profile_data['website_name'] }}"
                                                        id="basicpill-webname-input" placeholder="Enter The Website Name">
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
                                                        name="store_address" value="{{ $profile_data['store_address'] }}"
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
                                                        name="maps" value="{{ $profile_data['maps'] }}"
                                                        id="basicpill-maps-input" placeholder="Enter Google Maps Link">
                                                </div>
                                                @error('maps')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror""
                                                        name="email" value="{{ $profile_data['email'] }}"
                                                        id="basicpill-email-input" placeholder="Enter Your Email address">
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
                                                        name="phone_cs_1" value="{{ $profile_data['phone_cs_1'] }}"
                                                        id="basicpill-phone_cs_1-input" placeholder="Enter Phone Number">
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
                                                        name="phone_cs_2" value="{{ $profile_data['phone_cs_2'] }}"
                                                        id="basicpill-phone_cs_2-input" placeholder="Enter Phone Number">
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
