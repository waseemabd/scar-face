@extends('layouts/contentLayoutMaster')

@section('title', trans('settings/settings.Settings'))

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

@endsection
@section('page-style')
    <!-- Page css files -->

    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <!-- account setting page -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column nav-left">


                    <!-- information -->
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="social"
                            data-bs-toggle="pill"
                            href="#social_div"
                            aria-expanded="false"
                        >
                            <i data-feather="info" class="font-medium-3 me-1"></i>
                            <span class="fw-bold">{{trans('settings/settings.Social')}}</span>
                        </a>
                    </li>

                    <!-- term and conditions -->
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="paper"
                            data-bs-toggle="pill"
                            href="#paper_div"
                            aria-expanded="false"
                        >
                            <i data-feather="lock" class="font-medium-3 me-1"></i>
                            <span class="fw-bold">{{trans('settings/settings.paper')}}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="contacts"
                            data-bs-toggle="pill"
                            href="#contacts_div"
                            aria-expanded="false"
                        >
                            <i data-feather="phone" class="font-medium-3 me-1"></i>
                            <span class="fw-bold">{{trans('settings/settings.contacts')}}</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!--/ left menu section -->

            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">


                            <!-- social -->
                            <div
                                class="tab-pane active"
                                id="social_div"
                                role="tabpanel"
                                aria-labelledby="social_div"
                                aria-expanded="false"
                            >
                                <!-- form -->
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i data-feather="link" class="font-medium-3"></i>
                                        <h4 class="mb-0 ms-75">{{trans('settings/settings.Social')}}</h4>
                                    </div>
                                </div>
                                <!-- form -->
                                <form id="about_form" class="validate-form" action="{{route('settings-update-social')}}"
                                      method="POST">
                                    @csrf
                                    <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-2 ">
                                                    <label class="form-label"
                                                           for="blog-edit-title">{{trans('settings/settings.whats_phone')}}
                                                        <span class="text-danger">{{trans('settings/settings.whats_phone_note')}}</span>
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="whats_phone"
                                                        id="blog-edit-title"
                                                        class="form-control"
                                                        placeholder="96658424411"
                                                        value="{{$social['whats_phone']}}"
                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('general.Pls'). trans('settings/settings.whats_phone_plc')}}
                                                        .
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-2 ">
                                                    <label class="form-label"
                                                           for="blog-edit-title">{{trans('settings/settings.facebook')}}</label>
                                                    <input
                                                        type="text"
                                                        name="facebook"
                                                        id="blog-edit-title"
                                                        class="form-control"
                                                        placeholder="https://www.facebook.com"
                                                        value="{{$social['facebook']}}"

                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('general.Pls'). trans('settings/settings.facebook_plc')}}
                                                        .
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-2 ">
                                                    <label class="form-label"
                                                           for="blog-edit-title">{{trans('settings/settings.twitter')}}</label>
                                                    <input
                                                        type="text"
                                                        name="twitter"
                                                        id="blog-edit-title"
                                                        class="form-control"
                                                        placeholder="https://www.twitter.com"
                                                        value="{{$social['twitter']}}"

                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('general.Pls'). trans('settings/settings.twitter_plc')}}
                                                        .
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-2 ">
                                                    <label class="form-label"
                                                           for="blog-edit-title">{{trans('settings/settings.telegram')}}</label>
                                                    <input
                                                        type="text"
                                                        name="telegram"
                                                        id="blog-edit-title"
                                                        class="form-control"
                                                        placeholder="https://telegram.me/name"
                                                        value="{{$social['telegram']}}"

                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('general.Pls'). trans('settings/settings.telegram_plc')}}
                                                        .
                                                    </div>
                                                </div>

                                            </div>

                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-primary mt-1 me-1">{{trans('settings/settings.Save_changes')}}
                                        </button>
                                        <button type="reset"
                                                class="btn btn-outline-secondary mt-1">{{trans('general.Cancel')}}</button>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <!--/ social -->

                            <!-- paper_div -->
                            <div
                                class="tab-pane fade"
                                id="paper_div"
                                role="tabpanel"
                                aria-labelledby="paper_div"
                                aria-expanded="false"
                            >
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i data-feather="link" class="font-medium-3"></i>
                                        <h4 class="mb-0 ms-75">{{trans('settings/settings.paper')}}</h4>
                                    </div>
                                </div>
                                <!-- form -->
                                <form id="terms_client_form" class="validate-form"
                                      action="{{route('settings-update-paper' )}}"
                                      method="POST">
                                    @csrf
                                    <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="mb-2 ">
                                                    <label class="form-label"
                                                           for="blog-edit-title">{{trans('settings/settings.paper_en')}}</label>
                                                    <input
                                                        type="text"
                                                        name="white_paper_en"
                                                        id="blog-edit-title"
                                                        class="form-control"
                                                        placeholder="http://www.drive.google.com"
                                                        value="{{$paper['white_paper_en']}}"

                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('general.Pls'). trans('settings/settings.paper_en_plc')}}
                                                        .
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="mb-2 ">
                                                    <label class="form-label"
                                                           for="blog-edit-title">{{trans('settings/settings.paper_ar')}}</label>
                                                    <input
                                                        type="text"
                                                        name="white_paper_ar"
                                                        id="blog-edit-title"
                                                        class="form-control"
                                                        placeholder="http://www.drive.google.com"
                                                        value="{{$paper['white_paper_ar']}}"

                                                    />
                                                    <div class="valid-feedback">{{trans('general.looks_good')}}</div>
                                                    <div
                                                        class="invalid-feedback">{{trans('general.Pls'). trans('settings/settings.paper_ar')}}
                                                        .
                                                    </div>
                                                </div>

                                            </div>

                                    </div>
                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-primary mt-1 me-1">{{trans('settings/settings.Save_changes')}}
                                        </button>
                                        <button type="reset"
                                                class="btn btn-outline-secondary mt-1">{{trans('general.Cancel')}}</button>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <!--/ paper_div -->


                            <!-- contacts -->
                            <div
                                class="tab-pane fade"
                                id="contacts_div"
                                role="tabpanel"
                                aria-labelledby="contacts_div"
                                aria-expanded="false"
                            >

                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-2">
                                        <i data-feather="link" class="font-medium-3"></i>
                                        <h4 class="mb-0 ms-75">{{trans('settings/settings.contacts')}}</h4>
                                    </div>
                                </div>
                                <!-- form -->
                                <form id="contacts_form" class="validate-form invoice-repeater"
                                      action="{{route('settings-update-contacts' )}}"
                                      method="POST">
                                    @csrf
                                    <div class="col-12 ">
                                        <div class="mb-2">
                                            <label
                                                class="form-label">{{trans('settings/settings.email')}}</label>
                                            <input
                                                type="email"
                                                name="email"
                                                id="email"
                                                class="form-control"
                                                placeholder="email@example.com"
                                                value="{{$contacts['email']}}"
                                            />
                                        </div>



                                    </div>

                                    <div data-repeater-list="phones">
                                        @foreach($contact_phones as $contact)
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label"
                                                                   for="itemname">{{trans('settings/settings.phone')}}</label>
                                                            <input
                                                                type="text"
                                                                name="phone"
                                                                class="form-control"
                                                                id="itemname"
                                                                aria-describedby="itemname"
                                                                placeholder="{{trans('settings/settings.phone_plc')}}"
                                                                value="{{$contact}}"
                                                            />
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2 col-12 mb-50">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>{{trans('settings/settings.delete')}}</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                        @endforeach
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                               for="itemname">{{trans('settings/settings.phone')}}</label>
                                                        <input
                                                            type="text"
                                                            name="phone"
                                                            class="form-control"
                                                            id="itemname"
                                                            aria-describedby="itemname"
                                                            placeholder="{{trans('settings/settings.phone_plc')}}"

                                                        />
                                                    </div>
                                                </div>


                                                <div class="col-md-2 col-12 mb-50">
                                                    <div class="mb-1">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                                data-repeater-delete type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>{{trans('settings/settings.delete')}}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                <i data-feather="plus" class="me-25"></i>
                                                <span>{{trans('settings/settings.add_new')}}</span>
                                            </button>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit"
                                                class="btn btn-primary mt-1 me-1">{{trans('settings/settings.Save_changes')}}
                                        </button>
                                    </div>
                                </form>                                <!--/ form -->
                            </div>
                            <!--/ contacts -->



                        </div>
                    </div>
                </div>
            </div>
            <!--/ right content section -->
        </div>
    </section>
    <!-- / account setting page -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
{{--    <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>--}}


@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{asset('js/scripts/custom-pages/settings/settings.js')}}"></script>


@endsection
