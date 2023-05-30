@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-recovery-header">Product Category Recovery</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-product-category-header">Product
                            Category</a></li>
                    <li class="breadcrumb-item active" key="t-recovery-header">Product Category Recovery</li>
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
                                        <th key="t-table-category">Category Name</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_category as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->name }}</td>
                                            <td class="">
                                                <div class="d-flex">
                                                    <button id="product-category-restore-btn"
                                                        data-product-category-restore-url="{{ route('restore.product.category', [$val->id]) }}"
                                                        class="btn btn-secondary waves-effect waves-light me-2"
                                                        style="width: max-content" key="t-restore">Restore</button>
                                                    <form action="" id="product-category-force-delete-form"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            data-product-category-force-url="{{ route('forcedelete.product.category', [$val->id]) }}"
                                                            id="product-category-force-delete-btn"
                                                            class="btn btn-danger waves-effect waves-light me-2"
                                                            style="width: max-content" key="t-force-delete">Force
                                                            Delete</button>
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
