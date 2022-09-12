<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="{{ $setting->m_keyword ?? null}}">
    <meta name="description" content="{{ $setting->m_description ?? null }}">
    @yield('social-share')
    <title>{{ $setting->title ?? null}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('style')
</head>
<body class="bg-gray-100">
    <div class="container">
        @include('front.layouts.navigation')
        <main class="">
            @yield('content')
        </main>
        <div class="footer">
            @include('front.layouts.footer')
        </div>
    </div>
    <script src="https://kit.fontawesome.com/3379ab9efd.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    @stack('script')
{{--    <script>--}}
{{--        let flashMessages = @json(session('flash_notification', []));--}}
{{--        console.log(flashMessages);--}}
{{--        toastr.options = {--}}
{{--            "closeButton": true,--}}
{{--            "debug": false,--}}
{{--            "positionClass": "toast-top-right",--}}
{{--            "onclick": null,--}}
{{--            "showDuration": "1000",--}}
{{--            "hideDuration": "1000",--}}
{{--            "timeOut": "8000",--}}
{{--            "extendedTimeOut": "1000",--}}
{{--            "showEasing": "swing",--}}
{{--            "hideEasing": "linear",--}}
{{--            "showMethod": "fadeIn",--}}
{{--            "hideMethod": "fadeOut"--}}
{{--        };--}}

{{--        flashMessages.forEach(function (message) {--}}
{{--            if (message.level == 'success') {--}}
{{--                toastr.success(message.message, message.title)--}}
{{--            } else if(message.level == 'error') {--}}
{{--                toastr.error(message.message, message.title)--}}
{{--            } else if(message.level == 'warning') {--}}
{{--                toastr.warning(message.message, message.title)--}}
{{--            } else if(message.level == 'danger') {--}}
{{--                toastr.danger(message.message, message.title)--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
</body>
</html>
