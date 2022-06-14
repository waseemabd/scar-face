@extends('layouts/contentLayoutMaster')

@section('title', trans('currencies/currencies.update_currency'))

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">--}}
    {{--    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">--}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')
    <!-- Horizontal Wizard -->
    <section class="horizontal-wizard">
        <div class="bs-stepper horizontal-wizard-example">
            <div class="bs-stepper-header" role="tablist">
                <div class="step" data-target="#account-details" role="tab" id="account-details-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">1</span>
                        <span class="bs-stepper-label">
            <span class="bs-stepper-title">{{trans('currencies/currencies.basic_info')}}</span>
            <span class="bs-stepper-subtitle">{{trans('currencies/currencies.setup').trans('currencies/currencies.basic_info')}}</span>
          </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#personal-info" role="tab" id="personal-info-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">2</span>
                        <span class="bs-stepper-label">
            <span class="bs-stepper-title">{{trans('currencies/currencies.stage_1')}}</span>
            <span class="bs-stepper-subtitle">{{trans('currencies/currencies.setup').trans('currencies/currencies.stage_1')}}</span>
          </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#address-step" role="tab" id="address-step-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">3</span>
                        <span class="bs-stepper-label">
            <span class="bs-stepper-title">{{trans('currencies/currencies.stage_2')}}</span>
            <span class="bs-stepper-subtitle">{{trans('currencies/currencies.setup').trans('currencies/currencies.stage_2')}}</span>
          </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#social-links" role="tab" id="social-links-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">4</span>
                        <span class="bs-stepper-label">
            <span class="bs-stepper-title">{{trans('currencies/currencies.stage_3')}}</span>
            <span class="bs-stepper-subtitle">{{trans('currencies/currencies.setup').trans('currencies/currencies.stage_3')}}</span>
          </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">{{trans('currencies/currencies.basic_info')}}</h5>
{{--                        <small class="text-muted">Enter Your Account Details.</small>--}}
                    </div>
                    <form id="stage_0_form">
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
                                        value="{{$stage_0 ? $stage_0->name : null}}"
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
                                            value="{{$stage_0 ? $stage_0->price: null}}"
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
                        </div>

                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-prev" disabled>
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Previous')}}</span>
                        </button>
                        <button class="btn btn-primary btn-next" id="stage_0_btn">
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Next')}}</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>
                    </div>
                </div>
                <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">{{trans('currencies/currencies.stage_1')}}</h5>
{{--                        <small>Enter Your Personal Info.</small>--}}
                    </div>
                    <form id="stage_1_form">

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2 ">
                                    <label class="form-label"
                                           for="blog-edit-title">{{trans('currencies/currencies.link')}}<span
                                            class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="link_stage_1"
                                        id="blog-edit-title"
                                        class="form-control"
                                        placeholder="www.example.com"
                                        value="{{$stage_1 ? $stage_1->link : null}}"

                                    />
                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                    <div
                                        class="invalid-feedback">{{trans('general.Pls'). trans('currencies/currencies.link_plc')}}
                                        .
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label
                                        class="form-label">{{trans('currencies/currencies.desc')}}</label>
                                    <input type="hidden" name="desc_stage_1" id="desc_stage_1" required>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container-stage-1">
                                            <div class="editor-stage-1" style="min-height: 200px">
                                                {!! $stage_1 ? $stage_1->desc : ''  !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">{{trans('currencies/currencies.image')}} <span
                                            class="text-danger">*</span></h4>
                                    <div class="d-flex flex-column flex-md-row">
                                        <img
                                            src="{{URL::asset($stage_1->image)}}"
                                            id="blog-feature-image-stage-1"
                                            class="rounded me-2 mb-1 mb-md-0"
                                            width="170"
                                            height="110"
                                            alt="{{trans('currencies/currencies.image')}}"
                                        />
                                        <div class="featured-info">
                                            <small class="text-muted">{{trans('currencies/currencies.image_res')}}</small>
                                            <p class="my-50">
                                                {{--                                                    <a href="#" id="blog-image-text"></a>--}}
                                            </p>
                                            <div class="d-inline-block">
                                                <input class="form-control" name="image_stage_1" type="file"
                                                       id="blogCustomFileStage1" accept="image/*"
                                                       value="{{$stage_1->image ? $stage_1->image : ''}}"
                                                    {{$stage_1->image ? '': 'required'}}
                                                />
                                                <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                <div
                                                    class="invalid-feedback">{{trans('currencies/currencies.plc_upload_image')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Previous')}}</span>
                        </button>
                        <button class="btn btn-primary btn-next" id="stage_1_btn">
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Next')}}</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>
                    </div>
                </div>
                <div id="address-step" class="content" role="tabpanel" aria-labelledby="address-step-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">{{trans('currencies/currencies.stage_2')}}</h5>
{{--                        <small>Enter Your Address.</small>--}}
                    </div>
                    <form id="stage_2_form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2 ">
                                    <label class="form-label"
                                           for="blog-edit-title">{{trans('currencies/currencies.link')}}<span
                                            class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="link_stage_2"
                                        id="blog-edit-title"
                                        class="form-control"
                                        placeholder="www.example.com"
                                        value="{{$stage_2 ? $stage_2->link : null}}"

                                    />
                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                    <div
                                        class="invalid-feedback">{{trans('general.Pls'). trans('currencies/currencies.link_plc')}}
                                        .
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label
                                        class="form-label">{{trans('currencies/currencies.desc')}}</label>
                                    <input type="hidden" name="desc_stage_2" id="desc_stage_2" required>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container-stage-2">
                                            <div class="editor-stage-2" style="min-height: 200px">
                                                {!! $stage_2 ? $stage_2->desc : ''  !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">{{trans('currencies/currencies.image')}} <span
                                            class="text-danger">*</span></h4>
                                    <div class="d-flex flex-column flex-md-row">
                                        <img
                                            src="{{URL::asset($stage_2->image)}}"
                                            id="blog-feature-image-stage-2"
                                            class="rounded me-2 mb-1 mb-md-0"
                                            width="170"
                                            height="110"
                                            alt="{{trans('currencies/currencies.image')}}"
                                        />
                                        <div class="featured-info">
                                            <small class="text-muted">{{trans('currencies/currencies.image_res')}}</small>
                                            <p class="my-50">
                                                {{--                                                    <a href="#" id="blog-image-text"></a>--}}
                                            </p>
                                            <div class="d-inline-block">
                                                <input class="form-control" name="image_stage_2" type="file"
                                                       id="blogCustomFileStage2" accept="image/*"
                                                       value="{{$stage_2->image ? $stage_2->image : ''}}"
                                                    {{$stage_2->image ? '': 'required'}}
                                                />
                                                <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                <div
                                                    class="invalid-feedback">{{trans('currencies/currencies.plc_upload_image')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Previous')}}</span>
                        </button>
                        <button class="btn btn-primary btn-next" id="stage_2_btn">
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Next')}}</span>
                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                        </button>
                    </div>
                </div>
                <div id="social-links" class="content" role="tabpanel" aria-labelledby="social-links-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">{{trans('currencies/currencies.stage_3')}}</h5>
{{--                        <small>Enter Your Social Links.</small>--}}
                    </div>
                    <form method="POST" class="mt-2 needs-validation" id="stage_3_form"
                          action="{{route('admin-update-currency-stage3')}}"
                          novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2 ">
                                    <label class="form-label"
                                           for="blog-edit-title">{{trans('currencies/currencies.link')}}<span
                                            class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="link_stage_3"
                                        id="blog-edit-title"
                                        class="form-control"
                                        placeholder="www.example.com"
                                        value="{{$stage_3 ? $stage_3->link : null}}"

                                    />
                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                    <div
                                        class="invalid-feedback">{{trans('general.Pls'). trans('currencies/currencies.link_plc')}}
                                        .
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label
                                        class="form-label">{{trans('currencies/currencies.desc')}}</label>
                                    <input type="hidden" name="desc_stage_3" id="desc_stage_3" required>
                                    <div id="blog-editor-wrapper">
                                        <div id="blog-editor-container-stage-3">
                                            <div class="editor-stage-3" style="min-height: 200px">
                                                {!! $stage_3 ? $stage_3->desc : ''  !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="border rounded p-2">
                                    <h4 class="mb-1">{{trans('currencies/currencies.image')}} <span
                                            class="text-danger">*</span></h4>
                                    <div class="d-flex flex-column flex-md-row">
                                        <img
                                            src="{{URL::asset($stage_3->image)}}"
                                            id="blog-feature-image-stage-3"
                                            class="rounded me-2 mb-1 mb-md-0"
                                            width="170"
                                            height="110"
                                            alt="{{trans('currencies/currencies.image')}}"
                                        />
                                        <div class="featured-info">
                                            <small class="text-muted">{{trans('currencies/currencies.image_res')}}</small>
                                            <p class="my-50">
                                                {{--                                                    <a href="#" id="blog-image-text"></a>--}}
                                            </p>
                                            <div class="d-inline-block">
                                                <input class="form-control" name="image_stage_3" type="file"
                                                       id="blogCustomFileStage3" accept="image/*"
                                                       value="{{$stage_3->image ? $stage_3->image : ''}}"
                                                    {{$stage_3->image ? '': 'required'}}
                                                />
                                                <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                <div
                                                    class="invalid-feedback">{{trans('currencies/currencies.plc_upload_image')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">{{trans('currencies/currencies.Previous')}}</span>
                        </button>
                        <button class="btn btn-success btn-submit">{{trans('currencies/currencies.Next')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Horizontal Wizard -->


@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
    <script src="{{asset('js/scripts/custom-pages/currencies/update-currency.js')}}"></script>

@endsection
