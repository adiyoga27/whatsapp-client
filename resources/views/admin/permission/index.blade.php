@extends('admin.dashboard-temp')


@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18" key="t-phonebook-sub-header">Permission Whatsapp</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" key="t-phonebook">Permission</a></li>
                    <li class="breadcrumb-item active" key="t-phonebook-sub-header">Custom</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl">

            <div class="card">
                <div class="card-body">
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg">
       
                    <div class="row">
                        <div class="col-lg">
                            <div class="mb-3">
                                <label for="basicpill-book-category-input">Users</label>

                                <select class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id">
                                    <option>Select User</option>
                                    @foreach ($users as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('user_id') == $data->id ? 'selected' : '' }}>
                                            {{ $data->username }} / {{ $data->full_name }}</option>
                                    @endforeach

                                </select>

                                @error('whatsapp_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            <div class="mb-3">
                                <label for="basicpill-book-category-input">WhatsApp</label>

                                <select class="form-control @error('whatsapp_id') is-invalid @enderror"
                                    name="whatsapp_id">
                                    <option>Select Whatsapp</option>
                                    @foreach ($whatsapps as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('whatsapp_id') == $data->id ? 'selected' : '' }}>
                                            {{ $data->name }}</option>
                                    @endforeach

                                </select>

                                @error('whatsapp_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="float-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light"
                            key="t-save">Add Permission</button>

                    </div>
                </div>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>

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
                                        <th key="t-table-name">User</th>
                                        <th key="t-table-title">Whatsapp</th>
                                        <th key="t-table-action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $val)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $val->user?->username }}</td>
                                            <td>
                                                {{ $val->whatsapp?->name }}
                                            </td>

                                            <td class="">
                                                <div class="d-flex">
                                                 
                                                    <form action="" id="form-delete" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger waves-effect waves-light"
                                                            data-softdeletedurl="{{ route('permission.destroy', [$val->id]) }}"
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
@endsection
