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
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <form action="{{ route('attach.update', [$attach->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="message_id" value="{{ $message_id }}">
                                <input type="hidden" name="fileLama" value="{{ $attach->url }}">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="row ">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-book-category-input" key="t-type"></label>

                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        name="type" id="select-file">
                                                        <option>Select File Type</option>
                                                        <option value="images"
                                                            {{ (old('type') == 'images' ? 'selected' : $attach->type == 'images') ? 'selected' : '' }}>
                                                            Image
                                                        </option>
                                                        <option value="videos"
                                                            {{ (old('type') == 'videos' ? 'selected' : $attach->type == 'videos') ? 'selected' : '' }}>
                                                            Video
                                                        </option>
                                                        <option value="file"
                                                            {{ (old('type') == 'file' ? 'selected' : $attach->type == 'file') ? 'selected' : '' }}>
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

                            </form>
                        </div>
                        <div class="col-lg">
                            @if ($attach->type == 'images')
                                <img src="{{ asset('storage/' . $attach->url) }}" width="400" alt="">
                            @elseif ($attach->type == 'videos')
                                <video src="{{ asset('storage/' . $attach->url) }}" width="400"></video>
                            @elseif ($attach->type == 'file')
                                <iframe src="{{ asset('storage/' . $attach->url) }}" frameborder="0" width="400"
                                    height="220"></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
