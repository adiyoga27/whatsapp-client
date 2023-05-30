@extends('admin.dashboard-temp')

@section('content-section')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Book</a></li>
                    <li class="breadcrumb-item active">Edit Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div id="basic-example">
                    <section>
                        <form action="{{ route('book.update', [$data_buku->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            {{-- hidden input --}}
                            <input type="hidden" name="old-book-img" value="{{ $data_buku->image }}">
                            {{-- end --}}

                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="{{ asset('storage/' . $data_buku->image) }}" id="img-view" style="width: 100%; max-height: 500px" alt="">
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-title-input">Book Title</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{ old('title') ? old('title') : $data_buku->title  }}" id="basicpill-title-input" placeholder="Enter The Book Title">

                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-book-category-input">Book Category</label>

                                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                                    <option >Select Category</option>
                                                    @foreach ($book_categories as $data)
                                                        <option value="{{ $data->id }}" {{ $data->id == $data_buku->category_id ? 'selected' : '' }}>{{ $data->name }}</option>
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
                                                <label for="basicpill-price-input">Price</label>
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ? old('price') : $data_buku->price }}" id="basicpill-price-input" placeholder="Enter Book Price">

                                                @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="d-block mb-3">Active/Deactivate</label>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('is_active') is-invalid @enderror" {{ $data_buku->is_active == 1 ? 'checked' : '' }} type="radio" name="is_active" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('is_active') is-invalid @enderror" {{ $data_buku->is_active == 0 ? 'checked' : '' }} type="radio" name="is_active" id="inlineRadio2" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Non Active</label>
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
                                                <label for="upload-img">Image</label>
                                                <input type="file" class="form-control @error('description') is-invalid @enderror" name="image" value="" onchange="showPreview(event)" id="upload-img" placeholder="Enter Phone Number">
                                                @error('image')
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
                                        <button type="submit" class="btn btn-success">Save</button>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="mb-3">

                                        <label for="description">Description</label>
                                        <textarea name="description" class=" @error('description') is-invalid @enderror" id="description" rows="3"
                                        placeholder="Enter Book Description">{{ old('description') ? old('description') : $data_buku->description }}</textarea>

                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
