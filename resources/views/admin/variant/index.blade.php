@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-phonebook-sub-header"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-variant-header"></a></li>
                    <li class="breadcrumb-item active" key="t-phonebook-sub-header"></li>
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
                            <a href="{{ route('variant.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                <span key="t-add"> Add New</span></a>

                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-image">Image</th>
                                        <th key="t-product-name">Product Name</th>
                                        <th key="t-variant-name">Variant Name</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($variant as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <img src="{{ asset('storage/' . $val->product->image) }}" width="80"
                                                    alt="product-img">
                                            </td>
                                            <td>{{ $val->product->name }}</td>
                                            <td>{{ $val->name }}</td>

                                            <td class="">
                                                <div class="d-flex">
                                                    <a href="{{ route('variant.edit', [$val->id]) }}"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span key="t-edit"></span></a>

                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            data-softdeletedurl="{{ route('variant.destroy', [$val->id]) }}"
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
@endsection
