(function ($) {
    function initFAQ() {
        $('.faq-question').off('click').on('click', function () {
            var answer = $(this).next('.faq-answer');
            var icon = $(this).find('.faq-icon');

            $('.faq-answer').not(answer).slideUp();
            $('.faq-icon').not(icon).removeClass('fa-minus').addClass('fa-plus').css('transform', 'rotate(0deg)');

            answer.slideToggle();
            if (icon.hasClass('fa-plus')) {
                icon.removeClass('fa-plus').addClass('fa-minus').css('transform', 'rotate(180deg)');
            } else {
                icon.removeClass('fa-minus').addClass('fa-plus').css('transform', 'rotate(0deg)');
            }
        });
    }

    function initOwlCarousel() {
        $(".almashaan-owl-carousel").each(function () {
            var $carousel = $(this);
            if (!$carousel.hasClass("owl-loaded")) {
                $carousel.owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    autoplayHoverPause: true,
                    items: 1,
                    margin: 20,
                    nav: true,
                    dots: true,
                    navText: ["<span class='owl-prev'>‹</span>", "<span class='owl-next'>›</span>"],
                });
            }
        });
    }

    // Run on document ready
    $(document).ready(function () {
        initFAQ();
        initOwlCarousel();
    });

    // Run when Elementor updates preview
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/faqs.default", function () {
            initFAQ();
        });

        elementorFrontend.hooks.addAction("frontend/element_ready/almashaan-carousel.default", function () {
            initOwlCarousel();
        });

        // Run again when widgets are added inside the editor
        elementorFrontend.hooks.addAction("frontend/element_ready/global", function () {
            initFAQ();
            initOwlCarousel();
        });
    });
})(jQuery);
