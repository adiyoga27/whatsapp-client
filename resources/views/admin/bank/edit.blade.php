@extends('admin.dashboard-temp')

@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-update-data"></h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bank</a></li>
                    <li class="breadcrumb-item active" key="t-update-data"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <div id="basic-example">
                        <!-- Seller Details -->
                        <section>
                            <form action="{{ route('bank.update', [$bank->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="product-account_number"
                                                key="t-account-number">account_number</label>
                                            <input type="text"
                                                class="form-control @error('account_number') is-invalid @enderror"
                                                name="account_number"
                                                value="{{ old('account_number') ? old('account_number') : $bank->account_number }}"
                                                id="product-account_number" placeholder="Enter account number" required>
                                            @error('account_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="account_name" key="t-account-name">account_name</label>
                                            <input type="text"
                                                class="form-control @error('account_name') is-invalid @enderror"
                                                name="account_name"
                                                value="{{ old('account_name') ? old('account_name') : $bank->account_name }}"
                                                id="account_name" placeholder="Enter account name" required>
                                            @error('account_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="name" key="t-name">name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') ? old('name') : $bank->name }}"
                                                id="name" placeholder="Enter owner name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label class="d-block mb-3">Active/Deactivate</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('is_active') is-invalid @enderror"
                                                    {{ old('is_active') == '1' ? 'checked' : ($bank->is_active == 1 ? 'checked' : '') }}
                                                    type="radio" name="is_active" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('is_active') is-invalid @enderror"
                                                    {{ old('is_active') == '0' ? 'checked' : ($bank->is_active == 0 ? 'checked' : '') }}
                                                    type="radio" name="is_active" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">Non
                                                    Active</label>
                                            </div>

                                            @error('is_active')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="button-action text-end mt-1">
                                    <button type="submit" class="btn btn-success" key="t-save">Save</button>
                                </div>
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
