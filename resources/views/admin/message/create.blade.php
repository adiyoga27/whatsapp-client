@extends('admin.dashboard-temp')
@section('mycss')
    {{-- <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"> --}}
@endsection
@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-add-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-header-message"></a></li>
                    <li class="breadcrumb-item active" key="t-add-data"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">

                        <section>
                            <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-title-input" key="t-table-title">Title</label>
                                                    <input required type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title" value="{{ old('title') }}"
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
                                                                {{ old('whatsapp_id') == $data->id ? 'selected' : '' }}>
                                                                {{ $data->name }}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('whatsapp_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <input required type="hidden" class="form-control " name="duration"
                                                value="5" id="basicpill-duration-input" placeholder="Enter duration">

                                        </div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">

                                                    <label for="message" key="t-message">message</label>
                                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="15"
                                                        placeholder="Enter message">{{ old('message') }}</textarea>

                                                    @error('message')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Attachment</h5>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="repeater">
                                                    <div data-repeater-list="group-a">
                                                        <div data-repeater-item class="row mb-2">
                                                            <div class="col-lg">
                                                                <input type="file"
                                                                    class="form-control @error('group-a.*.attachment') is-invalid @enderror"
                                                                    id="resume" name="attachment">
                                                            </div>

                                                            <div class="col-lg-2 align-self-center">
                                                                <div class="d-grid">
                                                                    <input data-repeater-delete type="button"
                                                                        class="btn btn-primary" value="Delete" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @error('group-a.*.attachment')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="mt-3">
                                                        <button data-repeater-create type="button"
                                                            class="btn btn-secondary mt-3 mt-lg-0"><i
                                                                class="bx bx-plus"></i></button>
                                                    </div>
                                                </div>
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

@section('javascript')
    <script src="{{ asset('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-repeater.int.js') }}"></script>

    {{-- <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.myDropzone = {
            url: "{{ route('upload.file') }}",
        };
    </script> --}}
    <!-- include FilePond library -->
    {{-- <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script>
        $(function() {

            // First register any plugins
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            // Turn input element into a pond
            $('.my-pond').filepond();

            // Set allowMultiple property to true
            $('.my-pond').filepond('allowMultiple', true);

            // Listen for addfile event
            $('.my-pond').on('FilePond:addfile', function(e) {
                console.log('file added event', e);
            });


        });
    </script> --}}
@endsection
