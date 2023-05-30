const formatRupiah = (angka, prefix) => {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
};
const Swallalert = (condition, e) => {
    switch (condition) {
        case "error":
            return Swal.fire({
                title: "Gagal",
                text: typeof e === "object" ? e.message : "Sistem error",
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: "Close",
                allowOutsideClick: false,
                icon: "error",
            });

        case "warning-delete":
            return Swal.fire({
                title: "Apakah anda yakin untuk menghapus data ini ?",
                text: "Data akan terhapus secara permanen!",
                showConfirmButton: true,
                icon: "warning",
                confirmButtonText: "Yes",
                showCancelButton: true,
                cancelButtonText: "Close",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "delete",
                    cancelButton: "cancle",
                },
            });

        case "warning":
            return Swal.fire({
                title: e.message,
                icon: "warning",
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showCancelButton: true,
                cancelButtonText: "Close",
                allowOutsideClick: false,
                customClass: {
                    confirmButton: "result",
                    cancelButton: "cancle",
                },
            });

        case "success":
            return Swal.fire({
                title: "Berhasil",
                icon: "success",
                text: e.message,
                timer: 3000,
                showConfirmButton: false,
                allowOutsideClick: false,
            });

        case "loading":
            return Swal.fire({
                text: "Wait a second",
                showConfirmButton: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
        case "close":
            return Swal.close();
    }
};
