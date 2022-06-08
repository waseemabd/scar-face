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


    // Snow Editor

    var Font = Quill.import('formats/font');
    Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
    Quill.register(Font, true);
    //
    var editor_stage_1 = '#blog-editor-container-stage-1 .editor-stage-1';

    var blogEditorStage1 = new Quill(editor_stage_1, {
        bounds: editor_stage_1,
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

    var editor_stage_2 = '#blog-editor-container-stage-2 .editor-stage-2';

    var blogEditorStage2 = new Quill(editor_stage_2, {
        bounds: editor_stage_2,
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


    var editor_stage_3 = '#blog-editor-container-stage-3 .editor-stage-3';

    var blogEditorStage3 = new Quill(editor_stage_3, {
        bounds: editor_stage_3,
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
        $('#desc_stage_1').val(blogEditorStage1.container.firstChild.innerHTML);
        $('#desc_stage_2').val(blogEditorStage2.container.firstChild.innerHTML);
        $('#desc_stage_3').val(blogEditorStage3.container.firstChild.innerHTML);
    });


    var blogFeatureImageStage1 = $('#blog-feature-image-stage-1');
    var blogImageInputStage1 = $('#blogCustomFileStage1');


    // Change stage 1 image
    if (blogImageInputStage1.length) {
        $(blogImageInputStage1).on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (blogFeatureImageStage1.length) {
                    blogFeatureImageStage1.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
            // blogImageText.innerHTML = blogImageInput.val();
        });
    }


    var blogFeatureImageStage2 = $('#blog-feature-image-stage-2');
    var blogImageInputStage2 = $('#blogCustomFileStage2');


    // Change stage 2 image
    if (blogImageInputStage2.length) {
        $(blogImageInputStage2).on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (blogFeatureImageStage2.length) {
                    blogFeatureImageStage2.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
            // blogImageText.innerHTML = blogImageInput.val();
        });
    }

    var blogFeatureImageStage3 = $('#blog-feature-image-stage-3');
    var blogImageInputStage3 = $('#blogCustomFileStage3');


    // Change stage 3 image
    if (blogImageInputStage3.length) {
        $(blogImageInputStage3).on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (blogFeatureImageStage3.length) {
                    blogFeatureImageStage3.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
            // blogImageText.innerHTML = blogImageInput.val();
        });
    }


})(window, document, jQuery);


