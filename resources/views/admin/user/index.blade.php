@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-user-sub-header">All User</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-user-header">User</a></li>
                    <li class="breadcrumb-item active" key="t-user-sub-header">All User</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.flash-message')
                    <div class="button-create mb-3 text-end">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> <span
                                key="t-add">Add New</span></a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th key="t-full-name">Full Name</th>
                                    <th key="t-username">Username</th>
                                    <th key="t-table-phone">Phone Number</th>
                                    <th key="">Email</th>
                                    <th key="t-user-level">User Level</th>
                                    <th key="t-table-action">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->full_name }}</td>
                                        <td>{{ $data->username }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            {{ $data->level }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                        
                                                <a href="{{ route('user.edit', [$data->id]) }}"
                                                    class="btn btn-success me-2"><i class="bx bx-edit-alt"></i> <span
                                                        key="t-edit">Custom</span></a>
                                                <form action="" id="form-delete" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        data-softdeletedurl="{{ route('user.destroy', [$data->id]) }}"
                                                        class="btn btn-danger me-2" id="delete-btn"><i
                                                            class="bx bx-trash-alt"></i> <span
                                                            key="t-delete">Delete</span></button>
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
        </div> <!-- end col -->
    </div> <!-- end row -->


    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="access-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="access-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="message-modalLabel"><span key="">WhatsApp</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <form action="" method="POST" id="form-whatsapp-access">
                                @csrf

                                <ul class="list-group">
                                    <div id="whatsapp-list">
                                    </div>

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
@endsection
