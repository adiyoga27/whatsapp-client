@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data">Edit User</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-user-header">User</a></li>
                        <li class="breadcrumb-item active" key="t-update-data">Edit User</li>
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
                        <section>
                            <form action="{{ route('user.update', [$user->id]) }}" method="POST">
                                @csrf
                                @method('put')

                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-full_name-input" key="t-full-name">Full
                                                        Name</label>
                                                    <input type="text"
                                                        class="form-control @error('full_name') is-invalid @enderror"
                                                        name="full_name" value="{{ $user->full_name }}"
                                                        id="basicpill-full_name-input" placeholder="Enter the full name">

                                                    @error('full_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phone-input" key="t-table-phone">Phone
                                                        Number</label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" value="{{ $user->phone }}"
                                                        id="basicpill-phone-input" placeholder="Enter the phone number">

                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-username-input" key="t-username">Username</label>
                                                    <input type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        name="username" value="{{ $user->username }}"
                                                        id="basicpill-username-input" placeholder="Enter the full name"
                                                        readonly>

                                                    @error('username')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $user->email }}"
                                                        id="basicpill-email-input" placeholder="Enter the email number">

                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-input" key="t-user-level">User Level</label>

                                                    <select class="form-control @error('level') is-invalid @enderror"
                                                        name="level">
                                                        <option>Select Level</option>
                                                        <option value="user"
                                                            {{ $user->level == 'user' ? 'selected ' : '' }}>User </option>
                                                        <option value="admin"
                                                            {{ $user->level == 'admin' ? 'selected ' : '' }}>Admin
                                                        </option>
                                                        @can('isSuperadmin')
                                                            <option value="superadmin"
                                                                {{ $user->level == 'superadmin' ? 'selected ' : '' }}>
                                                                Superadmin</option>
                                                        @endcan
                                                    </select>
                                                    @error('level')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Password</label>
                                                            <input type="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                id="userpassword" placeholder="Enter password">
                                                            @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Password
                                                                Confirmation</label>
                                                            <input type="password" name="password_confirmation"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                id="userpassword" placeholder="Enter password">
                                                            @error('password_confirmation')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3 float-end">
                                                    <button type="submit" class="btn btn-success"
                                                        key="t-save">Save</button>

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
