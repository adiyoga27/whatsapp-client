let data_variant = null;
let qty = 1;
let data = [];
$(document).ready(function () {
    data = [];
    qty = 1;
    data_variant = null;
    if (product.variant.length > 0) {
        const id = $(".variant").data("id");
        $(".variant")
            .eq(0)
            .removeClass("bg-forest-green text-forest-green text-white");
        $(".variant").eq(0).addClass("bg-forest-green text-white");
        console.log(product);
        product.variant.forEach((element) => {
            element.variant_detail.forEach((x) => {
                if (x.id == id) data_variant = x;
            });
        });

        $(".submit-variant").prop("disabled", false);
    }

    $(".qty").html(qty);
    let local_data = localStorage.getItem("cart");
    if (local_data)
        data = JSON.parse(
            CryptoJS.AES.decrypt(local_data, profile.web_name).toString(
                CryptoJS.enc.Utf8
            )
        );
});
$(".change-qty").click(function (e) {
    let check = $(this).data("status");
    switch (check) {
        case "remove":
            qty = qty > 1 ? qty - 1 : 1;
            break;
        case "add":
            qty++;
            break;
    }
    $(".qty").html(qty);
});
$(".variant").click(function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    $(".variant").removeClass("bg-forest-green text-forest-green text-white");
    $(this).addClass("bg-forest-green text-white");
    product.variant.forEach((element) => {
        element.variant_detail.forEach((x) => {
            if (x.id == id) data_variant = x;
        });
    });
    $(".price").html(data_variant.price);
    $(".submit-variant").prop("disabled", false);
});
$(".submit-variant").click(function (e) {
    let local_data = localStorage.getItem("cart");
    if (local_data) {
        data = JSON.parse(
            CryptoJS.AES.decrypt(local_data, profile.web_name).toString(
                CryptoJS.enc.Utf8
            )
        );
    }
    if (!data_variant) return;
    let check = data.find((x) => x.data_variant.id === data_variant.id);
    if (check) {
        check.qty = qty;
    } else {
        data.push({
            qty: qty,
            product_name: product.name,
            image: product.image,
            data_variant,
        });
    }
    localStorage.setItem(
        "cart",
        CryptoJS.AES.encrypt(JSON.stringify(data), profile.web_name)
    );
    window.location.href = "/cart";
});
