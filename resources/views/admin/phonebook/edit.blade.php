@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-phonebook"></a></li>
                    <li class="breadcrumb-item active" key="t-update-data"></li>
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
                            <form action="{{ route('phonebook.update', [$phonebook->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-title-input" key="t-table-title">Title</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title"
                                                        value="{{ old('title') ? old('title') : $phonebook->title }}"
                                                        id="basicpill-title-input" placeholder="Enter title">
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-book-category-input">WhatsApp</label>

                                                    <select class="form-control @error('whatsapp_id') is-invalid @enderror"
                                                        name="whatsapp_id">
                                                        <option>Select Whatsapp</option>
                                                        @foreach ($whatsapp as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ old('whatsapp_id') == $data->id ? 'selected' : ($phonebook->whatsapp_id == $data->id ? 'selected' : '') }}>
                                                                {{ $data->name }}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('whatsapp_id')
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
