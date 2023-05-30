<script>
    const swiper = new Swiper('.swiper', {
        slidesPerView: "auto",
        loop: true,
        centeredSlides: true,
        spaceBetween: 39,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    const swiper_1 = new Swiper('.swiper-1', {
        slidesPerView: "auto",
        loop: true,
        centeredSlides: true,
        spaceBetween: 51,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination-1",
            clickable: true,
        },
    });

    window.onscroll = function(e) {
        if (this.scrollY > 120) {
            $('header').addClass("active")
            return;
        }
        $('header').removeClass("active")
    }

    $('#icon-menu').click(function() {
        $('.sidebar').removeClass("fadeOut");
        $('.sidebar').addClass("fadeIn");
        $('.sidebar').removeClass("lg:hidden");
        document.body.style.overflow = "hidden";
        document.body.style.userSelect = "none";
    });

    $('#icon-hidden').click(function() {
        $('.sidebar').removeClass("fadeIn");
        $('.sidebar').addClass("fadeOut");
        document.body.style.overflow = "auto";
        document.body.style.userSelect = "auto";
        setTimeout(() => {
            $('.sidebar').addClass("lg:hidden");
        }, 500)
    });

    $('.testimoni-modal').click(function() {
        const img = $(this).find('img').attr('src');
        const title = $(this).find('.title').html();
        const des = $(this).find('.des').html()
        $('.modal').removeClass("fadeOut");
        $('.modal').addClass("fadeIn");
        $('.modal').removeClass("hidden");
        $('.backdrop-modal').removeClass("hidden");
        $('.modal').find('img').attr('src', img);
        $('.modal').find('.title').html(title);
        $('.modal').find('.des').html(des);

        document.body.style.overflow = "hidden";
        document.body.style.userSelect = "none";
    });

    function closeModal() {
        $('.modal').removeClass("fadeIn");
        $('.modal').addClass("fadeOut");
        document.body.style.overflow = "auto";
        document.body.style.userSelect = "auto";
        setTimeout(() => {
            $('.modal').addClass("hidden");
        }, 500)
    }
    $('#modal-hidden').click(function() {
        closeModal()
    });

    $(window).click(function(e) {
        if (e.target.id === "modal") {
            closeModal()
        }
    })
</script>
