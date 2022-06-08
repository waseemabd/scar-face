(function (window, document, $) {
    'use strict';


    $('.invoice-repeater, .repeater-default').repeater({
        show: function () {
            $(this).slideDown();
            // Feather Icons
            if (feather) {
                feather.replace({width: 14, height: 14});
            }
        },
        hide: function (deleteElement) {
            if (confirm(
                Lang.get('js_local.delete_warning')
            )) {
                $(this).slideUp(deleteElement);
            }
        }
    });


})(window, document, jQuery);
