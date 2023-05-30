@extends('admin.dashboard-temp')



@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Article Categories</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Article Category</a></li>
                    <li class="breadcrumb-item active">Article Categories</li>
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
                        <a href="{{ route('article-category.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                            <span key="t-add">Add New</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th key="t-table-category">Category Name</th>
                                    <th key="t-table-status">Status</th>
                                    <th key="t-table-action">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($article as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            @if ($data->is_active == 1)
                                                <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-soft-danger font-size-11">Non
                                                    Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('article-category.edit', [$data->id]) }}"
                                                    class="btn btn-success me-2"><i class="bx bx-edit-alt"></i> <span
                                                        key="t-edit"><span>Custom</span></a>
                                                <form action="" id="form-delete" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="delete-btn"
                                                        data-softdeletedurl="{{ route('article-category.destroy', [$data->id]) }}"
                                                        class="btn btn-danger me-2"><i class="bx bx-trash-alt"></i> <span
                                                            key="t-delete"> Delete</span></button>
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
@endsection
