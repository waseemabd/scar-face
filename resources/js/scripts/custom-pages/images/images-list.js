/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-bs-toggle="tooltip"]',
        container: 'body'
    });

    $('#delete-sub').on('show.bs.modal', function (e) {

        let request_id = $(e.relatedTarget).data('id');

        $('#delete_btn').data('id', request_id);


        console.log(request_id);
    });


    $("#delete_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#delete_btn").data('id');

        $.ajax({
            type: 'Delete',

            url: '/admin/delete-image/' + sub_id,

            data: {

                id: sub_id
            },


            success: function (response) {
                if (response.status === 200) {
                    $('#delete-sub').modal('hide');
                    $('#row-'+sub_id+'').hide();

                    // On load Toast
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Image_Deleted_Successfully'),
                            {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            }
                        );
                    }, 500);

                } else {
                    setTimeout(function () {
                        toastr['error'](
                            Lang.get('js_local.Operation_Failed'),
                            {
                                closeButton: true,
                                tapToDismiss: false,
                                rtl: isRtl
                            }
                        );
                    }, 500);
                }


            },
            error: function (jqXHR) {
                alert(jQuery.parseJSON(jqXHR.responseText).message);

            }
        });
    });

});
