@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Book Comment</h4>

            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Article</a></li>
                <li class="breadcrumb-item active">Book Comment</li>
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
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Book Title</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book_comment as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->user->username }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->book->title }}</td>
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
@endsection
