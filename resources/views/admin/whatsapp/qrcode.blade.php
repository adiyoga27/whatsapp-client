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

            <div class="card">
                <div class="card-body">
                    <div id="cardimg" class="text-center p-3"><img src="https://whatsapp.galkasoft.id/image/loading.gif"
                            class="card-img-top center" alt="cardimg" id="qrcode" style="height:250px; width:250px;">
                    </div>

                    <div style="margin-top:20px">
                        <div class="text-center">
                            <button id="cekstatus" href="#" class="btn btn-outline-success"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i>Check Status</button>
                            <button id="scanqrr" href="#" class="btn btn-outline-primary"> <i
                                    class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i> Scan</button>
                            <button id="logout" href="#" class="btn btn-outline-danger"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i>Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        var socket = io.connect('{{ $whatsapp->url }}');
        $('#cardimg').html(
            `<img src="{{ url('assets/images/loading.gif') }}" class="card-img-top center" alt="cardimg" id="qrcode"  style="height:250px; width:250px;">`
        );

        socket.emit('initial', 'sdf');
        socket.on('loader', function() {
            $('#cardimg').html(
                `<img src="{{ url('assets/images/loading.gif') }}" class="card-img-top center" alt="cardimg" id="qrcode"  style="height:250px; width:250px;">`
            );
        })
        socket.on('message', function(msg) {
            $('.log').html(`<li>` + msg + `</li>`);
        })
        socket.on('qr', function(src) {
            $('#cardimg').html(` <img src="` + src +
                `" class="card-img-top" alt="cardimg" id="qrcode" style="height:250px; width:250px;">`);
        });

        socket.on('authenticated', function(src) {
            console.log(src);
            $('#cardimg').html(`<h2 class="text-center text-success mt-4">Whatsapp Connected.<br>` + src + `<h2>`);
        });
        socket.on('user', function(src) {
            console.log(src);
            $('#cardimg').html(`<h2 class="text-center text-success mt-4">Whatsapp Connected.<br>` + src.id + ' (' +
                src.name + ') ' + `<h2>`);
        });

        $('#logout').click(function() {
            $('#cardimg').html(`<h2 class="text-center text-dark mt-4">Please wait..<h2>`);
            $('.log').html(`<li>Connecting..</li>`);
            socket.emit('logout', 'delete');
        })

        $('#scanqrr').click(function() {
            $('#cardimg').html(
                `<img src="{{ url('assets/images/loading.gif') }}" class="card-img-top center" alt="cardimg" id="qrcode"  style="height:250px; width:250px;">`
            );

            socket.emit('scanqr', 'scanqr');
        })
        $('#cekstatus').click(function() {
            $('#cardimg').html(
                `<img src="{{ url('assets/images/loading.gif') }}" class="card-img-top center" alt="cardimg" id="qrcode"  style="height:250px; width:250px;">`
            );

            socket.emit('check', 'check');
        })

        socket.on('isdelete', function(msg) {
            $('#cardimg').html(msg);
        })
    </script>
@endsection
