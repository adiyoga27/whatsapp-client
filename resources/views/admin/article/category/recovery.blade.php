@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-recovery-header">Article Category Recovery</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-article-category-header">Article
                            Category</a></li>
                    <li class="breadcrumb-item active" key="t-recovery-header">Article Category Recovery</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.flash-message')

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th key="t-table-category">Category Name</th>
                                <th key="t-table-status">Status</th>
                                <th key="t-table-action">Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($article_category as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        @if ($data->is_active == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-danger font-size-11">Non Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="d-flex">
                                                <button id="article-category-restore-btn"
                                                    data-article-category-restore-url="{{ route('restore.article.category', [$data->id]) }}"
                                                    class="btn btn-secondary waves-effect waves-light me-2"
                                                    style="width: max-content">Restore</button>
                                                <form action="" id="article-category-force-delete-form" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        data-article-category-force-url="{{ route('forcedelete.article.category', [$data->id]) }}"
                                                        id="article-category-force-delete-btn"
                                                        class="btn btn-danger waves-effect waves-light me-2"
                                                        style="width: max-content">Force Delete</button>
                                                </form>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
