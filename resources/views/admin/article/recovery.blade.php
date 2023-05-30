@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-recovery-header">Article Recovery</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-article-header">Article</a></li>
                    <li class="breadcrumb-item active" key="t-recovery-header">Article Recovery</li>
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
                                        <th key="t-title">Title</th>
                                        <th key="t-article-category-header">Article Category</th>
                                        <th key="t-table-posted-by">Posted By</th>
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
                                            <td>{{ Str::limit($val->description, 50, '...') }}</td>
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
                                            <td class="">
                                                <div class="d-flex">
                                                    <button id="article-restore-btn"
                                                        data-article-restore-id="{{ $val->id }}"
                                                        class="btn btn-secondary waves-effect waves-light me-2"
                                                        style="width: max-content" key="t-restore">Restore</button>
                                                    <form action="" id="article-force-delete-form" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            data-article-force-url="{{ route('forcedelete.article', [$val->id]) }}"
                                                            id="article-force-delete-btn"
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
