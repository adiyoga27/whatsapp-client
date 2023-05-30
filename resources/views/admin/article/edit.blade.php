@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data">Add New Article</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-article-header">Article</a></li>
                    <li class="breadcrumb-item active" key="t-update-data">Add New Article</li>
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
                        <section>
                            <form action="{{ route('article.update', $article->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <input type="hidden" name="user_id" value="{{ $article->User->id }}">
                                <input type="hidden" name="old_img" value="{{ $article->image }}">

                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ asset('storage/' . $article->image) }}" id="img-view"
                                            style="width: 100%; min-height: 300px" alt="">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-title-input" key="t-table-name">Article
                                                        Title</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title"
                                                        value="{{ old('title') ? old('title') : $article->title }}"
                                                        id="basicpill-title-input" placeholder="Enter The Article Title">
                                                    @error('title')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-book-category-input"
                                                        key="t-article-category-header">Article Category</label>

                                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                                        name="category_id">
                                                        <option key="t-select">Select Category</option>
                                                        @foreach ($article_categories as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ old('category_id') == $data->id ? 'selected' : ($article->category_id == $data->id ? 'selected' : '') }}>
                                                                {{ $data->name }}</option>
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
                                                    <label for="upload-img" key="t-table-image">Image</label>
                                                    <input type="file"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        name="image" value="" onchange="showPreview(event)"
                                                        id="upload-img">
                                                    @error('image')
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
                                                            {{ old('is_active') == '2' ? 'checked' : ($article->is_active == 1 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio1"
                                                            value="2">
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('is_active') is-invalid @enderror"
                                                            {{ old('is_active') == '3' ? 'checked' : ($article->is_active == 0 ? 'checked' : '') }}
                                                            type="radio" name="is_active" id="inlineRadio2"
                                                            value="3">
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
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="keyword" key="t-table-keyword">Keyword</label>
                                                        <input type="text"
                                                            class="form-control @error('keyword') is-invalid @enderror"
                                                            name="keyword"
                                                            value="{{ old('keyword') ? old('keyword') : $article->keyword }}"
                                                            id="keyword" placeholder="Enter keyword">

                                                        @error('keyword')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
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
                                                placeholder="Enter Article Description">{{ old('description') ? old('description') : $article->description }}</textarea>

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
