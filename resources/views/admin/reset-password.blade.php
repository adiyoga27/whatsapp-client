@extends('layouts.main')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">

                                        <h5 class="text-primary fs-3" key="t-reset-password">Reset Password</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                @include('admin.flash-message')

                                <form class="form-horizontal" method="POST" action="{{ route('reset.password.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label for="old_password" class="form-label" key="t-old-password">Old
                                                    Password</label>
                                                <input type="password" name="old_password"
                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                    id="old_password" placeholder="Enter old password">

                                                @error('old_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label for="basicpill-password-input" key="t-new-password">password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" value="{{ old('password') }}"
                                                    id="basicpill-password-input" placeholder="Enter password ">

                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label for="basicpill-password_confirmation-input" key="t-password-conf"
                                                    key="t-password-conf">Password
                                                    Confirmation</label>
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                    id="basicpill-password_confirmation-input"
                                                    placeholder="Enter password confirmation">

                                                @error('password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light"
                                            type="submit">Reset</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mb-0"><a href="{{ route('dashboard') }}" class="text-primary">
                                <button class="btn btn-link w-md waves-effect waves-light">Back to Dashboard</button>
                            </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
