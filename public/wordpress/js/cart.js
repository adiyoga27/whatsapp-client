let busy = false;
let order_data = [];
$(document).ready(async function () {
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
    await count_price(data);
});

async function getCost(id) {
    let forms = new FormData();
    forms.append("weight", "100");
    forms.append("destination", id);
    $.ajax({
        url: "/api/get-cost",
        method: "POST",
        contentType: false,
        processData: false,
        dataType: "JSON",
        data: forms,
    }).done(function (element) {
        let data = [];
        element.data.forEach((e, idx) => {
            let item = `
                    <div class="flex gap-x-3">
                        <div class="self-center">
                            <input id="${idx}" data-name="${e.service_id}" type="radio" value="${e.amount}" name="ongkir" class="ongkir-change" required>
                        </div>
                        <label for="${idx}" class="self-center text-davy-grey text-[18px] lg:text-base md:text-[14px]">${e.service_id}</label>
                    </div>`;
            data.push(item);
        });
        $(".option-ongkir").html(data);
    });
}
async function deleteData(id) {
    const index = order_data.findIndex((x) => x.data_variant.id == id);
    order_data.splice(index, 1);
    await getData(order_data);
    await count_price(order_data);
    localStorage.setItem(
        "cart",
        CryptoJS.AES.encrypt(JSON.stringify(order_data), profile.web_name)
    );
}

async function getData(data) {
    let v_item_cart = [];
    if (data.length > 0) {
        data.forEach((element) => {
            let html_item_cart_data = `
            <div class="shadow-custom-8 py-8 rounded-[20px]  lg:px-4 lg:py-6 item">
                <div class="flex  gap-x-6 md:gap-x-[11px]">
                    <div class="self-center">
                        <img src="/storage/${element.image}"
                            class=" h-[140px] w-[190px] object-contain  md:w-[90px] md:h-[154px] image-cart"
                                alt="">
                    </div>
                    <div class="flex-1 self-center">
                        <div class="flex mb-8 gap-x-2 justify-between">
                            <div class="flex-1">
                                <div class="text-black-olive  text-[20px]   font-poppins-semibold mb-1 lg:text-base">
                                    ${element.product_name}
                                </div>
                                <div class="text-gray-10 text-[20px] lg:text-base">${
                                    element.data_variant.name
                                }</div>
                            </div>
                            <span class="self-center cursor-pointer delete-item" data-id="${
                                element.data_variant.id
                            }" >
                                <svg width="30" height="30" viewBox="0 0 44 44" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_62_821)">
                                        <path d="M7.3335 12.8333H36.6668" stroke="#BEBEBE" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.3335 20.1667V31.1667" stroke="#BEBEBE" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M25.6665 20.1667V31.1667" stroke="#BEBEBE" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M9.1665 12.8333L10.9998 34.8333C10.9998 35.8058 11.3861 36.7384 12.0738 37.426C12.7614 38.1137 13.694 38.5 14.6665 38.5H29.3332C30.3056 38.5 31.2383 38.1137 31.9259 37.426C32.6135 36.7384 32.9998 35.8058 32.9998 34.8333L34.8332 12.8333"
                                            stroke="#BEBEBE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M16.5 12.8333V7.33333C16.5 6.8471 16.6932 6.38079 17.037 6.03697C17.3808 5.69315 17.8471 5.5 18.3333 5.5H25.6667C26.1529 5.5 26.6192 5.69315 26.963 6.03697C27.3068 6.38079 27.5 6.8471 27.5 7.33333V12.8333"
                                            stroke="#BEBEBE" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_62_821">
                                            <rect width="44" height="44" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                        </div>
                        <div class="flex justify-between gap-x-2">
                            <div class="flex gap-x-[10px] ">
                                <span class="self-center cursor-pointer change-qty" data-id="${
                                    element.data_variant.id
                                }" data-status="minus">
                                    <svg class="lg:w-[26px] lg:h-[26px] object-contain" width="32" height="32"
                                        viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_913)">
                                            <path
                                                d="M4.5 18C4.5 19.7728 4.84919 21.5283 5.52763 23.1662C6.20606 24.8041 7.20047 26.2923 8.45406 27.5459C9.70765 28.7995 11.1959 29.7939 12.8338 30.4724C14.4717 31.1508 16.2272 31.5 18 31.5C19.7728 31.5 21.5283 31.1508 23.1662 30.4724C24.8041 29.7939 26.2923 28.7995 27.5459 27.5459C28.7995 26.2923 29.7939 24.8041 30.4724 23.1662C31.1508 21.5283 31.5 19.7728 31.5 18C31.5 16.2272 31.1508 14.4717 30.4724 12.8338C29.7939 11.1959 28.7995 9.70765 27.5459 8.45406C26.2923 7.20047 24.8041 6.20607 23.1662 5.52763C21.5283 4.84919 19.7728 4.5 18 4.5C16.2272 4.5 14.4717 4.84919 12.8338 5.52763C11.1959 6.20607 9.70765 7.20047 8.45406 8.45406C7.20047 9.70765 6.20606 11.1959 5.52763 12.8338C4.84919 14.4717 4.5 16.2272 4.5 18Z"
                                                stroke="#141821" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.5 18H22.5" stroke="#141821" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1_913">
                                                <rect width="36" height="36" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
            
                                </span>
                                <span
                                    class="self-center font-poppins-medium text-[24px]
                            lg:text-[18px] qty">${element.qty}</span>
                                <span class="self-center cursor-pointer change-qty" data-id="${
                                    element.data_variant.id
                                }" data-status="plush">
                                    <svg class="lg:w-[26px] lg:h-[26px]  object-contain" width="32" height="32"
                                        viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_905)">
                                            <path
                                                d="M4.5 18C4.5 19.7728 4.84919 21.5283 5.52763 23.1662C6.20606 24.8041 7.20047 26.2923 8.45406 27.5459C9.70765 28.7995 11.1959 29.7939 12.8338 30.4724C14.4717 31.1508 16.2272 31.5 18 31.5C19.7728 31.5 21.5283 31.1508 23.1662 30.4724C24.8041 29.7939 26.2923 28.7995 27.5459 27.5459C28.7995 26.2923 29.7939 24.8041 30.4724 23.1662C31.1508 21.5283 31.5 19.7728 31.5 18C31.5 16.2272 31.1508 14.4717 30.4724 12.8338C29.7939 11.1959 28.7995 9.70765 27.5459 8.45406C26.2923 7.20047 24.8041 6.20607 23.1662 5.52763C21.5283 4.84919 19.7728 4.5 18 4.5C16.2272 4.5 14.4717 4.84919 12.8338 5.52763C11.1959 6.20607 9.70765 7.20047 8.45406 8.45406C7.20047 9.70765 6.20606 11.1959 5.52763 12.8338C4.84919 14.4717 4.5 16.2272 4.5 18Z"
                                                stroke="#141821" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.5 18H22.5" stroke="#141821" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M18 13.5V22.5" stroke="#141821" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1_905">
                                                <rect width="36" height="36" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
            
                                </span>
                            </div>
                            <div class="text-[24px] text-forest-green font-poppins-semibold lg:text-base">Rp ${formatRupiah(
                                element.data_variant.price.toString()
                            )}</div>
                        </div>
                    </div>
                </div>
                <div class="font-poppins-regular text-[14px]">
                    <div class="flex gap-x-3">
                        <div class="text-note ${
                            element.note ? "" : "hidden"
                        }">${element.note}</div>
                        <div class="text-forest-green action-note cursor-pointer">${
                            element.note ? "Edit Catatan" : "Tulis Catatan"
                        }</div>
                    </div>
                    <div class="hidden notes">
                        <textarea placeholder="Note" data-id="${
                            element.data_variant.id
                        }" class="w-full py-[5px] px-[15px] rounded-[8px] border-forest-green text-arsenic-1 text-[12px]   outline-0 resize-none note 
                        focus:ring-transparent focus:border-forest-green placeholder:text-light-silver
                        md:text-[12px] md:py-[10px] md:px-[16px]">${
                            element.note ?? ""
                        }</textarea>
                    </div>
                </div>
            </div>
            `;
            v_item_cart.push(html_item_cart_data);
        });
    } else {
        v_item_cart = `<div class="font-poppins-regular text-base">Tidak ada data</div>`;
        $(".group-submit").html("");
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
    localStorage.setItem(
        "cart",
        CryptoJS.AES.encrypt(JSON.stringify(order_data), profile.web_name)
    );
    await count_price(order_data);
});
$(document).on("change", ".ongkir-change", async function () {
    const name = $(this).data("name");
    const price = Number($(this).val());
    final_data.shipping.courir = name;
    final_data.shipping.fee = price;
    $(".ongkir-price").html(price);
    count_price(order_data, price);
});

$(document).on("click", ".delete-item", async function () {
    if (busy) return;
    const id = $(this).data("id");
    deleteData(id);
});

async function count_price(data) {
    let count_price = data.reduce(function (a, b) {
        return a + b.data_variant.price * b.qty;
    }, 0);
    let count_qty = data.reduce(function (a, b) {
        return a + b.qty;
    }, 0);
    let count_weight = data.reduce(function (a, b) {
        return a + b.data_variant.weight * b.qty;
    }, 0);
    $(".count-price").html(formatRupiah(count_price.toString()));
    $(".count-qty").html(formatRupiah(count_qty.toString()));
    $(".count-weight").html(formatRupiah(count_weight.toString()) + " Gram");
}
$(document).on("click", ".action-note", async function (e) {
    $(this).parent().addClass("hidden");
    $(this).parent().parent().find(".notes").removeClass("hidden");
    $(this).parent().parent().find("textarea").focus();
});
$(document).on("blur", ".note", function () {
    const id = $(this).data("id");
    const value = $(this).val();
    $(this).parent().parent().find(".notes").addClass("hidden");
    $(this)
        .parent()
        .parent()
        .find(".action-note")
        .parent()
        .removeClass("hidden");
    $(this)
        .parent()
        .parent()
        .find(".action-note")
        .html(
            value.replace(/\s/g, "") == "" ? "Tambah Catatan" : "Edit Catatan"
        );
    $(this).parent().parent().find(".text-note").html($(this).val());
    if (value.replace(/\s/g, "") !== "") {
        $(this).parent().parent().find(".text-note").removeClass("hidden");
        order_data.find((x) => x.data_variant.id == id).note = value;
    } else {
        $(this).parent().parent().find(".text-note").addClass("hidden");
        delete order_data.find((x) => x.data_variant.id == id).note;
    }
    localStorage.setItem(
        "cart",
        CryptoJS.AES.encrypt(JSON.stringify(order_data), profile.web_name)
    );
});
$(".submit-data").click(async (e) => {
    e.preventDefault();
    if (order_data.length <= 0) return;
    busy = true;
    $(".submit-data").prop("disabled", true);
    localStorage.setItem(
        "cart",
        CryptoJS.AES.encrypt(JSON.stringify(order_data), profile.web_name)
    );
    window.location.href = "/shipping";
});
