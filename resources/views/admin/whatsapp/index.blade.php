@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-whatsapp-sub-header"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-whatsapp-header"></a></li>
                    <li class="breadcrumb-item active" key="t-whatsapp-sub-header"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl">
            {{-- <div class="alert alert-danger" role="alert" style="text-align: center">
                @if (isset($notif))
                    {!! $notif !!}
                @endif


            </div> --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.flash-message')
                        @can('isSuperadmin')
                            <div class="button-create mb-3 text-end">
                                <a href="{{ route('whatsapp.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                    <span key="t-add"> Add New</span></a>
                            </div>
                        @endcan
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="t-table-name">Name</th>
                                        <th key="t-table-status">Status</th>
                                        <th key="">Tgl Expired</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($whatsapp as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->name }}</td>

                                            <td>
                                                @if ($val->is_active == 1)
                                                    <span
                                                        class="badge badge-pill badge-soft-success font-size-11">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-11">Non
                                                        Active</span>
                                                @endif
                                            </td>
                                            <td>{{ date('d M Y', strtotime($val->expired_at)) }}</td>

                                            @can('isSuperadmin')
                                                <td class="">
                                                    <div class="d-flex">

                                                        <a href="{{ url('admin/whatsapp/qrcode', $val->id) }}"
                                                            class="btn btn-info waves-effect waves-light me-2" key=""><i
                                                                class="bx bx-search-alt-2"></i> Scan QR</a>
                                                        <a href="{{ route('whatsapp.edit', [$val->id]) }}"
                                                            class="btn btn-success waves-effect waves-light me-2"><i
                                                                class="bx bx-edit-alt"></i> <span
                                                                key="t-edit">Custom</span></a>
                                                        <form action="" id="form-delete" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger waves-effect waves-light"
                                                                data-softdeletedurl="{{ route('whatsapp.destroy', [$val->id]) }}"
                                                                id="delete-btn"><i class="bx bx-trash-alt"></i> <span
                                                                    key="t-delete">Delete</span></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endcan
                                            @can('isAdmin')
                                                <td class="">
                                                    <div class="d-flex">
                                                        <a href="{{ url('admin/whatsapp/qrcode', $val->id) }}"
                                                            class="btn btn-info waves-effect waves-light me-2" key=""><i
                                                                class="bx bx-search-alt-2"></i> Scan QR</a>

                                                    </div>
                                                </td>
                                            @endcan

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
