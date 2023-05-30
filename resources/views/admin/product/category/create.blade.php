@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-add">Add New Product Category</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-product-category-header">Product
                            Category</a></li>
                    <li class="breadcrumb-item active" key="t-add">Add New Product Category</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h2 class="mb-3 text-center"></h2>
                        <section>
                            <form action="{{ route('product-category.store') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="mb-3">
                                                    <label for="basicpill-name-input" key="t-table-category">Category
                                                        Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" id="basicpill-name-input"
                                                        placeholder="Enter Category Name">
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="d-block mb-3">Active/Deactivate</label>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('is_active') is-invalid @enderror" {{ old('is_active') == 1 ? 'checked' : ''}} type="radio" name="is_active" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('is_active') is-invalid @enderror" {{ old('is_active') == 1 ? 'checked' : ''}} type="radio" name="is_active" id="inlineRadio2" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Non Active</label>
                                                </div>
                                                @error('is_active')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light"
                                                        key="t-save">Save</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
