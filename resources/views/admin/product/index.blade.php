@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-product-header">All Product</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-product-sub-header">Product</a></li>
                    <li class="breadcrumb-item active" key="t-product-header">All Product</li>
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
                            <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> <span
                                    key="t-add"> Add
                                    New</span></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-name">Name</th>
                                        <th key="t-table-category">Category Name</th>
                                        <th key="t-table-price">Price</th>
                                        <th key="t-table-keyword">Keyword</th>
                                        <th key="t-table-description">Description</th>
                                        <th key="t-table-status">Status</th>
                                        <th key="t-table-image">Image</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->name }}</td>
                                            <td>
                                                {{ $val->product_categories->name }}
                                            </td>
                                            <td>{{ 'Rp. ' . number_format($val->price, 2) }}</td>
                                            <td>{{ Str::of(strip_tags($val->keyword))->limit(15) }}</td>
                                            <td>{{ Str::of(strip_tags($val->description))->limit(20) }}</td>
                                            <td>
                                                @if ($val->is_active == 1)
                                                    <span
                                                        class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-11">Non
                                                        Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $val->image) }}" width="50"
                                                    height="60" alt="">
                                            </td>
                                            <td class="">
                                                <div class="d-flex">
                                                    <button class="btn btn-info waves-effect waves-light me-2"
                                                        id="btn-product-view"
                                                        data-product-view-url="{{ route('product.show', [$val->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#product-modal"><i
                                                            class="bx bx-file-find"></i> <span
                                                            key="t-detail">detail</span></button>
                                                    <a href="{{ route('product.edit', [$val->id]) }}"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span
                                                            key="t-edit">custom</span></a>
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            data-softdeletedurl="{{ route('product.destroy', [$val->id]) }}"
                                                            id="delete-btn"><i class="bx bx-trash-alt"></i> <span
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
            </div>
        </div>
    </div>



    <!-- Static Backdrop Modal -->
    <div class="modal fade" id="product-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="product-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product-modalLabel" key="t-product-detail">Product Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-section mb-3 text-center">
                        <img src="" id="product-image" width="100%" alt="product-img">
                    </div>
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-product-name">Product Name</label><br>
                                    <span id="product-name"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-product-category">Product Category</label><br>
                                    <span id="product-category"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-price">Price</label><br>
                                    <span id="product-price"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-status">Status</label><br>
                                    <span id="product-status"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-description">Description</label><br>
                                    <span id="product-description"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-keyword">Keyword</label><br>
                                    <span id="product-keyword"></span>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
