@extends('layouts/contentLayoutMaster')

@section('title', trans('plans/plans.update_plan'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
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
                              action="{{route('admin-update-plan')}}"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="mb-2 ">
                                        <label class="form-label"
                                               for="blog-edit-title">{{trans('plans/plans.title')}}<span
                                                class="text-danger">*</span></label>
                                        <input
                                            type="text"
                                            name="title"
                                            id="blog-edit-title"
                                            class="form-control"
                                            placeholder="{{trans('plans/plans.title_plc')}}"
                                            value="{{$plan ? $plan->title : null}}"
                                            required
                                        />
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('plans/plans.title_plc')}}
                                            .
                                        </div>
                                    </div>

                                </div>


                                <div class="col-12">
                                    <div class="mb-2">
                                        <label
                                            class="form-label">{{trans('plans/plans.desc')}}</label>
                                        <input type="hidden" name="desc" id="desc" required>
                                        <div id="blog-editor-wrapper">
                                            <div id="blog-editor-container">
                                                <div class="editor" style="min-height: 200px">
                                                    {!! $plan ? $plan->desc : ''  !!}

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

    <script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>


@endsection

@section('page-script')

    <script src="{{asset('js/scripts/custom-pages/plans/update-plan.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>



@endsection
