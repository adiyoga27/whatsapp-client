@extends('admin.dashboard-temp')


@section('content-section')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h2 class="mb-3 text-center">Edit Book Category</h2>
                        <section>
                            <form action="{{ route('book-category.update', [$categories->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-name-input">Category Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $categories->name }}"
                                                        id="basicpill-name-input" placeholder="Enter Category Name">
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="d-block mb-3">Active/Deactivate :</label>

                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input  @error('is_active') is-invalid @enderror"type="radio"
                                                            {{ $categories->is_active == 1 ? 'checked' : '' }}
                                                            name="is_active" id="inlineRadio1" value="1">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            type="radio"
                                                            {{ $categories->is_active == 0 ? 'checked' : '' }}
                                                            name="is_active" id="inlineRadio2" value="0">
                                                        <label class="form-check-label" for="inlineRadio2">Non
                                                            Active</label>
                                                    </div>
                                                    @error('is_active')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light">Save</button>

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
