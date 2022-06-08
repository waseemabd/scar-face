@extends('layouts/contentLayoutMaster')

@section('title', trans('features/features.add_new_feature'))

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
                              action="{{route('admin-update-feature', $feature->id)}}"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="blog-edit-title">{{trans('features/features.title')}}<span
                                                class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="title"
                                            id="blog-edit-title"
                                            class="form-control"
                                            placeholder="{{trans('features/features.title_plc')}}"
                                           value="{{$feature->title}}"
                                            required
                                        />
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('features/features.title_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>


                                <div class="col-12">
                                    <div class="mb-2">
                                        <label
                                            class="form-label">{{trans('features/features.desc')}}</label>
                                        <input type="hidden" name="desc" id="desc" required>
                                        <div id="blog-editor-wrapper">
                                            <div id="blog-editor-container">
                                                <div class="editor" style="min-height: 200px">
                                                    {!! $feature->desc !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">{{trans('features/features.image')}} <span
                                                class="text-danger">*</span></h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <img
                                                src="{{URL::asset($feature->image)}}"
                                                id="blog-feature-image"
                                                class="rounded me-2 mb-1 mb-md-0"
                                                width="170"
                                                height="110"
                                                alt="{{trans('features/features.image')}}"
                                            />
                                            <div class="featured-info">
                                                <small class="text-muted">{{trans('features/features.image_res')}}</small>
                                                <p class="my-50">
                                                    {{--                                                    <a href="#" id="blog-image-text"></a>--}}
                                                </p>
                                                <div class="d-inline-block">
                                                    <input class="form-control" name="image" type="file"
                                                           id="blogCustomFile" accept="image/*"
                                                           value="{{$feature->image ? $feature->image : ''}}"
                                                        {{$feature->image ? '': 'required'}}
                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('features/features.plc_upload_image')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1">{{trans('general.Edit')}}</button>
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

    <script src="{{asset('js/scripts/custom-pages/features/add-feature.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>
    {{--    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>--}}


@endsection
