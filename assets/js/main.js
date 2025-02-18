jQuery(document).ready(function ($) {
    // Initially open the first item
    $('.custom-accordion .accordion-header').first().next('.accordion-content').slideDown();
    $('.custom-accordion .accordion-header').first().find('.accordion-icon').text('-');

    // Accordion click behavior
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

