@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Book</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Book</a></li>
                    <li class="breadcrumb-item active">All Book</li>
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
                            <a href="{{ route('book.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add
                                New</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Book Title</th>
                                        <th>Book Category</th>
                                        </th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_buku as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->title }}</td>
                                            <td>
                                                {{ $val->name }}
                                            </td>
                                            <td>{{ 'Rp. ' . number_format($val->price, 2) }}</td>
                                            <td>{{ Str::of(strip_tags($val->description))->limit(20) }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $val->image) }}" width="50"
                                                    height="60" alt="">
                                            </td>
                                            <td class="">
                                                <div class="d-flex">
                                                    {{-- <a href="{{ route('book.show', [$val->id]) }}" id="book-view-btn" data-id-buku="1" class="btn btn-info waves-effect waves-light me-2">View</a> --}}
                                                    <button class="btn btn-info waves-effect waves-light me-2"
                                                        id="btn-book-view"
                                                        data-book-view-url="{{ route('book.show', [$val->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#book-modal">Detail</button>
                                                    <a href="{{ route('book.edit', [$val->id]) }}"
                                                        class="btn btn-success waves-effect waves-light me-2">Custom</a>
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            data-softdeletedurl="{{ route('book.destroy', [$val->id]) }}"
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
                </div>
            </div>
        </div>
    </div>



    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="book-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="book-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="book-modalLabel">Book Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-section mb-3 text-center">
                        <img src="" id="book-image" width="100%" alt="book-img">
                    </div>
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="text-bold">Book Title</label><br>
                                    <span id="book-title"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Book Category</label><br>
                                    <span id="book-category"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Price</label><br>
                                    <span id="book-price"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Status</label><br>
                                    <span id="book-status"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Description</label><br>
                                    <span id="book-description"></span>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
