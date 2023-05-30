@extends('admin.dashboard-temp')



@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><span key='t-article-sub-header'>All Article</span></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"><span key='t-article-header'>Article</span></a>
                    </li>
                    <li class="breadcrumb-item active"><span key="t-article-sub-header">All Article</span></li>
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
                            <a href="{{ route('article.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> <span
                                    key="t-add">Add new</span></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-title">Title</th>
                                        <th key="t-table-category">Article Category</th>
                                        <th key="t-table-posted-by">Posted By</th>
                                        <th key="t-table-keyword">Keyword</th>
                                        <th key="t-table-description">Description</th>
                                        <th key="t-table-status">Status</th>
                                        <th key="t-table-image">Image</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($article as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->title }}</td>
                                            <td>
                                                {{ $val->ArticleCategories->name }}
                                            </td>
                                            <td>{{ $val->user->username }}</td>
                                            <td>{{ Str::limit($val->keyword, 15, '...') }}</td>
                                            <td>{{ Str::of(strip_tags($val->description))->limit(10) }}</td>
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
                                            <td>
                                                <div class="d-flex">
                                                    <a href="" id="article-view-btn" style="width: max-content"
                                                        class="btn btn-info waves-effect waves-light me-2"
                                                        data-article-url="{{ route('article.show', [$val->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#article-modal"
                                                        data-book-id="{{ $val->id }}"><i class="bx bx-file-find"></i>
                                                        <span key="t-detail">Detail</span></a>
                                                    <a href="{{ route('article.edit', [$val->id]) }}"
                                                        style="width: max-content"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span
                                                            key="t-edit"><span>Custom</span></a>
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" style="width: max-content"
                                                            data-softdeletedurl="{{ route('article.destroy', [$val->id]) }}"
                                                            class="btn btn-danger me-2" id="delete-btn"><i
                                                                class="bx bx-trash-alt"></i><span
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
    <div class="modal fade" id="article-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="article-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="article-modalLabel"><span key="t-article-detail">Article Detail</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-section mb-3 text-center">
                        <img src="{{ asset('assets/images/small/img-1.jpg') }}" id="article-image" width="50%"
                            alt="article-img">
                    </div>
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-title">Article Title</label><br>
                                    <span id="article-title"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-article-category-header">Article Category</label><br>
                                    <span id="article-category"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-posted-by">Posted By</label><br>
                                    <span id="article-user"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-status">Status</label><br>
                                    <span id="article-status"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-description">Description</label><br>
                                    <span id="article-description"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold" key="t-table-keyword">keyword</label><br>
                                    <span id="article-keyword"></span>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
