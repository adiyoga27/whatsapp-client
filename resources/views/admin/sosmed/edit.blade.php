@extends('admin.dashboard-temp')

@section('content-section')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit Social Media</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Social Media</a></li>
                    <li class="breadcrumb-item active">Edit Social Media</li>
                </ol>
            </div>
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
                    <h1 class="mb-3 text-center">Edit Social Media</h1>
                    <section>
                        <form action="{{ route('sosmed.update', [$sosmed->id]) }}" method="POST">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-facebook-input">Facebook</label>
                                                <input type="text" class="form-control @error('facebook') is-invalid @enderror"  name="facebook" value="{{ old('facebook') ? old('facebook') : $sosmed->facebook }}" id="basicpill-facebook-input" placeholder="Enter Data Facebook">
                                                @error('facebook')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-instagram-input">Instagram</label>
                                                <input type="text" class="form-control @error('instagram') is-invalid @enderror"  name="instagram" value="{{ old('instagram') ? old('instagram') : $sosmed->instagram }}" id="basicpill-instagram-input" placeholder="Enter Data Instagram">

                                                @error('instagram')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-twitter-input">Twitter</label>
                                                <input type="text" class="form-control @error('twitter') is-invalid @enderror"  name="twitter" value="{{ old('twitter') ? old('twitter') : $sosmed->twitter }}" id="basicpill-twitter-input" placeholder="Enter Data Twitter">
                                                @error('twitter')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') ? old('email') : $sosmed->email }}" id="basicpill-email-input" placeholder="Enter Data email">

                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>

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
