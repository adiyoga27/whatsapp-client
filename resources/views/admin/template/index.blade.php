@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Template</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Template</a></li>
                    <li class="breadcrumb-item active">Template</li>
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
                            @can('isSuperadmin')
                                <a href="{{ route('template.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                    <span key="t-add">Add
                                        New</span></a>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-name">Name</th>
                                        <th key="t-table-status">Status</th>
                                        <th key="t-">Thumbnail</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->is_active == 1)
                                                    <span
                                                        class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-11">Non
                                                        Active</span>
                                                @endif
                                            </td>

                                            <td>
                                                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="img"
                                                    width="50" height="60">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('template.edit', [$item->id]) }}"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span
                                                            key="t-edit">custom</span></a>
                                                    @can('isSuperadmin')
                                                        <form action="" id="form-delete" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger waves-effect waves-light"
                                                                data-softdeletedurl="{{ route('template.destroy', [$item->id]) }}"
                                                                id="delete-btn"><i class="bx bx-trash-alt"></i> <span
                                                                    key="t-delete">Delete</span></button>
                                                        </form>
                                                    @endcan
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
@endsection
