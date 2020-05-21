(function ($) {
    $.fn.genericDropdown = function (options) {
        $(this).on('change', function() {
            $(this).closest('form').netteAjax(event);
        });
    }
})(jQuery);
