@extends('layouts/contentLayoutMaster')

@section('title', trans('currencies/currencies.update_currency'))

@section('vendor-style')
{{--    <link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">--}}
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">--}}
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
{{--    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">--}}
{{--    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">--}}



@endsection

@section('content')
    <!-- Blog Edit -->
    <div class="blog-edit-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form method="POST" class="mt-2 needs-validation" id="blog_form"
                              action="{{route('admin-update-currency')}}"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="blog-edit-title">{{trans('currencies/currencies.name')}}<span
                                                class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="blog-edit-title"
                                            class="form-control"
                                            placeholder="{{trans('currencies/currencies.name_plc')}}"
                                            value="{{$currency ? $currency->name : null}}"
                                            required
                                        />
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('currencies/currencies.name_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="price">{{trans('currencies/currencies.price')}}<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">$</span>
                                        <input
                                            type="number"
                                            name="price"
                                            id="price"
                                            step="0.00001"
                                            class="form-control"
                                            placeholder="{{trans('currencies/currencies.price_plc')}}"
                                            value="{{$currency ? $currency->price: null}}"
                                            required
                                        />
                                        </div>
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('currencies/currencies.price_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="blog-edit-title">{{trans('currencies/currencies.link')}}<span
                                                class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="link"
                                            id="blog-edit-title"
                                            class="form-control"
                                            placeholder="www.example.com"
                                            value="{{$currency ? $currency->link : null}}"
                                            required
                                        />
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('currencies/currencies.link_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>



                                <div class="col-12">
                                    <div class="mb-2">
                                        <label
                                            class="form-label">{{trans('currencies/currencies.purchase')}}</label>
                                        <input type="hidden" name="desc" id="desc" required>
                                        <div id="blog-editor-wrapper">
                                            <div id="blog-editor-container">
                                                <div class="editor" style="min-height: 200px">
                                                {!! $currency ? $currency->desc : ''  !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1">{{trans('general.save')}}</button>
                                </div>
                            </div>
                        </form>
                        <!--/ Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Blog Edit -->

@endsection

@section('vendor-script')




{{--    <script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>--}}
    <script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>--}}
{{--    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>--}}

@endsection

@section('page-script')

    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
    <script src="{{asset('js/scripts/custom-pages/currencies/update-currency.js')}}"></script>

{{--        <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>--}}


@endsection
