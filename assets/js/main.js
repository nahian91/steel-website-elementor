jQuery(document).ready(function ($) {
    $('.custom-accordion .accordion-header').click(function () {
        var $content = $(this).next('.accordion-content');
        var $icon = $(this).find('.accordion-icon');

        if ($content.is(':visible')) {
            $content.slideUp();
            $icon.text('+');
        } else {
            $('.accordion-content').slideUp();
            $('.accordion-icon').text('+');
            $content.slideDown();
            $icon.text('-');
        }
    });
});
