(function ($) {
    function initFAQ() {
        // Using event delegation for dynamically added FAQ questions
        $(document).on('click', '.faq-question', function () {
            var answer = $(this).next('.faq-answer');
            var icon = $(this).find('.faq-icon');

            // Close all answers except the one clicked
            $('.faq-answer').not(answer).slideUp();
            $('.faq-icon').not(icon).removeClass('fa-minus').addClass('fa-plus').css('transform', 'rotate(0deg)');

            // Toggle the clicked answer
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

    function initGalleryFilter() {
        if ($('#gallery').length) {
            // Initialize MixItUp for gallery filtering
            $('#gallery').mixItUp({
                selectors: {
                    target: '.gallery-item',
                    filter: '.filter'  
                },
                load: {
                    filter: '.print, .strategy, .logo, .web' // Show all on load
                }     
            });

            // Custom button filter functionality (to be used with MixItUp)
            $('.filter-btn').click(function() {
                var filterValue = $(this).attr('data-filter');
                if (filterValue === 'all') {
                    $('#gallery').mixItUp('filter', 'all');  // Use MixItUp filter for 'all'
                } else {
                    $('#gallery').mixItUp('filter', filterValue);  // Use MixItUp filter for selected category
                }
            });
        }
    }

    // Run on document ready
    $(document).ready(function () {
        initFAQ();
        initOwlCarousel();
        initGalleryFilter();
    });

    // Run when Elementor updates preview
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/faqs.default", function () {
            initFAQ();
        });

        elementorFrontend.hooks.addAction("frontend/element_ready/almashaan-carousel.default", function () {
            initOwlCarousel();
        });

        elementorFrontend.hooks.addAction("frontend/element_ready/gallery-widget.default", function () {
            initGalleryFilter();
        });

        // Run again when widgets are added inside the editor
        elementorFrontend.hooks.addAction("frontend/element_ready/global", function () {
            initFAQ();
            initOwlCarousel();
            initGalleryFilter();
        });
    });
})(jQuery);
