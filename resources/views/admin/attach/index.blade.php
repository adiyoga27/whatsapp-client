@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-attachment"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-attachment"></a></li>
                    <li class="breadcrumb-item active" key="t-attachment"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <form action="{{ route('attach.upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="message_id" value="{{ $message_id }}">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-book-category-input" key="t-type"></label>

                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        name="type" id="select-file">
                                                        <option>Select File Type</option>
                                                        <option value="images"
                                                            {{ old('type') == 'images' ? 'selected' : '' }}>Image
                                                        </option>
                                                        <option value="videos"
                                                            {{ old('type') == 'videos' ? 'selected' : '' }}>Video
                                                        </option>
                                                        <option value="file"
                                                            {{ old('type') == 'file' ? 'selected' : '' }}>
                                                            File
                                                    </select>

                                                    @error('type')
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
                                                    <label for="file-input" key="t-choose-file">Choose
                                                        File</label>
                                                    <input type="file"
                                                        class="form-control @error('url') is-invalid @enderror"
                                                        name="url" value="{{ old('url') }}" id="file-input">
                                                    @error('url')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light"
                                                key="t-save">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                {{-- <div class="row">
                                    <div class="col-md">
                                        <div id="file-preview">
                                        </div>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="table-responsive">
                                    @include('admin.flash-message')
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0" id="datatable">

                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>File</th>
                                                    <th key="t-type">Tipe</th>
                                                    <th key="t-table-action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attach as $val)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>
                                                            @if ($val->type == 'images')
                                                                <img src="{{ asset('storage/' . $val->url) }}"
                                                                    width="80" alt="">
                                                            @elseif ($val->type == 'videos')
                                                                <video src="{{ asset('storage/' . $val->url) }}"
                                                                    width="80"></video>
                                                            @elseif ($val->type == 'file')
                                                                <iframe src="{{ asset('storage/' . $val->url) }}"
                                                                    frameborder="0" width="80" height="90"></iframe>
                                                            @endif
                                                        </td>
                                                        <td>{{ $val->type }}</td>
                                                        <td class="">
                                                            <div class="d-flex">
                                                                <a href="{{ route('attach.edit', [$val->id]) }}"
                                                                    class="btn btn-success waves-effect waves-light me-2"
                                                                    key="t-edit">Custom</a>
                                                                <form action="" id="form-delete" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger waves-effect waves-light"
                                                                        data-softdeletedurl="{{ route('attach.destroy', [$val->id]) }}"
                                                                        id="delete-btn" key="t-delete">Delete</button>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
