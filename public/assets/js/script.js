const formatRupiah = (money) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(money);
}

$(document).on('click', '#btn-book-view', function () {
    let url_show = $(this).data('book-view-url')

    $.ajax({
        url: url_show,
        type: "GET",
        success: function (data) {
            $('#book-image').attr('src', '/storage/' + data.image)
            $('#book-title').html(data.title)
            $('#book-category').html(data.name)
            $('#book-price').html(formatRupiah(data.price))
            $('#book-description').html(data.description)
            if (data.is_active == 1) {
                $('#book-status').html('<span class="badge badge-pill badge-soft-success font-size-11">Active</span>')
            } else {
                $('#book-status').html('<span class="badge badge-pill badge-soft-danger font-size-11">Non Active</span>')
            }
        }
    })
})


$(document).on('click', '#article-view-btn', function () {
    let url_article = $(this).data('article-url')

    $.ajax({
        url: url_article,
        type: "GET",
        success: function (data) {
            $('#article-image').attr('src', '/storage/' + data.image)
            $('#article-title').html(data.title)
            $('#article-category').html(data.name)
            $('#article-user').html(data.username)
            $('#article-description').html(data.description)
            $('#article-keyword').html(data.keyword)
            if (data.is_active == 1) {
                $('#article-status').html('<span class="badge badge-pill badge-soft-success font-size-11">Active</span>')
            } else {
                $('#article-status').html('<span class="badge badge-pill badge-soft-danger font-size-11">Non Active</span>')
            }
        }
    })
})

$(document).on('click', '#btn-product-view', function () {
    let url_show = $(this).data('product-view-url')

    $.ajax({
        url: url_show,
        type: "GET",
        success: function (data) {
            console.log(data);
            $('#product-name').html(data.name)
            $('#product-category').html(data.category_name)
            $('#product-price').html(formatRupiah(data.price))
            $('#product-description').html(data.description)
            $('#product-keyword').html(data.keyword)
            if (data.is_active == 1) {
                $('#product-status').html('<span class="badge badge-pill badge-soft-success font-size-11">Active</span>')
            } else {
                $('#product-status').html('<span class="badge badge-pill badge-soft-danger font-size-11">Non Active</span>')
            }
            $('#product-image').attr('src', '/storage/' + data.image)

        }
    })
})

$(document).on('click', '#btn-testimonial-view', function () {
    let url_show = $(this).data('testimonial-view-url')
    $.ajax({
        url: url_show,
        type: "GET",
        success: function (data) {
            $('#testimonial-image').attr('src', '/storage/' + data.photo)
            $('#testimonial-name').html(data.name)
            $('#testimonial-phone').html(data.phone)
            $('#testimonial-rate-star').html(data.rate_star)
            if (data.is_active == 1) {
                $('#testimonial-status').html('<span class="badge badge-pill badge-soft-success font-size-11">Active</span>')
            } else {
                $('#testimonial-status').html('<span class="badge badge-pill badge-soft-danger font-size-11">Non Active</span>')
            }
            $('#testimonial-description').html(data.description)
        }
    })
})

$(document).on('click', '#btn-message-view', function () {
    let url_show = $(this).data('message-view-url')
    $.ajax({
        url: url_show,
        type: "GET",
        success: function (data) {
            $('#message-name').html(data.name)
            $('#message-title').html(data.title)
            $('#message-duration').html(data.duration)
            $('#message-message').html(data.message)
        }
    })
})

$(document).on('click', '#btn-queue-data-view', function () {
    let url_show = $(this).data('queue-data-view-url')
    let url_update = $(this).data('queue-update-url')
    $.ajax({
        url: url_show,
        type: "GET",
        success: function (data) {
            $('#input-name-queue').val(data.name)
            $('#input-phone-queue').val(data.phone)
            $('#status-input').val(data.status)
            $('#form-update').attr('action', url_update)
        }
    })
})

$(document).on('click', '#btn-detail-order-view', function () {
    let url_show = $(this).data('detail-order-view-url')
    $.ajax({
        url: url_show,
        type: "GET",
        success: function (data) {
            $('#order-invoice-number').html(data.invoice_number)
            $('#order-customer-name').html(data.customer_name)
            $('#order-customer-phone').html(data.customer_phone)
            $('#order-address').html(data.customer_address)
            $('#order-weight').html(data.weight + 'g')
            $('#order-total').html(formatRupiah(data.total))
            $('#order-expired_at').html(data.expired_at)
            $('#total-amount').html(formatRupiah(data.total))
            if (data.paid_at == null) {
                $('#order-paid_at').html('<span class="badge badge-pill badge-soft-danger font-size-11">Unpaid</span>')
            } else {
                $('#order-paid_at').html(data.paid_at)

            }
            if (data.approve_by == null) {
                $('#order-approved_by').html('<span class="badge badge-pill badge-soft-danger font-size-11">Unapproved</span>')
            } else {
                $('#order-approved_by').html(data.approve_by)
            }
            if (data.status == 'pending') {
                $('#order-status').html('<span class="badge badge-pill badge-soft-warning font-size-11">Pending</span>')
            } else if (data.status == 'paid') {
                $('#order-status').html('<span class="badge badge-pill badge-soft-success font-size-11">Paid</span>')
            } else if (data.status == 'shipped') {
                $('#order-status').html('<span class="badge badge-pill badge-soft-secondary font-size-11">Shipped</span>')
            } else if (data.status == 'expired') {
                $('#order-status').html('<span class="badge badge-pill badge-soft-danger font-size-11">Expired</span>')
            }
            $('.order-detail').empty()
            $('.note-list').empty()

            $.each(data.order_detail, function (i, val) {
                $('.order-detail').append(`<div class="col-lg-6"><div class="docs-toggles"><ul class="list-group"><li class="list-group-item"><label class="text-bold" key="">Product Name</label><br><span >${val.product_name}</span></li></ul></div></div><div class="col-lg-6"><div class="docs-toggles"><ul class="list-group"><li class="list-group-item"><label class="text-bold" key="">Price</label><br><span >${formatRupiah(val.price)}</span></li></ul></div></div></div><div class="col-lg-6"><div class="docs-toggles"><ul class="list-group"><li class="list-group-item"><label class="text-bold" key="">Qty</label><br><span >${val.quantity}</span></li></ul></div></div></div><div class="col-lg-6"><div class="docs-toggles"><ul class="list-group"><li class="list-group-item"><label class="text-bold" key="">Total</label><br><span >${formatRupiah(val.total)}</span></li></ul></div></div>`)
            })
            $.each(data.order_detail, function (i, value) {
                $('.note-list').append(`<span> ${i+1}. ${value.note} <br></span>`)
            })

        }
    })
})

// $(document).on('click', '#btn-update-variant', function () {
//     let url_show = $(this).data('update-view-url')
//     let url_update = $(this).data('update-url')
//     $.ajax({
//         url: url_show,
//         type: "GET",
//         success: function (data) {
//             console.log(data)
//             // $('#input-name-queue').val(data.name)

//         }
//     })
// })

$(document).on('click', '#btn-access-view', function () {


    let url = $(this).data('access-view-url')
    let wa_access_id = $(this).data('whatsapp-acc-id')
    let whatsapp = $(this).data('whastapp')
    $('#form-whatsapp-access').attr('action', url);

    $.ajax({
        url: whatsapp,
        type: "GET",
        success: function (data) {
            $('#whatsapp-list').empty()

            for (let i = 0; i < data.length; i++) {
                const val = data[i];
                let check = ''
                if (wa_access_id !== '') {
                    const filteredData = wa_access_id.filter(value => value == val.id);

                    if (filteredData.length !== 0) {
                        check = "checked"
                    }
                }

                $('#whatsapp-list').append(
                    '<li class="list-group-item"><div class="form-check form-check-primary"><input class="form-check-input id-check" ' + check + ' type="checkbox" id="formCheckcolor' + val.id + '" id="check-option"name="whatsapp[]" value="' + val.id + '"><label class="form-check-label"for="formCheckcolor' + val.id + '">' + val.name + '</label></div> </li>'
                )
            }
        }
    })
})


// sweet alert
// delete
$(document).on('click', '#delete-btn', function (e) {
    e.preventDefault()
    let url = $(this).data('softdeletedurl')

    $('#form-delete').attr('action', url)

    Swal.fire({
        title: 'Are you sure?',
        text: "This data will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            $('#form-delete').submit()
        }
    })
})

$(document).on('click', '#approve-btn', function (e) {
    e.preventDefault()
    let url = $(this).data('approve-url')

    $('#form-approve').attr('action', url)

    Swal.fire({
        title: 'Are you sure?',
        text: "This data will be approved!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Approved!',
                'success'
            )
            $('#form-approve').submit()
        }
    })
})

// restore data buku
$(document).on('click', '#restore-btn', function (e) {
    e.preventDefault()
    let id = $(this).data('book-restore-id')
    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "/restore/book/" + id
        }
    })

})



// restore book category
$(document).on('click', '#bookcategory-restore-btn', function (e) {
    e.preventDefault()
    let id = $(this).data('bookcategory-id')
    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "/book-category/restore/" + id
        }
    })

})




// force delete
$(document).on('click', '#book-force-delete-btn', function (e) {
    e.preventDefault()

    let id = $(this).data('book-force-id')
    $('#force-delete-form').attr('action', '/force-delete/book/' + id)

    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#force-delete-form').submit()
        }
    })

})

// book category
$(document).on('click', '#bookcategory-force-delete-btn', function (e) {
    e.preventDefault()

    let id = $(this).data('bookcategory-force-id')
    $('#bookcategory-force-delete').attr('action', '/book-category/forcedelete/' + id)

    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#bookcategory-force-delete').submit()
        }
    })

})


// article
// restore data
$(document).on('click', '#article-restore-btn', function (e) {
    e.preventDefault()
    let id = $(this).data('article-restore-id')
    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "/restore/article/" + id
        }
    })

})

// force delete
$(document).on('click', '#article-force-delete-btn', function (e) {
    e.preventDefault()

    let url = $(this).data('article-force-url')
    $('#article-force-delete-form').attr('action', url)

    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#article-force-delete-form').submit()
        }
    })

})


// article category
// restore data
$(document).on('click', '#article-category-restore-btn', function (e) {
    e.preventDefault()
    let url = $(this).data('article-category-restore-url')

    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = url
        }
    })

})

// force delete
$(document).on('click', '#article-category-force-delete-btn', function (e) {
    e.preventDefault()

    let url = $(this).data('article-category-force-url')
    $('#article-category-force-delete-form').attr('action', url)

    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#article-category-force-delete-form').submit()
        }
    })

})



// restore product

$(document).on('click', '#product-restore-btn', function (e) {
    e.preventDefault()
    let url_data = $(this).data('product-restore-url')
    console.log(url_data);
    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = url_data
        }
    })

})

// force delete product
$(document).on('click', '#product-force-delete-btn', function (e) {
    e.preventDefault()

    let url = $(this).data('product-forcedelete-url')
    $('#product-force-delete-form').attr('action', url)

    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#product-force-delete-form').submit()
        }
    })

})

// restore product category
$(document).on('click', '#product-category-restore-btn', function (e) {
    e.preventDefault()
    let url_data = $(this).data('product-category-restore-url')
    console.log(url_data);
    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = url_data
        }
    })

})

// force delete product
$(document).on('click', '#product-category-force-delete-btn', function (e) {
    e.preventDefault()

    let url = $(this).data('product-category-force-url')
    $('#product-category-force-delete-form').attr('action', url)
    console.log(url);
    Swal.fire({
        title: 'Are you sure?',
        text: "By click Yes the data will be deleted permanently!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#product-category-force-delete-form').submit()
        }
    })

})



// add new data variant
// $(document).ready(function () {
//     $('#form-add-variant').submit(function (e) {
//         e.preventDefault()

//         var formData = $(this).serialize()
//         var url = $('#post-url').val()
//         console.log(url);

//         $.ajax({
//             type: "POST",
//             url: url,
//             data: formData,
//             success: function (response) {
//                 console.log(response);
//             }
//         });
//     })
// })
