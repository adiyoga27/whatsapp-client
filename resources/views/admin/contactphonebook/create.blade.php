@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-add-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-phonebook"></a></li>
                    <li class="breadcrumb-item active" key="t-add-data"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">

                        <section>
                            <form action="{{ route('contact-phonebook.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="phonebook_id" value="{{ $phonebook_id }}">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-name-input" key="t-table-name">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" id="basicpill-name-input"
                                                        placeholder="Enter name">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-phone-input" key="t-phone-number">phone</label>
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
