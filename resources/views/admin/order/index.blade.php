@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-phonebook-sub-header"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-customer-order"></a></li>
                    <li class="breadcrumb-item active" key="t-phonebook-sub-header"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-xl">

            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ route('order.filter') }}" method="POST" id="form-filter">
                                @csrf
                                <label for="status" key="">Filter</label>
                                <select class="form-select" name="" id="form-select">
                                    <option value="pending"
                                        {{ isset($_GET['status']) ? ($_GET['status'] == 'pending' ? 'selected' : '') : '' }}>
                                        Pending
                                    </option>
                                    <option value="paid"
                                        {{ isset($_GET['status']) ? ($_GET['status'] == 'paid' ? 'selected' : '') : '' }}>
                                        Paid</option>
                                    <option value="shipped"
                                        {{ isset($_GET['status']) ? ($_GET['status'] == 'shipped' ? 'selected' : '') : '' }}>
                                        Shipped
                                    </option>
                                    <option value="expired"
                                        {{ isset($_GET['status']) ? ($_GET['status'] == 'expired' ? 'selected' : '') : '' }}>
                                        Expired
                                    </option>
                                    <option value="all"
                                        {{ isset($_GET['status']) ? ($_GET['status'] == 'all' ? 'selected' : '') : '' }}>
                                        Semua Data
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @include('admin.flash-message')
                        {{-- <div class="button-create mb-3 text-end">
                            <a href="{{ route('bank.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                                <span key="t-add"> Add New</span></a>
                        </div> --}}

                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="datatable">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th key="">Invoice Number</th>
                                        <th key="">Customer Name</th>
                                        <th key="">Phone Number</th>
                                        <th key="">Address</th>
                                        {{-- <th key="">Total Product</th> --}}
                                        {{-- <th key="">Price</th> --}}
                                        <th key="">Status</th>
                                        <th class="text-center"><span key="t-table-action">Action</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->invoice_number }}</td>
                                            {{-- <td>{{ $val->order_detail->product_name }}</td> --}}
                                            <td>{{ $val->customer_name }}</td>
                                            <td>{{ $val->customer_phone }}</td>
                                            <td>{{ $val->customer_address }}</td>
                                            {{-- <td>{{ count($val->order_detail) }}</td> --}}
                                            {{-- <td>{{ 'Rp. ' . number_format($val->order_detail->price, 2) }}</td> --}}
                                            <td>
                                                @if ($val->status == 'pending')
                                                    <span
                                                        class="badge badge-pill badge-soft-warning font-size-11">Pending</span>
                                                @elseif ($val->status == 'paid')
                                                    <span
                                                        class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                @elseif ($val->status == 'shipped')
                                                    <span
                                                        class="badge badge-pill badge-soft-secondary font-size-11">Shipped</span>
                                                @elseif ($val->status == 'expired')
                                                    <span
                                                        class="badge badge-pill badge-soft-danger font-size-11">Expired</span>
                                                @endif
                                            </td>

                                            <td class="">
                                                <div class="d-flex justify-content-end">
                                                    @if ($val->status == 'pending')
                                                        <form action="" id="form-approve" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <button class="btn btn-success waves-effect waves-light me-2"
                                                                data-approve-url="{{ route('order.approve', [$val->id]) }}"
                                                                id="approve-btn" key=""><i class="bx bx-check"></i>
                                                                Approve</button>
                                                        </form>
                                                    @endif
                                                    <a href="{{ route('invoice.download', [$val->uuid]) }}"
                                                        class="btn btn-secondary  me-2" target="_blank"><i
                                                            class="bx bx-printer"></i>
                                                        Cetak</a>

                                                    <button class="btn btn-info waves-effect waves-light  me-2"
                                                        id="btn-detail-order-view"
                                                        data-detail-order-view-url="{{ route('order.show', [$val->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target="#detail-order-modal"><i
                                                            class="bx bx-file-find"></i> Selengkapnya</button>

                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light me-2"
                                                            data-softdeletedurl="{{ route('order.destroy', [$val->id]) }}"
                                                            id="delete-btn" key=""><i class="bx bx-trash-alt"></i>
                                                            Hapus</button>
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
    <div class="modal fade" id="detail-order-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="detail-order-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="message-modalLabel"><span key="t-customer-order"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-section ">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Invoice Number</label><br>
                                            <span id="order-invoice-number"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Address</label><br>
                                            <span id="order-address"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Customer Name</label><br>
                                            <span id="order-customer-name"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Phone Number</label><br>
                                            <span id="order-customer-phone"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row order-detail">

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Status</label><br>
                                            <span id="order-status"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Approved by</label><br>
                                            <span id="order-approved_by"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Expired Date</label><br>
                                            <span id="order-expired_at"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="text-bold" key="">Paid Date</label><br>
                                            <span id="order-paid_at"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg">
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label class="text-bold p-0 m-0" key="">Total Amount </label><span> :
                                            </span>
                                            <span id="total-amount"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg">
                                <div class="docs-toggles">
                                    <ul class="list-group">
                                        <li class="list-group-item ">
                                            <label class="text-bold" key="">Note</label><br>
                                            <div class="note-list">

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $('#form-select').on('change', function() {
            let val = $('#form-select').val()
            console.log(val);
            if (val) {
                window.location.href = 'order?status=' + val;
            }
        })
    </script>
@endsection
