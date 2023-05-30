@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-whatsapp-header"></a></li>
                    <li class="breadcrumb-item active" key="t-update-data"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">

                        <section>
                            <form action="{{ route('whatsapp.update', [$whatsapp->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-title-input" key="t-table-name">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name"
                                                        value="{{ old('name') ? old('name') : $whatsapp->name }}"
                                                        id="basicpill-name-input" placeholder="Enter name">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-url-input" key="t-table-url">URL</label>
                                                    <input type="text"
                                                        class="form-control @error('url') is-invalid @enderror"
                                                        name="url"
                                                        value="{{ old('url') ? old('url') : $whatsapp->url }}"
                                                        id="basicpill-url-input" placeholder="Enter url link"
                                                        @can('isAdmin')
                                                        readonly
                                                        @endcan>
                                                    @error('url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Active/Deactivate</label>

                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '1' ? 'checked' : ($whatsapp->is_active == 1 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio1"
                                                            value="1">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '0' ? 'checked' : ($whatsapp->is_active == 0 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio2"
                                                            value="0">
                                                        <label class="form-check-label" for="inlineRadio2">Non
                                                            Active</label>
                                                    </div>

                                                    @error('is_active')
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
