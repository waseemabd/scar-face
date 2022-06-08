@extends('layouts/contentLayoutMaster')

@section('title', trans('partners/partners.partners_list'))

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
    <!-- partners list start -->
    <section class="app-user-list">

        <!-- list section start -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="user-list-table table">
                    <thead class="table-light">
                    <tr>
                        <th></th>
                        <th>{{trans('partners/partners.name')}}</th>
                        <th>{{trans('partners/partners.link')}}</th>
                        <th>{{trans('partners/partners.Actions')}}</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <!-- Shown Event -->
            <div class="shown-event-ex">
                <div
                    class="modal fade text-start"
                    id="delete-sub"
                    tabindex="-1"
                    aria-labelledby="myModalLabel22"
                    aria-hidden="true"
                >
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title" id="myModalLabel22">{{trans('general.Delete')}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <meta name="csrf-token" content="{{ csrf_token() }}">

                                {{--                        <span class="la la-exclamation-circle fs-60 text-warning"></span>--}}
                                <h4 class="modal-title fs-19 font-weight-semi-bold pt-2 pb-1"
                                    id="itemDeleteModalTitle">{{trans('general.delete_warning')}}</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">{{trans('general.Cancel')}}</button>
                                <button type="button" class="btn btn-danger" id="delete_btn"
                                        data-bs-dismiss="modal">{{trans('general.Delete')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shown Event End -->


        </div>
        <!-- list section end -->
    </section>
    <!-- partners list ends -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/custom-pages/partners/partners-list.js') }}"></script>

@endsection
