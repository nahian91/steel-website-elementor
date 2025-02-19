(function ($) {
    $(document).ready(function () {
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

        // Run on page load
        initFAQ();

        // Run when Elementor updates preview
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/faqs.default', function () {
                initFAQ();
            });
        });
    });
})(jQuery);
