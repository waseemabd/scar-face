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

    var editor = '#blog-editor-container .editor';

    // Snow Editor

    var Font = Quill.import('formats/font');
    Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
    Quill.register(Font, true);
    //
    var blogEditor = new Quill(editor, {
        bounds: editor,
        modules: {
            formula: true,
            syntax: true,
            toolbar: [
                [
                    {
                        font: []
                    },
                    {
                        size: []
                    }
                ],
                ['bold', 'italic', 'underline', 'strike'],
                [
                    {
                        color: []
                    },
                    {
                        background: []
                    }
                ],
                [
                    {
                        script: 'super'
                    },
                    {
                        script: 'sub'
                    }
                ],
                [
                    {
                        header: '1'
                    },
                    {
                        header: '2'
                    },
                    'blockquote',
                    'code-block'
                ],
                [
                    {
                        list: 'ordered'
                    },
                    {
                        list: 'bullet'
                    },
                    {
                        indent: '-1'
                    },
                    {
                        indent: '+1'
                    }
                ],
                [
                    'direction',
                    {
                        align: []
                    }
                ],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ]
        },
        theme: 'snow',
        placeholder: 'Enter description...',

    });


    $('#blog_form').on('submit', function () {
        $('#desc').val(blogEditor.container.firstChild.innerHTML);
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


