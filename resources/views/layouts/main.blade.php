<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>GalkaSoft | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-galkasoft.png') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @isset($css_view)
        {{-- my css --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @endisset

    {{-- dropzone --}}
    {{-- <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/dropzone.min.css" />


    <!-- Sweet Alert-->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- tinymce --}}
    {{-- <script src="https://cdn.tiny.cloud/1/kklvs39k70nel5p3f7emd7wsviorfn7v4eg7q6aqqvjwfbtc/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script> --}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.0/socket.io.js"
        integrity="sha512-+l9L4lMTFNy3dEglQpprf7jQBhQsQ3/WvOnjaN/+/L4i0jOstgScV0q2TjfvRF4V+ZePMDuZYIQtg5T4MKr+MQ=="
        crossorigin="anonymous"></script>
    @yield('mycss')
</head>

<body data-sidebar="dark">

    @yield('content')

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    {{-- dropzone --}}
    {{-- <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- apexcharts -->
    {{-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

    <!-- dashboard init -->
    {{-- <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script> --}}

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>




    <!-- Sweet Alerts js -->
    {{-- <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.all.min.js"></script>

    <!-- Sweet alert init js-->
    {{-- <script src="assets/js/pages/sweet-alerts.init.js"></script> --}}

    {{-- datatable --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- jQuery and Bootstrap dependencies -->

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    @yield('javascript')
    <script>
        $(document).ready(function() {

            $("#myModal").modal('show');

            $('#datatable').DataTable();
            $('#description').summernote({
                height: '300'
            });



            // let textarea = document.getElementById('description');
            // let btnPaste = document.getElementById('paste-text')

            // btnPaste.addEventListener('click', async () => {
            //     const text = await navigator.clipboard.readText()
            //     let = currentContent = tinymce.activeEditor.getContent();
            //     tinymce.activeEditor.setContent(currentContent + text, {
            //         format: 'raw'
            //     });
            //     });
        });

        // tinymce.init({
        //     images_upload_credentials: true,
        //     selector: "#description",
        //     menubar: true,
        //     plugins: "advlist autolink lists link image code charmap pagebreak save ",
        //     toolbar: 'undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code ',
        //     // relative_urls: false,
        //     path_absolute: "/",
        //     images_upload_url: "{{ url('api/tinymce/upload-img') }}",
        //     // images_upload_handler: example_image_upload_handler

        // })


        // $('#select-file').on('change', function() {
        //     let val = this.value

        //     if (val == 'images') {
        //         $('#file-preview').html('<img src="{{ asset('assets/images/default.png') }}" width="100%" alt="">')
        //     } else if (val == 'videos') {
        //         $('#file-preview').html('<video id="video" width="100%" controls></video>')
        //     } else {
        //         $('#file-preview').html('<canvas id="pdfViewer"></canvas>')
        //     }
        // })

        // // upload video preview
        // const input = document.getElementById('file-input');
        // const video = document.getElementById('video');
        // const videoSource = document.createElement('source');

        // input.addEventListener('change', function() {
        //     const files = this.files || [];

        //     if (!files.length) return;

        //     const reader = new FileReader();

        //     reader.onload = function(e) {
        //         videoSource.setAttribute('src', e.target.result);
        //         video.appendChild(videoSource);
        //         video.load();
        //         video.play();
        //     };

        //     reader.onprogress = function(e) {
        //         console.log('progress: ', Math.round((e.loaded * 100) / e.total));
        //     };

        //     reader.readAsDataURL(files[0]);
        // });

        // // upload file
        // var pdfjsLib = window['pdfjs-dist/build/pdf'];
        // // The workerSrc property shall be specified.
        // pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        // $("#file-input").on("change", function(e) {
        //     var file = e.target.files[0]
        //     if (file.type == "application/pdf") {
        //         var fileReader = new FileReader();
        //         fileReader.onload = function() {
        //             var pdfData = new Uint8Array(this.result);
        //             // Using DocumentInitParameters object to load binary data.
        //             var loadingTask = pdfjsLib.getDocument({
        //                 data: pdfData
        //             });
        //             loadingTask.promise.then(function(pdf) {
        //                 console.log('PDF loaded');

        //                 // Fetch the first page
        //                 var pageNumber = 1;
        //                 pdf.getPage(pageNumber).then(function(page) {
        //                     console.log('Page loaded');

        //                     var scale = 1.5;
        //                     var viewport = page.getViewport({
        //                         scale: scale
        //                     });

        //                     // Prepare canvas using PDF page dimensions
        //                     var canvas = $("#pdfViewer")[0];
        //                     var context = canvas.getContext('2d');
        //                     canvas.height = viewport.height;
        //                     canvas.width = viewport.width;

        //                     // Render PDF page into canvas context
        //                     var renderContext = {
        //                         canvasContext: context,
        //                         viewport: viewport
        //                     };
        //                     var renderTask = page.render(renderContext);
        //                     renderTask.promise.then(function() {
        //                         console.log('Page rendered');
        //                     });
        //                 });
        //             }, function(reason) {
        //                 // PDF loading error
        //                 console.error(reason);
        //             });
        //         };
        //         fileReader.readAsArrayBuffer(file);
        //     }
        // });



        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-view");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewSectionOne(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-view-section1");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewSectionTwo(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-view-section2");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewSectionThree(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-view-section3");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewSectionFour(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-view-section4");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreviewSectionFive(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("img-view-section5");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function example_image_upload_handler(blobInfo, success, failure, progress) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', "{{ url('api/tinymce/upload-img') }}");

            xhr.upload.onprogress = function(e) {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = function() {
                var json;

                if (xhr.status === 403) {
                    failure('HTTP Error: ' + xhr.status, {
                        remove: true
                    });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            xhr.onerror = function() {
                failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        };



        // $(document).ready(function() {

        //     var i = 1;
        //     var length;

        //     $("#add").click(function() {

        //         i++;
        //         $('#dynamic_field').append('<tr id="row' + i +
        //             '"><td><input type="text" name="company_name[]" placeholder="Enter the company name" class="form-control"/></td><td><input type="text" name="company_address[]" placeholder="Enter company address" class="form-control"/></td><td><button type="button" name="remove" id="' +
        //             i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        //     });

        //     $(document).on('click', '.btn_remove', function() {
        //         var button_id = $(this).attr("id");
        //         $('#row' + button_id + '').remove();
        //     });

        //     $("#submit").on('click', function(event) {
        //         var formdata = $("#add_name").serialize();
        //         console.log(formdata);

        //         event.preventDefault()

        //         $.ajax({
        //             url: "action.php",
        //             type: "POST",
        //             data: formdata,
        //             cache: false,
        //             success: function(result) {
        //                 alert(result);
        //                 $("#add_name")[0].reset();
        //             }
        //         });

        //     });
        // });
    </script>



</body>

</html>
