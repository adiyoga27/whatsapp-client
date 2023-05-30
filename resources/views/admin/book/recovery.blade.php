@extends('admin.dashboard-temp')


@section('content-section')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Book Recovery</h4>

            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Book</a></li>
                <li class="breadcrumb-item active">Book Recovery</li>
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

                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="datatable">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Title</th>
                                    <th>Category ID</th></th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book as $val)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $val->title }}</td>
                                    <td>
                                        {{ $val->category_id }}
                                    </td>
                                    <td>{{ $val->price }}</td>
                                    <td>{{ $val->description }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $val->image) }}" width="50" height="60" alt="">
                                    </td>
                                    <td class="">
                                        <div class="d-flex">
                                            <button id="restore-btn" data-book-restore-id="{{ $val->id }}" class="btn btn-secondary waves-effect waves-light me-2" style="width: max-content">Restore</button>
                                            <form action="" id="force-delete-form" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-book-force-id="{{ $val->id }}" id="book-force-delete-btn" class="btn btn-danger waves-effect waves-light me-2" style="width: max-content">Force Delete</button>
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

@endsection
