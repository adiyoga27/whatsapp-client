const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
const final_data = {
    customer_name: null,
    customer_phone: null,
    shipping: {
        province: null,
        city: null,
        subdistrict: null,
        courir: "",
        fee: 0,
    },
};
let get_all_weight = 0;
let busy = false;
let order_data = [];
$(document).ready(async function () {
    $(".province").select2({
        placeholder: "Pilih Provinsi",
        allowClear: true,
    });
    $(".city").select2({
        placeholder: "Pilih kabupaten/Kota",
        allowClear: true,
    });
    $(".subdistrict").select2({
        placeholder: "Pilih Kecamatan",
        allowClear: true,
    });
    let data = [];
    let local_data = localStorage.getItem("cart");
    if (local_data) {
        data = JSON.parse(
            CryptoJS.AES.decrypt(local_data, profile.web_name).toString(
                CryptoJS.enc.Utf8
            )
        );
    }
    order_data = data;
    await getData(data);
    await count_price(data, final_data.shipping.fee);
    await getProvince();
});

async function getProvince() {
    $.ajax({
        url: "https://api-mobile.saddannusantara.com/gsongkir/v2/province.php",
        method: "GET",
        beforeSend: function (request) {
            Swallalert("loading");
        },
    }).done(function (element) {
        $(".province").empty().trigger("change");
        var newOption = new Option("Pilih", "", false, false);
        $(".province").append(newOption).trigger("change");
        element.data.forEach((e) => {
            var newOption = new Option(e.province, e.province_id, false, false);
            $(".province").append(newOption).trigger("change");
        });

        Swallalert("close");
    });
}

async function getCity(id) {
    $.ajax({
        url: `https://api-mobile.saddannusantara.com/gsongkir/v2/city.php?province=${id}`,
        method: "GET",
        beforeSend: function (request) {
            Swallalert("loading");
        },
    }).done(function (element) {
        $(".city").empty().trigger("change");
        $(".subdistrict").empty().trigger("change");
        var newOption = new Option("Pilih", "", false, false);
        $(".city").append(newOption).trigger("change");
        element.data.forEach((e) => {
            var newOption = new Option(e.city_name, e.city_id, false, false);
            $(".city").append(newOption).trigger("change");
        });
        Swallalert("close");
    });
}

async function getSubdistrict(id) {
    $.ajax({
        url: `https://api-mobile.saddannusantara.com/gsongkir/v2/subdistrict.php?city=${id}`,
        method: "GET",
        beforeSend: function (request) {
            Swallalert("loading");
        },
    }).done(function (element) {
        $(".subdistrict").empty().trigger("change");
        var newOption = new Option("Pilih", "", false, false);
        $(".subdistrict").append(newOption).trigger("change");
        element.data.forEach((e) => {
            var newOption = new Option(
                e.subdistrict_name,
                e.subdistrict_id,
                false,
                false
            );
            $(".subdistrict").append(newOption).trigger("change");
        });
        Swallalert("close");
    });
}

async function getCost(id) {
    $.ajax({
        url: `/api/get-cost?destination=${id}&weight=${get_all_weight}`,
        method: "GET",
        contentType: false,
        processData: false,
        dataType: "JSON",

        beforeSend: function (request) {
            Swallalert("loading");
        },
    }).done(function (element) {
        let data = [];
        element.data.forEach((e, idx) => {
            let item = `
                    <div class="flex gap-x-3">
                        <div class="self-center">
                            <input id="${idx}" data-name="${
                e.service_id
            }" type="radio" value="${
                e.amount
            }" name="ongkir" class="ongkir-change" required>
                        </div>
                        <label for="${idx}" class="self-center text-davy-grey text-[16px] lg:text-base md:text-[14px] cursor-pointer">
                            <div class="mb-[6px] font-poppins-semibold"> ${
                                e.service_id
                            } <span class="font-poppins-regular"> (${
                e.etd
            } hari)</span></div>
                            <div class="text-[14px] md:text-[12px]"> ${formatRupiah(
                                e.amount.toString(),
                                "Rp"
                            )}</div>
                        </label>
                    </div>`;
            data.push(item);
        });
        $(".option-ongkir").html(data);

        Swallalert("close");
    });
}

async function getData(data) {
    let v_item_cart = [];
    let submit_data = "";
    if (data.length > 0) {
        // <button class="border border-forest-green w-full py-[17px] text-[15px] rounded-[8px]  text-forest-green
        // md:py-[14px] lg:text-[13px] md:text-[12px]">Batalkan
        // Pesanan</button>
        data.forEach((element) => {
            let html_item_cart_data = `
            <div class="shadow-custom-8 py-8  rounded-[20px]  lg:px-4 lg:py-6 item">
                <div class="flex  gap-x-6  md:gap-x-[11px]">
                    <div class="self-center">
                        <img src="/storage/${element.image}"
                            class=" h-[140px] w-[190px] object-contain  md:w-[90px] md:h-[154px] image-cart"
                                alt="">
                    </div>
                    <div class="flex-1 self-center">
                        <div class="flex mb-3 gap-x-2 justify-between">
                            <div class="flex-1">
                                <div class="text-black-olive  text-[20px]   font-poppins-semibold mb-1 lg:text-base">
                                    ${element.product_name}
                                </div>
                                <div class="text-gray-10 text-[20px] lg:text-base">${
                                    element.qty
                                } qty, ${element.data_variant.name}</div>
                            </div>
                        </div>
                        <div class="flex justify-between gap-x-2">
                            
                            <div class="text-[24px] text-forest-green font-poppins-semibold lg:text-base">Rp ${formatRupiah(
                                element.data_variant.price.toString()
                            )}</div>
                        </div>
                    </div>
                </div>
                <div class="font-poppins-regular text-[14px] ${
                    element.note ? "" : "hidden"
                }">
                    <div class="text-forest-green"> Note : </div>
                    <div class="text-note ">${element.note}</div>
                </div>
            </div>`;
            v_item_cart.push(html_item_cart_data);
        });
    } else {
        v_item_cart = `<div class="font-poppins-regular text-base">Tidak ada data</div>`;
        $(".group-submit-data").html("");
    }
    $(".item-cart").html(v_item_cart);
}
$(document).on("click", ".change-qty", async function (e) {
    e.preventDefault();
    if (busy) return;
    const id = $(this).data("id");
    const check = $(this).data("status");
    let data = order_data.find((x) => x.data_variant.id == id);
    switch (check) {
        case "plush":
            data.qty = data.qty + 1;
            break;
        case "minus":
            data.qty = data.qty > 1 ? data.qty - 1 : 1;
            break;
    }

    $(this).parent().find(".qty").html(data.qty);
    await count_price(order_data, final_data.shipping.fee);
});
$(document).on("change", ".ongkir-change", async function () {
    const name = $(this).data("name");
    const price = Number($(this).val());
    final_data.shipping.courir = name;
    final_data.shipping.fee = price;
    $(".ongkir-price").html(price);
    count_price(order_data, price);
});

async function count_price(data, ongkir) {
    let sub_count_price = data.reduce(function (a, b) {
        return a + b.data_variant.price * b.qty;
    }, 0);
    let count_qty = data.reduce(function (a, b) {
        return a + b.qty;
    }, 0);
    let count_weight = data.reduce(function (a, b) {
        return a + b.data_variant.weight * b.qty;
    }, 0);
    let count_price = sub_count_price + ongkir;
    get_all_weight = count_weight;

    $(".sub-count-price").html(formatRupiah(sub_count_price.toString()));
    $(".ongkir-price").html(formatRupiah(ongkir.toString()));
    $(".count-price").html(formatRupiah(count_price.toString()));
    $(".count-qty").html(formatRupiah(count_qty.toString()));
    $(".count-weight").html(formatRupiah(count_weight.toString()) + " Gram");
}
$(".province").on("select2:select", async function (e) {
    const id = $(this).val();
    final_data.shipping.province = id;
    await getCity(id);
});
$(".city").on("select2:select", async function (e) {
    const id = $(this).val();
    final_data.shipping.city = id;
    await getSubdistrict(id);
});
$(".subdistrict").on("select2:select", async function (e) {
    const id = $(this).val();
    final_data.shipping.subdistrict = id;
    await getCost(id);
});
$("#form_submit").submit(async (e) => {
    e.preventDefault();
    if (order_data.length <= 0) return;
    busy = true;
    $(".submit-data").find("svg").removeClass("hidden");
    Swallalert("loading");
    $(".submit-data").prop("disabled", true);
    let forms = new FormData($("#form_submit")[0]);
    final_data.customer_name = forms.get("customer_name");
    final_data.customer_phone = forms.get("customer_phone");
    final_data.shipping.province = forms.get("province");
    final_data.shipping.city = forms.get("city");
    final_data.shipping.subdistrict = forms.get("subdistrict");
    final_data.shipping.address = forms.get("address");
    const final_order = [];
    order_data.forEach((e) => {
        let items = {
            product_variant_id: e.data_variant.id,
            quantity: e.qty,
        };
        if (e.note) {
            items.note = e.note;
        }
        final_order.push(items);
    });
    final_data.orders_details = final_order;
    try {
        let response = await fetch("/api/orders/checkout", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            method: "POST",
            body: JSON.stringify(final_data),
        });
        const data = await response.json();
        if (!response.ok) throw data;
        await Swallalert("success", {
            message: "Data berhasil dikirim",
        });
        localStorage.removeItem("cart");
        window.location.href = `/invoice/${data.data.uuid}`;
    } catch (e) {
        busy = false;
        Swallalert("close");
        $(".submit-data").prop("disabled", false);
        Swallalert("error", e);
    }
});
