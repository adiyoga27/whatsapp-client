@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Social Media</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Social Media</a></li>
                    <li class="breadcrumb-item active">Social Media</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl">

            <div class="card">
                <div class="card-body">
                    @include('admin.flash-message')
                    <form action="{{ route('sosmed.update', [$sosmed->id]) }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="instagram">Instagram Username</label>

                                                    <input type="text"
                                                        class="form-control @error('instagram') is-invalid @enderror"
                                                        name="instagram"
                                                        value="{{ old('instagram') ? old('instagram') : $sosmed->instagram }}"
                                                        id="instagram" placeholder="Enter instagram name">
                                                    <span class="text-danger" style="font-size: 10px">contoh:
                                                        _varash.id</span>
                                                </div>
                                                @error('instagram')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="facebook">Facebook Username</label>
                                                    <input type="text"
                                                        class="form-control @error('facebook') is-invalid @enderror"
                                                        name="facebook"
                                                        value="{{ old('facebook') ? old('facebook') : $sosmed->facebook }}"
                                                        id="facebook" placeholder="Enter facebook name">
                                                    <span class="text-danger" style="font-size: 10px">contoh:
                                                        _varash.id</span>
                                                    @error('facebook')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="twitter">Twitter Username</label>
                                                    <input type="text"
                                                        class="form-control @error('twitter') is-invalid @enderror"
                                                        name="twitter"
                                                        value="{{ old('twitter') ? old('twitter') : $sosmed->twitter }}"
                                                        id="twitter" placeholder="Enter twitter name">
                                                    <span class="text-danger" style="font-size: 10px">contoh:
                                                        _varash.id</span>
                                                    @error('twitter')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="youtube">Link You Tube Channel</label>
                                                    <input type="text"
                                                        class="form-control @error('youtube') is-invalid @enderror"
                                                        name="youtube"
                                                        value="{{ old('youtube') ? old('youtube') : $sosmed->youtube }}"
                                                        id="youtube" placeholder="Enter youtube link">
                                                    @error('youtube')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email"
                                                        value="{{ old('email') ? old('email') : $sosmed->email }}"
                                                        id="email" placeholder="Enter email address">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3 float-end">
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light">Save</button>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
