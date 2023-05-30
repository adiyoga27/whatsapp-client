@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-add-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-product-variant"></a></li>
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
                            <form action="{{ route('product-variant.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="variant-id" key="t-select-variant">Choose Variant</label>

                                            <select class="form-control @error('variant_id') is-invalid @enderror"
                                                name="variant_id">
                                                <option key="t-select-variant"></option>
                                                @foreach ($variant as $val)
                                                    <option value="{{ $val->id }}"
                                                        {{ old('variant_id') == $val->id ? 'selected' : '' }}>
                                                        {{ $val->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('variant_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="product-name" key="t-product-variant-name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}" id="product-name"
                                                placeholder="Enter product variant name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="price" key="t-table-price">price</label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                name="price" value="{{ old('price') }}" id="price"
                                                placeholder="Enter price" required>
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="weight" key="t-weight">weight</label>
                                            <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                                name="weight" value="{{ old('weight') }}" id="weight"
                                                placeholder="Enter weight" required>
                                            <span class="text-danger" style="font-size: 11px">Satuan: gram</span>
                                            @error('weight')
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
