@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Book Categories</h4>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Book Category</a></li>
                    <li class="breadcrumb-item active">Add New Book Category</li>
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
                        <a href="{{ route('book-category.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add
                            New</a>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        @if ($data->is_active == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-11">Activate</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-danger font-size-11">Deactivate</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('book-category.edit', [$data->id]) }}"
                                                class="btn btn-success me-2">Custom</a>
                                            <form action="" id="form-delete" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger me-2"
                                                    data-softdeletedurl="{{ route('book-category.destroy', [$data->id]) }}"
                                                    id="delete-btn">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
