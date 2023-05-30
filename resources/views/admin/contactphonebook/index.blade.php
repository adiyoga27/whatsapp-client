@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-phonebook-sub-header"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-contact-header"></a></li>
                    <li class="breadcrumb-item active" key="t-phonebook-sub-header"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.flash-message')
                        <div class="button-create mb-3 text-end">
                            <button class="mx-1 btn btn-success" id="btn-excel-view" data-bs-toggle="modal"
                                data-bs-target="#excel-modal"><i class="bx bx-import"></i>
                                <span> Import Excel</span></button>
                            <a href="{{ route('contact-phonebook.create', [$phonebook_id]) }}" class="btn btn-primary"><i
                                    class="bx bx-plus"></i>
                                <span key="t-add"> Add New</span></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-name">Name</th>
                                        <th key="t-table-phone">Phone Number</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->name }}</td>
                                            <td>
                                                {{ $val->phone }}
                                            </td>
                                            <td class="">
                                                <div class="d-flex">
                                                    <a href="{{ route('contact-phonebook.edit', [$val->id]) }}"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span key="t-edit"></span></a>
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            data-softdeletedurl="{{ route('contact-phonebook.destroy', [$val->id]) }}"
                                                            id="delete-btn"><i class="bx bx-trash-alt"></i> <span
                                                                key="t-delete"></span></button>
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


    {{-- excel --}}
    <div class="modal fade" id="excel-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="excel-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product-modalLabel">Import From Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <form action="{{ route('contact-phonebook.import-excel', [$phonebook_id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3 d-block">
                                            <label class="d-block">File Example</label>
                                            <a href="{{ route('queue.excel-download') }}" class="btn btn-link">Excel
                                                Example Data</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="basicpill-title-input" key="t-select-option">Name</label>
                                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                                name="file" value="{{ old('file') }}" id="basicpill-file-input"
                                                placeholder="Enter file">
                                            @error('file')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="button-action text-end mt-1">
                                    <button type="submit" class="btn btn-success" key="t-save">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
