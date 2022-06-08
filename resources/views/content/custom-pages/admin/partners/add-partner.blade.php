@extends('layouts/contentLayoutMaster')

@section('title', trans('partners/partners.add_new_partner'))

@section('vendor-style')

@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">



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
                              action="{{route('admin-store-partner')}}"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="blog-edit-title">{{trans('partners/partners.name')}}<span
                                                class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="blog-edit-title"
                                            class="form-control"
                                            placeholder="{{trans('partners/partners.name_plc')}}"
                                            required
                                        />
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('partners/partners.name_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="blog-edit-title">{{trans('partners/partners.link')}}<span
                                                class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="link"
                                            id="blog-edit-title"
                                            class="form-control"
                                            placeholder="http://www.partner.com"
                                            required
                                        />
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('partners/partners.link_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>


                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">{{trans('partners/partners.logo')}} <span
                                                class="text-danger">*</span></h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <img
                                                src=""
                                                id="blog-feature-image"
                                                class="rounded me-2 mb-1 mb-md-0"
                                                width="170"
                                                height="110"
                                                alt="{{trans('partners/partners.logo')}}"
                                            />
                                            <div class="featurerd-info">
                                                <small class="text-muted">{{trans('partners/partners.logo_res')}}</small>
                                                <p class="my-50">
                                                    {{--                                                    <a href="#" id="blog-image-text"></a>--}}
                                                </p>
                                                <div class="d-inline-block">
                                                    <input class="form-control" name="logo" type="file"
                                                           id="blogCustomFile" accept="image/*" required/>
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('partners/partners.plc_upload_logo')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1">{{trans('general.Add')}}</button>
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


@endsection

@section('page-script')

    <script src="{{asset('js/scripts/custom-pages/partners/add-partner.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>


@endsection
