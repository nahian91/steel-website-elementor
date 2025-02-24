(function ($) {
    function initFAQ() {
        // FAQ toggle functionality
        $('.faq-question').click(function () {
            var $faqItem = $(this).closest('.faq-item');
            var $faqAnswer = $faqItem.find('.faq-answer');
            var $icon = $(this).find('.faq-icon');

            // Close all other FAQs
            $('.faq-answer').not($faqAnswer).slideUp();
            $('.faq-icon').not($icon).removeClass('fa-minus').addClass('fa-plus');

            // Toggle current FAQ
            if ($faqAnswer.is(':visible')) {
                $faqAnswer.slideUp();
                $icon.removeClass('fa-minus').addClass('fa-plus');
            } else {
                $faqAnswer.slideDown();
                $icon.removeClass('fa-plus').addClass('fa-minus');
            }
        });
    }

    // Run on document ready
    $(document).ready(function () {
        initFAQ(); // Initialize FAQ toggles when the document is ready
    });

    // Run when Elementor updates preview
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction("frontend/element_ready/faqs.default", initFAQ);
        elementorFrontend.hooks.addAction("frontend/element_ready/global", initFAQ);
    });
})(jQuery);
