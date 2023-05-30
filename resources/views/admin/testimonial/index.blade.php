@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-testimonial-sub-header">Testimonial</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-testimonial-header">Testimonial</a></li>
                    <li class="breadcrumb-item active" key="t-testimonial-sub-header">Testimonial</li>
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
                            <a href="{{ route('testimonial.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                <span key="t-add"> Add New</span></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-name">Name</th>
                                        <th key="t-table-phone">Phone</th>
                                        <th key="t-table-rate-star">Rate Star</th>
                                        <th key="t-table-status">Status</th>
                                        <th key="t-table-description">Description</th>
                                        <th key="t-table-image">Image</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonial as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->name }}</td>
                                            <td>
                                                {{ $val->phone }}
                                            </td>
                                            <td>{{ $val->rate_star }}</td>
                                            <td>
                                                @if ($val->is_active == 1)
                                                    <span
                                                        class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-11">Non
                                                        Active</span>
                                                @endif
                                            </td>
                                            <td>{{ Str::of(strip_tags($val->description))->limit(20) }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $val->photo) }}" width="50"
                                                    height="60" alt="">
                                            </td>
                                            <td class="">
                                                <div class="d-flex">
                                                    <button class="btn btn-info waves-effect waves-light me-2"
                                                        id="btn-testimonial-view"
                                                        data-testimonial-view-url="{{ route('testimonial.show', [$val->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#testimonial-modal"><i
                                                            class="bx bx-file-find"></i> <span
                                                            key="t-detail">detail</span></button>

                                                    <a href="{{ route('testimonial.edit', [$val->id]) }}"
                                                        class="btn btn-success waves-effect waves-light me-2"><i
                                                            class="bx bx-edit-alt"></i> <span key="t-edit">edit</span></a>
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            data-softdeletedurl="{{ route('testimonial.destroy', [$val->id]) }}"
                                                            id="delete-btn"><i class="bx bx-trash-alt"></i> <span
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
    <div class="modal fade" id="testimonial-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="testimonial-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonial-modalLabel">Testimonial Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-section mb-3 text-center">
                        <img src="" id="testimonial-image" width="100%" alt="testimonial-img">
                    </div>
                    <div class="content-section ">
                        <div class="docs-toggles">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="text-bold">Name</label><br>
                                    <span id="testimonial-name"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Phone</label><br>
                                    <span id="testimonial-phone"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Rate Star</label><br>
                                    <span id="testimonial-rate-star"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Status</label><br>
                                    <span id="testimonial-status"></span>
                                </li>
                                <li class="list-group-item">
                                    <label class="text-bold">Description</label><br>
                                    <span id="testimonial-description"></span>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
