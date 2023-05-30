@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-article-comment">Article Comment</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-article-header">Article</a></li>
                    <li class="breadcrumb-item active" key="t-article-comment">Article Comment</li>
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
                                        <th key="t-username">Username</th>
                                        <th key="t-email">Email</th>
                                        <th key="t-article-header">Article</th>
                                        <th key="t-comment">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($article_comment as $data)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $data->user->username }}</td>
                                            <td>{{ $data->user->email }}</td>
                                            <td>{{ $data->article->title }}</td>
                                            <td>{{ $data->comment }}</td>
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

    {{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @include('admin.flash-message')

                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Article</th>
                        <th>Comment</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($article_comment as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->user->username }}</td>
                                <td>{{ $data->user->email }}</td>
                                <td>{{ $data->article->title }}</td>
                                <td>{{ $data->comment }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row --> --}}
@endsection
