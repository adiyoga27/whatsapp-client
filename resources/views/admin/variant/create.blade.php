@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-add-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-variant-header"></a></li>
                    <li class="breadcrumb-item active" key="t-add-data"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        @include('admin.flash-message')
                        <section>
                            <form action="{{ route('variant.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="product-id" key="t-select-product">Choose Product</label>

                                            <select class="form-control @error('product_id') is-invalid @enderror"
                                                name="product_id">
                                                <option key="t-select-product"></option>
                                                @foreach ($product as $val)
                                                    <option value="{{ $val->id }}"
                                                        {{ old('product_id') == $val->id ? 'selected' : '' }}>
                                                        {{ $val->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('product_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="product-name" key="t-variant-name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="product-name"
                                                placeholder="Enter name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="button-action text-end mt-1">
                                    <button type="submit" class="btn btn-success" key="t-save">Save</button>
                                </div>
                            </form>
                        </section>

                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
