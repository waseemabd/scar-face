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

    var dtUserTable = $('.user-list-table'),
        newUserSidebar = $('.new-user-modal'),
        newUserForm = $('.add-new-user'),
        statusObj = {
            0: {title: 'pending', class: 'badge-light-secondary'},
            1: {title: 'done', class: 'badge-light-success'}
        };


    var assetPath = '../../../app-assets/',
        userView = 'app-user-view.html',
        userEdit = 'app-user-edit.html';
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
        userView = assetPath + 'app/user/view';
        userEdit = assetPath + 'app/user/edit';
    }

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            ajax: {
                url: '/admin/allPartners', // JSON file to add data
                dataSrc: 'content'
            },
            columns: [
                // columns according to JSON
                {data: 'responsive'},
                {data: 'name'},
                {data: 'link'},
                {data: ''}
            ],
            columnDefs: [
                {
                    // For Responsive
                    className: 'control',
                    orderable: false,
                    responsivePriority: 2,
                    targets: 0
                },
                {
                    // User full name and username
                    targets: 1,
                    responsivePriority: 4,
                    render: function (data, type, full, meta) {
                        var $name = full['name'], $image = full['logo'];

                        if ($image) {
                            // For Avatar image
                            var $output =
                                '<img src="' + assetPath + $image.substring(1) + '" alt="Avatar" height="32" width="32">';
                        } else {
                            // For Avatar badge
                            var stateNum = Math.floor(Math.random() * 6) + 1;
                            var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                            var $state = states[stateNum],
                                $name = full['name'],
                                $initials = $name.match(/\b\w/g) || [];
                            $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                            $output = '<span class="avatar-content">' + $initials + '</span>';
                        }
                        var colorClass = $image === '' ? ' bg-light-' + $state + ' ' : '';
                        // Creates full output for row
                        var $row_output =
                            '<div class="d-flex justify-content-left align-items-center">' +
                            '<div class="avatar-wrapper">' +
                            '<div class="avatar ' +
                            colorClass +
                            ' me-1">' +
                            $output +
                            '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            $name +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    // $reason
                    targets: 2,
                    render: function (data, type, full, meta) {
                        var $link = full['link'];

                        var $out = '';

                        $out = '<a href="'+$link+'" target="_blank">' +
                            $link +
                            '</a>'

                        return $out;
                    }

                },

                {
                    // Actions
                    targets: -1,
                    title: Lang.get('js_local.Actions'),
                    orderable: false,
                    render: function (data, type, full, meta) {

                        var out = '';

                        out = '<div class="btn-group">' +
                            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({class: 'font-small-4'}) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-end">' +
                            '<a   class="dropdown-item" href="/admin/edit-partner/' +
                            full['id']
                            + '">' +
                            feather.icons['edit'].toSvg({class: 'font-small-4 me-50'}) +
                            '' + Lang.get('js_local.Edit') +
                            '</a>' +
                            '<a href="javascript:;" class="dropdown-item delete-record"  data-bs-toggle="modal" ' +
                            'data-bs-target="#delete-sub" data-action="delete" data-id="' +
                            full['id']
                            + '">' +
                            feather.icons['trash-2'].toSvg({class: 'font-small-4 me-50'}) +
                            '' + Lang.get('js_local.Delete') +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        ;


                        return (out);
                    }
                }


            ],
            order: [[2, 'desc']],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-sm-12 col-md-4 col-lg-6" l>' +
                '<"col-sm-12 col-md-8 col-lg-6 ps-xl-75 ps-0"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end align-items-center flex-sm-nowrap flex-wrap me-1"<"me-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Search',
                searchPlaceholder: 'Search..'
            },
            // Buttons with Dropdown
            buttons: [
                // {
                //     // text: 'Add Section',
                //     // className: 'add-new btn btn-primary mt-50',
                //     // attr: {
                //     //     'data-bs-toggle': 'modal',
                //     //     'data-bs-target': '#modals-slide-in'
                //     // },
                //     // init: function (api, node, config) {
                //     //     $(node).removeClass('btn-secondary');
                //     // }
                // }
            ],
            // For responsive popup
            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function (row) {
            //                 var data = row.data();
            //                 return 'تفاصيل ';
            //             }
            //         }),
            //         type: 'column',
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            //             tableClass: 'table',
            //             columnDefs: [
            //                 {
            //                     targets: 2,
            //                     visible: false
            //                 },
            //                 {
            //                     targets: 3,
            //                     visible: false
            //                 }
            //             ]
            //         })
            //     }
            // },

        });
    }

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


    });


    $("#delete_btn").on('click', function (e) {

        e.preventDefault();

        let sub_id = $("#delete_btn").data('id');

        $.ajax({
            type: 'Delete',

            url: '/admin/delete-partner/' + sub_id,

            data: {

                id: sub_id
            },


            success: function (response) {
                if (response.status === 200) {
                    $('#delete-sub').modal('hide');
                    dtUserTable.DataTable().ajax.reload();

                    // On load Toast
                    setTimeout(function () {
                        toastr['success'](
                            Lang.get('js_local.Partner_Deleted_Successfully'),
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
