@extends('layouts/contentLayoutMaster')

@section('title', trans('images/images.images_list'))

@section('content')
    <!-- Examples -->
    <section id="card-demo-example">
        <div class="row match-height">
            @foreach($images as $image)
            <div class="col-md-6 col-lg-4" id="row-{{$image->id}}">
                <div class="card">
                    <img class="card-img-top" src="{{URL::asset($image->image)}}" alt="Card image cap" />
                    <div class="card-body">
                        <h4 class="card-title">{{trans('images/images.'.$image->type)}}</h4>
                        <p class="card-text">
                            {{ $image->title }}
                        </p>
                        <div class="d-flex">
                            <a href="{{route('admin-edit-image', $image->id)}}"
                               class="dropdown-item delete-record card-link" style="color: #7367f0">
                            {{trans('general.Edit')}}
                            </a>
                            <a href="javascript:;" class="dropdown-item delete-record card-link"  data-bs-toggle="modal"
                               data-bs-target="#delete-sub" data-action="delete" style="color: red"
                               data-id="{{$image->id}}" >
                                {{trans('general.Delete')}}
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    <!-- Examples -->

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


@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/custom-pages/images/images-list.js') }}"></script>

@endsection
