@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-queue"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-queue"></a></li>
                    <li class="breadcrumb-item active" key="t-queue"></li>
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
                        <div class="col-lg">
                            <div class="message-box mb-3">
                                <h5 key="t-message">Message</h5>
                                <hr>
                                <textarea name="message" class="form-control" id="message" rows="14" readonly>{{ $message->message }}</textarea>
                            </div>
                            <div class="message-box mb-3">
                                <h5 key="t-file-attach">File Attachment</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                    <div class="text-body" style="cursor: pointer;" id="btn-file-image-view"
                                                        data-file="{{ json_encode($images) }}" data-bs-toggle="modal"
                                                        data-bs-target="#file-image-modal">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-success font-size-20">
                                                                        <i class="mdi mdi-image"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Images</h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        {{ count($images) }} Files</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                    <div class="text-body" style="cursor: pointer;" id="btn-file-video-view"
                                                        data-file="{{ json_encode($videos) }}" data-bs-toggle="modal"
                                                        data-bs-target="#file-video-modal">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-danger font-size-20">
                                                                        <i class="mdi mdi-play-circle-outline"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Video</h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        {{ count($videos) }} Files</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                    <div class="text-body" style="cursor: pointer;" id="btn-file-view"
                                                        data-file="{{ json_encode($file) }}" data-bs-toggle="modal"
                                                        data-bs-target="#file-modal">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-primary font-size-20">
                                                                        <i class="mdi mdi-file-document"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Document
                                                                    </h5>
                                                                    <p class="text-muted text-truncate mb-0">
                                                                        {{ count($file) }} Files</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="message-box mb-3">
                                <h5 key="t-message">Status</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                        <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                <div class="text-body">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-primary font-size-20">
                                                                        <i class="mdi mdi-account-multiple"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Total</h5>
                                                                    <p class="text-muted text-truncate mb-0  st-all">
                                                                        0 Orang</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                <div class="text-body">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-secondary font-size-20">
                                                                        <i class="mdi mdi-book-open"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Belum Dikirim</h5>
                                                                    <p class="text-muted text-truncate mb-0  st-pending">
                                                                        0 Orang</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                    <div class="text-body">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-warning font-size-20">
                                                                        <i class="mdi mdi-cached"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Sedang Dikirim</h5>
                                                                    <p class="text-muted text-truncate mb-0  st-progress">
                                                                        0 Orang</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                <div class="text-body">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-danger font-size-20">
                                                                        <i class="mdi mdi-close-circle"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Gagal</h5>
                                                                    <p class="text-muted text-truncate mb-0  st-failed">
                                                                        0 Orang</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card border shadow-none mb-2">
                                                <div class="text-body">
                                                        <div class="p-2">
                                                            <div class="d-flex">
                                                                <div class="avatar-xs align-self-center me-2">
                                                                    <div
                                                                        class="avatar-title rounded bg-transparent text-success font-size-20">
                                                                        <i class="mdi mdi-checkbox-marked-circle"></i>
                                                                    </div>
                                                                </div>

                                                                <div class="overflow-hidden me-auto">
                                                                    <h5 class="font-size-13 text-truncate mb-1">Terkirim</h5>
                                                                    <p class="text-muted text-truncate mb-0 st-success">
                                                                        0 Orang</p>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                    <div class="button-create mb-3 text-start d-flex">
                        <a href="" class="mx-1 btn btn-primary" id="btn-manual-add-view" data-bs-toggle="modal"
                            data-bs-target="#manual-add-modal"><i class="bx bx-plus"></i>
                            <span> Add Manual</span></a>
                        <button class="mx-1 btn btn-info" id="btn-phonebook-view" data-bs-toggle="modal"
                            data-bs-target="#phonebook-modal"><i class="bx bx-import"></i>
                            <span> Import Phonebook</span></button>
                        <button class="mx-1 btn btn-success" id="btn-excel-view" data-bs-toggle="modal"
                            data-bs-target="#excel-modal"><i class="bx bx-import"></i>
                            <span> Import Excel</span></button>
                        <form action="" id="form-delete" method="post">
                            @csrf
                            @method('delete')
                            <button class="mx-1 btn btn-danger waves-effect waves-light"
                                data-softdeletedurl="{{ route('queue.delete', [$message->id]) }}" id="delete-btn"><i
                                    class="bx bx-trash-alt"></i> <span key="t-delete-queue">Delete All
                                    Queue</span></button>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg">
                            <div class="table-responsive">
                                @include('admin.flash-message')

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 datatable" id="datatable">

                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th key="t-table-name">Name</th>
                                                <th key="t-table-phone">Phone</th>
                                                <th key="t-status">Status</th>
                                                <th key="">Keterangan</th>
                                                <th key="t-table-action">action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($queue as $val)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $val->name }}</td>
                                                    <td>
                                                        {{ $val->phone }}
                                                    </td>
                                                    <td>
                                                        @if ($val->status == 'success')
                                                            <span
                                                                class="badge badge-pill badge-soft-success font-size-11">{{ strtoUpper($val->status) }}</span>
                                                        @elseif ($val->status == 'pending')
                                                            <span
                                                                class="badge badge-pill badge-soft-warning font-size-11">{{ strtoUpper($val->status) }}</span>
                                                        @elseif ($val->status == 'progress')
                                                            <span
                                                                class="badge badge-pill badge-soft-info font-size-11">{{ strtoUpper($val->status) }}</span>
                                                        @elseif ($val->status == 'failed')
                                                            <span
                                                                class="badge badge-pill badge-soft-danger font-size-11">{{ strtoUpper($val->status) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ empty(json_decode($val->response)->message) ? '-' : json_decode($val->response)->message }}
                                                    </td>
                                                    <td class="">
                                                        <div class="d-flex">
                                                
                                                            <button class="btn btn-success waves-effect waves-light me-2"
                                                                id="btn-queue-data-view"
                                                                data-queue-data-view-url="{{ route('queue.edit', [$val->id]) }}"
                                                                data-queue-update-url="{{ route('queue.update', [$val->id]) }}"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#queue-data-modal"><i
                                                                    class="bx bx-edit-alt"></i></button>
                                                            <form action="" id="form-delete" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger waves-effect waves-light"
                                                                    data-softdeletedurl="{{ route('queue.destroy', [$val->id]) }}"
                                                                    id="delete-btn"><i
                                                                        class="bx bx-trash-alt"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-lg text-end">
                           
                               
                                @if ($isSending)
                                    <button type="button" id="btn-stop" class="btn btn-danger">
                                    <i class='bx bx-stop-circle'></i>
                                    <span key="t-send">Batalkan</span></button>
                                    <button type="button" class="btn btn-warning"><div class="spinner-border text-light  spinner-border-sm" role="status" disabled></div>
                                    <span key="t-send">Sedang Mengirim</span></button>
                                @else
                                <button type="button" id="btn-send-message" class="btn btn-success"><i
                                    class="bx bx-paper-plane"></i>
                                <span key="t-send">Kirim</span></button>
                                @endif
                               
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>

    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="phonebook-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="phonebook-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product-modalLabel">Import From Phonebook</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <form action="{{ route('queue.importphonebook') }}" method="POST">
                                @csrf
                                <input type="hidden" name="message_id" value="{{ $message->id }}">
                                <ul class="list-group">
                                    @for ($i = 0; $i < count($phonebook); $i++)
                                        <li class="list-group-item">
                                            <div class="form-check form-check-primary">
                                                <input class="form-check-input" type="checkbox"
                                                    id="formCheckcolor{{ $i }}" name="phonebook[]"
                                                    value="{{ $phonebook[$i]->id }}">
                                                <label class="form-check-label" for="formCheckcolor{{ $i }}">
                                                    {{ $phonebook[$i]->title }}
                                                </label>
                                            </div>
                                        </li>
                                    @endfor

                                </ul>
                                <div class="button-action text-end mt-3">
                                    <button type="submit" class="btn btn-success" key="t-save">Save</button>
                                </div>
                            </form>
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
                            <form action="{{ route('queue.importexcel') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="message_id" value="{{ $message->id }}">
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

    <div class="modal fade" id="manual-add-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="manual-add-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product-modalLabel" key="t-add-data">Add Manual</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <form action="{{ route('queue.store-manual') }}" method="POST">
                                @csrf
                                <input type="hidden" name="message_id" value="{{ $message->id }}">
                                <input type="hidden" name="status" value="pending">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="basicpill-name-input" key="t-table-name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="basicpill-name-input"
                                                placeholder="Enter name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="basicpill-phone-input" key="t-phone-number">Phone</label>
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" id="basicpill-phone-input"
                                                placeholder="Enter phone number" required>
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="basicpill-product-category-input" key="">Status</label>

                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status">
                                                <option key="t-select">Select Category</option>
                                                <option value="pending"></option>

                                            </select>
                                            @error('category_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
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


    <div class="modal fade" id="queue-data-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="queue-data-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product-modalLabel" key="t-update-data">Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <form action="" method="POST" id="form-update">
                                @csrf
                                @method('put')
                                <input type="hidden" name="message_id" value="{{ $message->id }}">
                                <input type="hidden" name="status" value="" id="status-input">
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="input-name-queue" key="t-table-name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="input-name-queue"
                                                placeholder="Enter name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="input-phone-queue" key="t-phone-number">Phone</label>
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" id="input-phone-queue"
                                                placeholder="Enter phone number" required>
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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



    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="file-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="file-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="message-modalLabel">Document </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row content-image">
                        @if (!$file->isEmpty())
                            @foreach ($file as $val)
                                <div class="col-sm-1">
                                    @if (explode('.', $val->url)[1] == 'xlsx')
                                    <a href="{{url('storage/'.$val->url)}}"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="48" height="48" viewBox="0 0 48 48">
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
                                    </a>
                                    @elseif (explode('.', $val->url)[1] == 'pdf')
                                       <a href="{{url('storage/'.$val->url)}}"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACIklEQVR4nO3Xz0sUYRzH8flX/EWidkihgymeBDt4dbRskTLBxENkIBGUEGR2i4oQC0IXL+IhCnQR0VsImh6ENsNCyeUxYoksf637jseHddLFIvN5dh96PjDM7GHh+5r5PvN9xvNcXPQGPxctR11Ot7WAZOsZcwg0ALbfzpK8UmEGoQUgYuYQ6AKYQqATIAwgtAOEZoQRgNCIMAYQmhBGAUIDwjhA7EdkJeBvDs8BfPcEsK+F7oRgZRF+rEG420LAlxh7Se5Aa7lFgEulQfHzr9W557JFgPMnYCehCl9+ZyHAz4UP80H7yHTWWgYI3wvaKJGAULFlgOYy2NpQgPdzRy6ejE7imXEFiE5DfZ5lgIYCiK8GbdR308JBJrO9tXvaHWjtVRYBJoZU4cMPYSqirmMfoeW0BYDmMtj4rmZBWyVcPAXLCwqx8EY9nWe3YeQ5jA1CJAyPrsG5giwBDD1QxcpFLH931EBkgD9mcjgLAE0n4VtcFRSdAbG0v8jUmkhlZRGWoup6cz3DALmFeNmXfmdl+7zoha4GaCxUQ04u6oOZncwQoD4fem/A509BMbJA2d+HbSHkhu9xB7x6CqP96v+hkgwArlarhflr5OSVrXSUt5dvEnCrDta+pvf49bPHVjzaAHLSplomLoJd5+D9Yy0ebYALRelvFDm8/mHPg/EWetKp7r78fOy/e+ggyl6Ab+bwHMB3TwDXQv91C7m4eL/NT9rWaYTkzttuAAAAAElFTkSuQmCC"
                                            width="48"> </a>
                                    @elseif (explode('.', $val->url)[1] == 'docx')
                                    <a href="{{url('storage/'.$val->url)}}">    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="48" height="48" viewBox="0 0 48 48">
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
                                    </a>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                            width="50" height="50" viewBox="0 0 50 50">
                                            <path
                                                d="M 30.398438 2 L 7 2 L 7 48 L 43 48 L 43 14.601563 Z M 30 15 L 30 4.398438 L 40.601563 15 Z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h5>Tidak ada file!</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="file-video-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="file-video-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="message-modalLabel">Video </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row content-image">
                        @if (!$videos->isEmpty())
                            @foreach ($videos as $val)
                                <div class="col-sm-2">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAyUlEQVR4nO2WwQ2DQAwE50sb9HM9pad0EJQyUkeeG/HgBCJIURQwvuxI/vjl9a4PwBjzCXdASWuYC1HyqqwaG72z9WUhJHFESasSPYiFYEcIj5F8I8RvXHaE+C3LjvC7DRXg0YIjIx1wAZ7ZhUz0wLUFIRN7xu1QIXvG7XAhe8WtYiH8YbRK9mPvsz+/XQsfxNLKL4oOrkr0IBaCHSE8RvKNEL9x2RHityw7wpLVG33Cvra+I9GDjVgILR37cIJhvq3bXIgxhre8AIZU6IaKTHx5AAAAAElFTkSuQmCC"
                                        width="50">
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h5>Tidak ada video!</h5>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="file-image-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="file-image-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="message-modalLabel">Image </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row content-image">

                        @if (!$images->isEmpty())
                            @foreach ($images as $val)
                                <div class="col-sm-3">
                                    <img src="{{ asset('storage/' . $val->url) }}" class="mb-2" alt="img"
                                        width="100%">
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h5>Tidak ada gambar!</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#datatable').DataTable({
        // ajax: "{{url('admin/queue/list/')}}/{{$id}}",
        ajax: {
            url: "{{url('admin/queue/list/')}}/{{$id}}",
            type: "GET",
            dataType: "json",
            dataSrc: function(response) {
                document.querySelector('.st-all').textContent = response.data.status.all+" Orang";
                document.querySelector('.st-success').textContent = response.data.status.success+" Orang";
                document.querySelector('.st-pending').textContent = response.data.status.pending+" Orang";
                document.querySelector('.st-progress').textContent = response.data.status.progress+" Orang";
                document.querySelector('.st-failed').textContent = response.data.status.failed+" Orang";
                return response.data.queue; // Set the data source to "queue" array in the response
            }
        },
        dataSrc: 'data.queue',
        columns: [
            
            {
            data: null,
                render: function(data, type, row, meta) {
                // Calculate the row index
                var rowIndex = meta.row + meta.settings._iDisplayStart + 1;
                return rowIndex;
                }
            },
          
            {
                data: 'name',
            },
            {
                data: 'phone',
            },
            {
                data: 'status',
                render: function(data, type, full, meta) {
                    if(data == 'success'){
                        return '<button class="btn btn-success" type="button" disabled> Terkirim </button>';

                    }else if (data == 'pending'){
                        return '<button class="btn btn-secondary" type="button" disabled> Belum Terkirim </button>';

                    }else if (data == 'progress' || data == 'ongoing'){
                        return '<button class="btn btn-warning" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim </button>';

                    }else if (data == 'failed'){
                        return '<button class="btn btn-danger" type="button" disabled> Gagal </button>';


                    }
                  
                }
            },
            
            {
                data: 'response',
                render: function(data, type, full, meta) {
                    return data;
                }
            },
            {
                data: 'id',
                name: 'id',
                render: function(data, type, full, meta) {
                    return `<div class="d-flex"><button class="btn btn-success waves-effect waves-light me-2"
                                                    id="btn-queue-data-view"
                                                    data-queue-data-view-url="{{ url('admin/queue/edit') }}/`+data+`"
                                                    data-queue-update-url="{{ url('admin/queue/update') }}/`+data+`"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#queue-data-modal"><i
                                                        class="bx bx-edit-alt"></i></button>
                                                <form action="" id="form-delete" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger waves-effect waves-light"
                                                        data-softdeletedurl="{{ url('admin/queue/destroy') }}/`+data+`"
                                                        id="delete-btn"><i
                                                            class="bx bx-trash-alt"></i></button>
                                                </form>
                                            </div>`
                }
            },
        ]
    });

    function refreshTable() {
        table.ajax.reload(null, false); // false menghindari perubahan halaman
    }

    setInterval(refreshTable, 5000);
});
    

        $(document).on('click', '#btn-send-message', function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure?',
                text: "The message will send to all data on queue",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Sending!',
                        'Sending message on progress!',
                        'success'
                    )
                    window.location.href = "{{ route('send-message', [$message->id]) }}";
                }
            })
        })

        $(document).on('click', '#btn-stop', function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Are you sure?',
                text: "Anda akan menghentikan pesan ini !!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('stop-message', $id) }}",
                        type: 'POST',
                        data: {
                            // Include your POST data here
                        },
                        success: function(response) {
                            // Reload the DataTable after the POST request is completed
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle error if needed
                        }
                    });
                   
                }
            })
        })

        // $(document).on('click', '#btn-file-view', function() {
        //     let file = $(this).data('file')
        //     $('.content-image').empty()
        //     $.each(file, function(i, item) {
        //         $('.content-image').append(
        //             `<div class="col-sm-3"><img src="/storage/${item.url}" width="100%" alt=""></div>`
        //         )
        //     })
        // })
    </script>
@endsection
