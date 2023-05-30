@extends('admin.dashboard-temp')


@section('content-section')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Book Category Recovery</h4>

            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Book Category</a></li>
                <li class="breadcrumb-item active">Book Category Recovery</li>
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
                        @foreach ($book_category as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                @if ($data->is_active == 1)
                                <span class="badge badge-pill badge-soft-success font-size-11">Activate</span>
                                @else
                                <span class="badge badge-pill badge-soft-danger font-size-11">Deactivate</span>
                                @endif
                            </td>
                            <td >
                                <div class="d-flex">
                                    <button id="bookcategory-restore-btn" data-bookcategory-id="{{ $data->id }}" class="btn btn-secondary me-2">Restore</button>
                                    <form action="" id="bookcategory-force-delete" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger me-2" data-bookcategory-force-id="{{ $data->id }}" id="bookcategory-force-delete-btn">Force Delete</button>
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
