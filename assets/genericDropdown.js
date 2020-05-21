(function ($) {
    $.fn.genericDropdown = function (options) {
        return (function() {
            $(el).find('select[name ="genericDropdown"]').change(function (event) {
                $(this).closest('form').netteAjax(event);
            });
        });
    }
})(jQuery);