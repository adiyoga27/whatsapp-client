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
     


    var apiKey = "{{$whatsapp->apikey}}";
    var isLogin = false;
    var socket;
    $(document).ready(function () {
        socket = io('http://wabot.galkasoft.id:7991');
   

        socket.emit("init", {
                    api_key: apiKey,
        });
        socket.on("device", function (data) {
            if(data.api_key == apiKey){
             $('#cardimg').html(`<h2 class="text-center text-success mt-4">Whatsapp Connected.<br>` + data.message + `<h2>`);

            if (data.status == 'scan_qr') {
                console.log(data);
              
                $('#cardimg').html(` <img src="` + data.qr +
                `" class="card-img-top" alt="cardimg" id="qrcode" style="height:250px; width:250px;">`);
            }
            if (data.status == 'connected') {
             $('#cardimg').html(`<h2 class="text-center text-success mt-4">Whatsapp Connected.<br>` + data.message + `<h2>`);
              

            }
            if (data.status == 'logout') {
                $('#cardimg').html(`<h2 class="text-center text-dark mt-4">Please wait..<h2>`);
                $('.log').html(`<li>Connecting..</li>`);
                socket.emit('logout', 'delete');
            }
            if (data.status == 'loading') {
                `<img src="{{ url('assets/images/loading.gif') }}" class="card-img-top center" alt="cardimg" id="qrcode"  style="height:250px; width:250px;">`
            }
            if (data.status == 'failed') {
                $('#device-whatsapp').hide();
                $('#loading').show();
                alert(data.message);
            }
            console.log(data);
            }

           
            // $('#qrcode').attr("src", data.src);
            // $(`.client.client-${data.id} #qrcode`).show();
        });
    });

    function find() {
        apiKey = $('#api-key').val();
        socket.emit("find", {
                    api_key: apiKey,
        });
        if(apiKey == ""){
            alert('Kolom apikey tidak boleh kosong !!!');
            return;
        }
        $('#loading').show();
        $('#lines').show();
        $('#sub-title').text('Please Waiting ....');
        $('#title').text("Api Key : "+apiKey);
        socket.emit("init", {
                    api_key: apiKey,
        });
        $('#device-whatsapp').show();

    }

    function logout() {
        apiKey = $('#api-key').val();
        socket.emit("logout", {
                    api_key: apiKey,
        });
    }
    function status(params) {
        apiKey = $('#api-key').val();
        socket.emit("refresh", {
                    api_key: apiKey,
        });
    }

    </script>
@endsection
