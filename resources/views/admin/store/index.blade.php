@extends('admin.dashboard-temp')

@section('mycss')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content-section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Setting Store and Expedition</h4>

                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Store and Expedition</a></li>
                    <li class="breadcrumb-item active" key="">Setting Store and Expedition</li>
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
                            <form action="{{ route('store.expedition.update', [$province_data->id]) }}" method="POST">
                                @csrf
                                @include('admin.flash-message')
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            @if ($province_data->store_address == null)
                                                <div class="alert alert-danger" role="alert" style="text-align: center">
                                                    Alamat wajib diisi untuk dapat membuka feature catalog!
                                                </div>
                                            @endif
                                            <label for="my-select" key="t-province">Pilih
                                                Provinsi</label>
                                            <input type="hidden" name="province_name" id="province_name"
                                                value="{{ $province_data->province_name }}">

                                            <select class="form-control" id="my-select" name="provice_id"
                                                style="width: 100%">
                                                <option selected>-- Provinsi --</option>
                                                @foreach ($province as $item)
                                                    <option value="{{ $item['province_id'] }}"
                                                        {{ $item['province_id'] == $province_data['provice_id'] ? 'selected' : '' }}
                                                        data-provincename="{{ $item['province'] }}">{{ $item['province'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('province')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="city" key="t-city">Pilih
                                                Kabupaten</label>
                                            <input type="hidden" name="city_name" id="city_name"
                                                value="{{ $province_data->city_name }}">

                                            <select class="form-control city" id="my-select1" name="city_id"
                                                style="width: 100%">
                                                <option selected>-- Kabupaten/Kota --</option>
                                                @foreach ($city_data as $item)
                                                    <option value="{{ $item['city_id'] }}"
                                                        {{ $item['city_id'] == $province_data['city_id'] ? 'selected' : '' }}
                                                        data-cityname="{{ $item['city_name'] }}">{{ $item['city_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="subdistrict" key="t-subdistrict">Pilih
                                                Kecamatan</label>
                                            <input type="hidden" name="subdistrict_name" id="subdistrict_name"
                                                value="{{ $province_data->subdistrict_name }}">

                                            <select class="form-control subdistrict" id="my-select2" name="subdistrict_id"
                                                style="width: 100%">
                                                <option selected>-- Kecamatan --</option>

                                                @foreach ($subdistrict_data as $item)
                                                    <option value="{{ $item['subdistrict_id'] }}"
                                                        {{ $item['subdistrict_id'] == $province_data['subdistrict_id'] ? 'selected' : '' }}
                                                        data-subdistrictname="{{ $item['subdistrict_name'] }}">
                                                        {{ $item['subdistrict_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('subdistrict')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <label for="subdistrict" key="">
                                                Alamat</label>
                                            <textarea name="store_address" class="form-control" id="store_address" rows="5">{{ $province_data->store_address }}</textarea>
                                            @error('subdistrict')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body shadow">
                                                    <h5>Pilih Kurir</h5>
                                                    <span class="text-danger" style="font-size: 12px">(Pilih kurir yang anda
                                                        inginkan)</span>

                                                    <div class="row mt-2    ">
                                                        @for ($i = 0; $i < count($expedition); $i++)
                                                            <div class="col-sm-3">

                                                                <input class="form-check-input mb-1" type="checkbox"
                                                                    id="formCheckcolor{{ $i }}"
                                                                    name="expedition[]" value="{{ $expedition[$i]->id }}"
                                                                    {{ in_array($expedition[$i]->id, $store_expedition) ? 'checked' : '' }}>
                                                                <label class="form-check-label me-2 mb-1"
                                                                    for="formCheckcolor{{ $i }}">
                                                                    {{ ucwords($expedition[$i]->code) }}
                                                                </label>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label for="subdistrict">Aktifkan apabila anda menyediakan
                                                pengambilan paket di kantor</label>
                                            <input type="hidden" name="take_to_store" id="take_to_store_status"
                                                value="{{ $province_data->take_to_store }}">
                                            <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                <input class="form-check-input" id="take_to_store"
                                                    {{ $province_data->take_to_store == 1 ? 'checked' : '' }}
                                                    type="checkbox" id="checkbox">
                                                <label class="form-check-label" for="checkbox">Ambil Di
                                                    kantor</label>
                                            </div>
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

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#my-select').select2();
            $('#my-select1').select2();
            $('#my-select2').select2();

            $('#take_to_store').on('change', function() {
                let data = $('#take_to_store').is(':checked')
                if (data == true) {
                    $('#take_to_store_status').val(1)
                } else {
                    $('#take_to_store_status').val(0)
                }
            })

            $(document).on('change', '#my-select', function() {
                let id = $(this).val()
                let name = $(this).find('option:selected').data('provincename')
                $('#province_name').val(name)

                $('.city').empty()

                if (id) {
                    $.ajax({
                        url: 'store/get-city/' + id,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(data) {
                            $('.city').append('<option selected>-- Kabupaten/Kota --</option>')
                            $.each(data, function(index, val) {
                                $('.city').append('<option value="' + val.city_id +
                                    '" data-cityname ="' + val.city_name + '"> ' +
                                    val.city_name +
                                    '</option>')
                            })
                        }
                    })
                } else {
                    $('.city').empty()
                }
            })
            $(document).on('change', '#my-select1', function() {
                let id = $(this).val()
                let name = $(this).find('option:selected').data('cityname')

                $('#city_name').val(name)

                $('.subdistrict').empty()


                if (id) {

                    $.ajax({
                        url: 'store/get-subdistrict/' + id,
                        type: "GET",
                        dataType: 'JSON',
                        success: function(data) {

                            $('.subdistrict').append(
                                '<option selected>-- Kecamatan --</option>')
                            $.each(data, function(index, val) {
                                $('.subdistrict').append('<option value="' + val
                                    .subdistrict_id +
                                    '"  data-subdistrict="' + val.subdistrict_name +
                                    '">' +
                                    val.subdistrict_name + '</option>')
                            })


                        }
                    })
                } else {
                    $('.subdistrict').empty()
                }
            })
            $(document).on('change', '#my-select2', function() {
                let name = $(this).find('option:selected').data('subdistrict')
                let id = $(this).val()

                $('#subdistrict_name').val(name)


            })
        })
    </script>
@endsection
