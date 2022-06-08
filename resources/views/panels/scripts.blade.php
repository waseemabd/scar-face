<script src="{{ URL::asset('messages.js') }}"></script>

<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>

<script>
    var isRtl = $('html').attr('data-textdirection') === 'rtl';


    @if(Session::has('message'))
    setTimeout(function () {
        toastr['success'](
            '{{ session('message') }}',
            {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            }
        );
    }, 500);

    @endif
    @if(Session::has('error'))
    setTimeout(function () {
        toastr['error'](
            '{{ session('error') }}',
            {
                closeButton: true,
                tapToDismiss: false,
                rtl: isRtl
            }
        );
    }, 500);
    @endif


</script>

<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
