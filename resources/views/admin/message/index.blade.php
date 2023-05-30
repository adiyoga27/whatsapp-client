@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-sub-header-message"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-header-message"></a></li>
                    <li class="breadcrumb-item active" key="t-sub-header-message"></li>
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
                            <a href="{{ route('message.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                <span key="t-add"> Add New</span></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-name">Name</th>
                                        <th key="t-table-title">Title</th>
                                        <th key="t-message">Message</th>
                                        {{-- <th key="t-duration">Duration</th> --}}
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($message as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->whatsapp->name }}</td>
                                            <td>
                                                {{ $val->title }}
                                            </td>
                                            <td>{{ Str::limit($val->message, 80, '...') }}</td>
                                            {{-- <td>{{ $val->duration }}</td> --}}
                                            <td class="">
                                                <div class="d-flex">
                                                    <a href="{{ route('queue.index', [$val->id]) }}"
                                                        style="width: max-content"
                                                        class="btn btn-dark waves-effect waves-light me-2"><i
                                                            class="bx bx-paper-plane"></i> <span key="t-send"></span></a>
                                                    {{-- <button class="btn btn-info waves-effect waves-light me-2"
                                                        id="btn-message-view"
                                                        data-message-view-url="{{ route('message.show', [$val->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#message-modal"><i
                                                            class="bx bx-file-find"></i></button> --}}

                                                    <a href="{{ route('message.edit', [$val->id]) }}"
                                                        style="width: max-content"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span key="t-edit"></span></a>
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            style="width: max-content"
                                                            data-softdeletedurl="{{ route('message.destroy', [$val->id]) }}"
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


    <!-- Static Backdrop Modal -->
    {{-- <div class="modal fade" id="message-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="message-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="message-modalLabel"><span key="t-header-message">Message Detail</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-name">Name</label><br>
                                    <span id="message-name"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-title">title</label><br>
                                    <span id="message-title"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-duration">duration</label><br>
                                    <span id="message-duration"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-message">message</label><br>
                                    <span id="message-message"></span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
