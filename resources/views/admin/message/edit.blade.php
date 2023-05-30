@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-header-message"></a></li>
                    <li class="breadcrumb-item active" key="t-update-data"></li>
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
                            <form action="{{ route('message.update', [$message->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-title-input" key="t-table-title">Title</label>
                                                    <input required type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title"
                                                        value="{{ old('title') ? old('title') : $message->title }}"
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
                                                                {{ old('whatsapp_id') == $data->id ? 'selected' : ($message->whatsapp_id == $data->id ? 'selected' : '') }}>
                                                                {{ $data->name }}</option>
                                                        @endforeach

                                                    </select>

                                                    @error('whatsapp_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-duration-input" key="t-duration">Duration</label>
                                                    <input required type="number"
                                                        class="form-control @error('duration') is-invalid @enderror"
                                                        name="duration"
                                                        value="{{ old('duration') ? old('duration') : $message->duration }}"
                                                        id="basicpill-duration-input" placeholder="Enter duration">
                                                    @error('duration')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}
                                            <input required type="hidden" class="form-control " name="duration"
                                                value="5" id="basicpill-duration-input" placeholder="Enter duration">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="mb-3">

                                                        <label for="message" key="t-message">message</label>
                                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="15"
                                                            placeholder="Enter message">{{ old('message') ? old('message') : $message->message }}</textarea>

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
                                    <div class="row mb-3">
                                        <div class="col-lg">
                                            <div class="float-end">
                                                <button type="submit" class="btn btn-success waves-effect waves-light"
                                                    key="t-save">Save</button>

                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <hr>
                            <h5>Your Attachment</h5>
                            <div class="row">
                                <div class="col-md">
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">

                                            <thead>
                                                <tr>
                                                    <th>File</th>
                                                    <th key="t-type">Tipe</th>
                                                    <th key="t-table-action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attach as $val)
                                                    <tr>

                                                        <td>
                                                            @if ($val->type == 'images')
                                                                <img src="{{ asset('storage/' . $val->url) }}"
                                                                    width="80" alt="">
                                                            @elseif ($val->type == 'videos')
                                                                <video src="{{ asset('storage/' . $val->url) }}"
                                                                    width="80"></video>
                                                            @elseif ($val->type == 'file')
                                                                @if (explode('.', $val->url)[1] == 'xlsx')
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                        y="0px" width="48" height="48"
                                                                        viewBox="0 0 48 48">
                                                                        <path fill="#4CAF50"
                                                                            d="M41,10H25v28h16c0.553,0,1-0.447,1-1V11C42,10.447,41.553,10,41,10z">
                                                                        </path>
                                                                        <path fill="#FFF"
                                                                            d="M32 15H39V18H32zM32 25H39V28H32zM32 30H39V33H32zM32 20H39V23H32zM25 15H30V18H25zM25 25H30V28H25zM25 30H30V33H25zM25 20H30V23H25z">
                                                                        </path>
                                                                        <path fill="#2E7D32" d="M27 42L6 38 6 10 27 6z">
                                                                        </path>
                                                                        <path fill="#FFF"
                                                                            d="M19.129,31l-2.411-4.561c-0.092-0.171-0.186-0.483-0.284-0.938h-0.037c-0.046,0.215-0.154,0.541-0.324,0.979L13.652,31H9.895l4.462-7.001L10.274,17h3.837l2.001,4.196c0.156,0.331,0.296,0.725,0.42,1.179h0.04c0.078-0.271,0.224-0.68,0.439-1.22L19.237,17h3.515l-4.199,6.939l4.316,7.059h-3.74V31z">
                                                                        </path>
                                                                    </svg>
                                                                @elseif (explode('.', $val->url)[1] == 'pdf')
                                                                    <img
                                                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACIklEQVR4nO3Xz0sUYRzH8flX/EWidkihgymeBDt4dbRskTLBxENkIBGUEGR2i4oQC0IXL+IhCnQR0VsImh6ENsNCyeUxYoksf637jseHddLFIvN5dh96PjDM7GHh+5r5PvN9xvNcXPQGPxctR11Ot7WAZOsZcwg0ALbfzpK8UmEGoQUgYuYQ6AKYQqATIAwgtAOEZoQRgNCIMAYQmhBGAUIDwjhA7EdkJeBvDs8BfPcEsK+F7oRgZRF+rEG420LAlxh7Se5Aa7lFgEulQfHzr9W557JFgPMnYCehCl9+ZyHAz4UP80H7yHTWWgYI3wvaKJGAULFlgOYy2NpQgPdzRy6ejE7imXEFiE5DfZ5lgIYCiK8GbdR308JBJrO9tXvaHWjtVRYBJoZU4cMPYSqirmMfoeW0BYDmMtj4rmZBWyVcPAXLCwqx8EY9nWe3YeQ5jA1CJAyPrsG5giwBDD1QxcpFLH931EBkgD9mcjgLAE0n4VtcFRSdAbG0v8jUmkhlZRGWoup6cz3DALmFeNmXfmdl+7zoha4GaCxUQ04u6oOZncwQoD4fem/A509BMbJA2d+HbSHkhu9xB7x6CqP96v+hkgwArlarhflr5OSVrXSUt5dvEnCrDta+pvf49bPHVjzaAHLSplomLoJd5+D9Yy0ebYALRelvFDm8/mHPg/EWetKp7r78fOy/e+ggyl6Ab+bwHMB3TwDXQv91C7m4eL/NT9rWaYTkzttuAAAAAElFTkSuQmCC">
                                                                @elseif (explode('.', $val->url)[1] == 'docx')
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                        y="0px" width="48" height="48"
                                                                        viewBox="0 0 48 48">
                                                                        <path fill="#2196F3"
                                                                            d="M41,10H25v28h16c0.553,0,1-0.447,1-1V11C42,10.447,41.553,10,41,10z">
                                                                        </path>
                                                                        <path fill="#FFF"
                                                                            d="M25 15.001H39V17H25zM25 19H39V21H25zM25 23.001H39V25.001H25zM25 27.001H39V29H25zM25 31H39V33.001H25z">
                                                                        </path>
                                                                        <path fill="#0D47A1" d="M27 42L6 38 6 10 27 6z">
                                                                        </path>
                                                                        <path fill="#FFF"
                                                                            d="M21.167,31.012H18.45l-1.802-8.988c-0.098-0.477-0.155-0.996-0.174-1.576h-0.032c-0.043,0.637-0.11,1.162-0.197,1.576l-1.85,8.988h-2.827l-2.86-14.014h2.675l1.536,9.328c0.062,0.404,0.111,0.938,0.143,1.607h0.042c0.019-0.498,0.098-1.051,0.223-1.645l1.97-9.291h2.622l1.785,9.404c0.062,0.348,0.119,0.846,0.17,1.511h0.031c0.02-0.515,0.073-1.035,0.16-1.563l1.503-9.352h2.468L21.167,31.012z">
                                                                        </path>
                                                                    </svg>
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                                                        y="0px" width="50" height="50"
                                                                        viewBox="0 0 50 50">
                                                                        <path
                                                                            d="M 30.398438 2 L 7 2 L 7 48 L 43 48 L 43 14.601563 Z M 30 15 L 30 4.398438 L 40.601563 15 Z">
                                                                        </path>
                                                                    </svg>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>{{ $val->type }}</td>
                                                        <td class="">
                                                            <div class="d-flex">
                                                                {{-- <form
                                                                                action="{{ route('message.attachment.delete', [$val->id]) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button
                                                                                    class="btn btn-danger waves-effect waves-light"
                                                                                    style="width: max-content"><i
                                                                                        class="bx bx-trash-alt"></i> <span
                                                                                        key="t-delete"></span></button>
                                                                            </form> --}}
                                                                <form action="" id="form-delete" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger waves-effect waves-light"
                                                                        data-softdeletedurl="{{ route('message.attachment.delete', [$val->id]) }}"
                                                                        id="delete-btn"><i
                                                                            class="bx bx-trash-alt"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    <script>
        $(document).on('click', '#delete-btn-attachment', function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure?',
                text: "This data will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    $('#form-delete-attachment').submit()
                }
            })
        })
    </script>
@endsection
