let price = 0;
$(document).ready(async function () {
    const data = await getData(id);
    price = data.total;
    $(".price").attr("data-value", data.total);
    $(".no-inv").html(data.invoice_number);
    $(".exp-date").html(
        moment(data.expired_at).format("DD MMMM YYYY HH:mm:ss")
    );
    $(".count-price").html(
        formatRupiah(
            data.total_amount ? data.total_amount.toString() : "0",
            "Rp"
        )
    );
    $(".customer-name").html(data.customer_name);
    $(".customer-address").html(data.customer_address);
    $(".customer-phone").html(data.customer_phone);
    $(".kurir").html(data.shipping_expedition);
    if (data.bank.length > 0) {
        const html_bank = [];
        data.bank.forEach((element) => {
            let items = `
            <div class="flex  md:flex-col gap-x-[20px] gap-y-[9px]">
                        <div class="grid grid-cols-2 gap-x-[9px]">
                            <div class="text-[12px]">
                                <div>Nama Bank</div>
                                <div class="font-poppins-semibold text-base md:text-[14px]">${element.account_name}</div>
                            </div>
                            <div class="text-[12px]">
                                <div>No Bank</div>
                                <div class="font-poppins-semibold text-base md:text-[14px]">${element.account_number}</div>
                            </div>
    
                        </div>
                        <div class="self-center md:flex-1 md:w-full">
                            <button class="bg-forest-green py-2 px-6 rounded-[5px] text-[12px] text-white md:w-full copy-clipboard"  data-value="${element.account_number}" >Salin
                                Nomer</button>
                        </div>
                    </div>
            `;
            html_bank.push(items);
        });
        $(".group-bank").html(html_bank);
    }
    if (data.order_details.length > 0) {
        const order_html = [];
        data.order_details.forEach((element) => {
            let item = `
            <tr class="font-poppins-regular text-[12px]">
                <td class="py-2 px-2 text">${element.product_name}</td>
              
                <td class="py-2 px-2 text-center">${element.quantity}</td>
                <td class="py-2 px-2 text-center">${
                    element.product_variant.weight
                } Gram</td>
                <td class="py-2 px-2 text-center">${formatRupiah(
                    element.total.toString(),
                    "Rp"
                )}</td>
            </tr>
            <tr class="font-poppins-regular text-[12px] border-b border-forest-green">
                <td colspan="4"  class="pb-2 px-2  ">Note : ${
                    element.note ?? "-"
                }</td>
            </tr>`;
            order_html.push(item);
        });
        $(".order-data").html(order_html.join(""));
        $(".sub-count").html(formatRupiah(data.total.toString(), "Rp"));
        $(".ongkir").html(formatRupiah(data.shipping_fee.toString(), "Rp"));
    }
});
async function getData(id) {
    try {
        let response = await fetch(`/api/order/invoice?id=${id}`, {
            method: "GET",
        });

        if (!response.ok) throw await response.json();
        const data = await response.json();
        return data.data;
    } catch (e) {
        Swallalert("error", {
            message: "Tidak ada data",
        });
    }
}

$(document).on("click", ".copy-clipboard", async function (e) {
    e.preventDefault();
    let value = $(this).data("value");
    navigator.clipboard.writeText(value);
});
