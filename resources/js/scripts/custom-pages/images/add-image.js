/*=========================================================================================
	File Name: blog-edit.js
	Description: Blog edit field select2 and quill editor JS
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
    'use strict';

    var select = $('.select2');


    // Basic Select2 select
    select.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $this.parent()
        });
    });

    var blogFeatureImage = $('#blog-feature-image');
    var blogImageInput = $('#blogCustomFile');


    // Change featured image
    if (blogImageInput.length) {
        $(blogImageInput).on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (blogFeatureImage.length) {
                    blogFeatureImage.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
            // blogImageText.innerHTML = blogImageInput.val();
        });
    }


})(window, document, jQuery);


