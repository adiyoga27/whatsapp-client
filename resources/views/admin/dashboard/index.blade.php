@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18"><span key="t-dashboards">Dashboard</span></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><span
                                    key="t-dashboards">Dashboards</span></a></li>
                        <li class="breadcrumb-item active"><span key="t-dashboards">Dashboard</span></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary"><span key="t-welcome">Welcome Back !</span></h5>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ asset('assets/images/users/user1.jpg') }}" alt=""
                                    class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ auth()->user()->username }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ auth()->user()->level }}</p>
                        </div>

                        <div class="col-sm-8">
                            {{-- <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">125</h5>
                                        <p class="text-muted mb-0">Projects</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">$1245</h5>
                                        <p class="text-muted mb-0">Revenue</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-8">
            <div class="row">
                {{-- <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Book In Total</p>
                                    <h4 class="mb-0">{{ $book }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bxs-book-open font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium" key="t-article-total">Article In Total</p>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-news font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium" key="t-user-total">User In Total</p>
                                    <h4 class="mb-0">{{ $user }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-user-circle font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium" key="t-product-total">Product In Total</p>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium" key="t-testimonial-total">Testimonial In Total</p>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->

        </div>
    </div>
    <!-- end row -->
    {{-- <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden p-3">
                <div class="row">
                    <div class="col-md">
                        <h5 key="t-storage">Your Storage</h5>
                        <div class="progress progress-micro">
                            <div class="progress-bar bg-indigo-500" style="width: {{ $diskuse }}">
                                <span class="sr-only">{{ $diskuse }}</span>
                            </div>
                        </div>
                        <span class="pull-right">{{ round($disk_used_size, 2) }} GB / {{ round($total_disk_size, 2) }} GB
                            ({{ $diskuse }})</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-6">

        </div>
    </div> --}}
    @if (Auth::user()->email === 'admin@gmail.com')
        {{-- modal --}}
        <div id="myModal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Informasi Sistem
                        </h5>
                    </div>
                    <div class="modal-body">
                        <p>
                            Anda menggunakan Email default, Silahkan ganti dengan yang baru!
                        </p>
                    </div>
                    <a href="{{ route('user.edit', [Auth::user()->id]) }}">
                        <div class="d-grid gap-2 p-3">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Ubah</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        {{-- end --}}
    @endif
@endsection
