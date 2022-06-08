@extends('layouts/contentLayoutMaster')

@section('title', trans('images/images.add_new_image'))

@section('vendor-style')
    <link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">
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
                              action="{{route('admin-update-image', $image->id)}}"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="type">{{trans('images/images.type')}} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select js-example-basic-multiple select2" id="type"
                                                name="type">
                                            <option></option>
                                            <option value="slider" {{$image->type == 'slider' ? 'selected=true': ''}}>{{trans('images/images.slider')}}</option>

                                        </select>
                                        <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                        <div
                                            class="invalid-feedback">{{trans('general.Pls'). trans('images/images.sel_type_plc')}}
                                            .
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">{{trans('images/images.image')}} <span
                                                class="text-danger">*</span></h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <img
                                                src="{{URL::asset($image->image)}}"
                                                id="blog-feature-image"
                                                class="rounded me-2 mb-1 mb-md-0"
                                                width="170"
                                                height="110"
                                                alt="{{trans('images/images.image')}}"
                                            />
                                            <div class="featured-info">
                                                <small class="text-muted">{{trans('images/images.image_res')}}</small>
                                                <p class="my-50">
                                                    {{--                                                    <a href="#" id="blog-image-text"></a>--}}
                                                </p>
                                                <div class="d-inline-block">
                                                    <input class="form-control" name="image" type="file"
                                                           id="blogCustomFile" accept="image/*"
                                                           value="{{$image->image ? $image->image : ''}}"
                                                        {{$image->image ? '': 'required'}}
                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('images/images.plc_upload_image')}}</div>
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




    <script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>

@endsection

@section('page-script')

    <script src="{{asset('js/scripts/custom-pages/images/add-image.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script>


@endsection
