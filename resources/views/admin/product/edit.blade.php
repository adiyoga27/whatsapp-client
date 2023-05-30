@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data">Edit Product</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-product-header">Product</a></li>
                    <li class="breadcrumb-item active" key="t-update-data">Edit Product</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        @include('admin.flash-message')
                        <section>
                            <form action="{{ route('product.update', [$product->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <input type="hidden" name="old_img" value="{{ $product->image }}">

                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ asset('storage/' . $product->image) }}" id="img-view"
                                            style="width: 100%; min-height: 300px" alt="">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-name-input" key="t-product-name">Product
                                                        Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name"
                                                        value="{{ old('name') ? old('name') : $product->name }}"
                                                        id="basicpill-name-input" placeholder="Enter product name">

                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-product-category-input"
                                                        key="t-product-category">Product Category</label>

                                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                                        name="category_id">
                                                        <option key="t-select">Select Category</option>
                                                        @foreach ($product_category as $val)
                                                            <option value="{{ $val->id }}"
                                                                {{ old('category_id') == $val->id ? 'selected' : ($product->category_id == $val->id ? 'selected' : '') }}>
                                                                {{ $val->name }}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('category_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-price-input" key="t-table-price">Price</label>
                                                    <input type="text"
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        name="price"
                                                        value="{{ old('price') ? old('price') : $product->price }}"
                                                        id="basicpill-price-input" placeholder="Enter product price">

                                                    @error('price')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Active/Deactivate</label>

                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '1' ? 'checked' : ($product->is_active == 1 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio1"
                                                            value="1">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '0' ? 'checked' : ($product->is_active == 0 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio2"
                                                            value="0">
                                                        <label class="form-check-label" for="inlineRadio2">Non
                                                            Active</label>
                                                    </div>

                                                    @error('is_active')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="upload-img" key="t-table-image">Image</label>
                                                    <input type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        name="image" value="" onchange="showPreview(event)"
                                                        id="upload-img">
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="keyword" key="t-table-keyword">Keyword</label>
                                                    <input type="text"
                                                        class="form-control @error('keyword') is-invalid @enderror"
                                                        name="keyword"
                                                        value="{{ old('keyword') ? old('keyword') : $product->keyword }}"
                                                        id="keyword" placeholder="Enter keyword">

                                                    @error('keyword')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="variant_name" key="">Nama Varian</label>
                                                    <input type="text"
                                                        class="form-control @error('variant_name') is-invalid @enderror"
                                                        name="variant_name"
                                                        value="{{ old('variant_name') ? old('variant_name') : implode(',', $variant) }}"
                                                        id="variant_name" placeholder="Enter variant name">

                                                    @error('variant_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="float-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light"
                                                key="t-save">Save</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">

                                            <label for="description" key="t-table-description">Description</label>
                                            <textarea name="description" class=" @error('description') is-invalid @enderror" id="description" rows="20"
                                                placeholder="Enter Product Description">{{ old('description') ? old('description') : $product->description }}</textarea>

                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg">
                                        <button type="button" class="btn btn-sm btn-secondary" id="paste-text">
                                            Paste Text
                                        </button>
                                    </div>
                                </div> --}}
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
