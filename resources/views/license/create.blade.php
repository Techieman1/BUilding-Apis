<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activate eBook</title>
    
    <!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    
    <link href="{{ Module::asset('admin:css/admin.css') }}" rel="stylesheet">
    <link href="{{ Module::asset('user:admin/css/login.css') }}" rel="stylesheet">
    
    
    <script>
    (function () {
        "use strict";
        window.CI = {
            version: '{{ app_version() }}',
            csrfToken: '{{ csrf_token() }}',
            baseUrl: '{{ url('/') }}',
            langs: {},
            data: {},
        };
        
    })();
    </script>
</head>
<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login">
            @include('admin::include.notification')
            <h3 class="text-center">Activation</h3>
            <p class="text-center">Enter your purchase code to activate eBook</p>
            <form method="POST" action="{{ route('license.store') }}">
            {{ csrf_field() }}
                <div class="form-group {{ $errors->has('purchase_code') ? 'has-error': '' }}">
                    <div class="input-icon">
                        <input type="text" name="purchase_code" class="form-control" placeholder="Purchase Code" autofocus>
                        <span class="input-icon-addon">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                    </div>
                    {!! $errors->first('purchase_code', '<span class="help-block error">:message</span>') !!}
                </div>
                
                <div class="row form-action">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary col-md-12 fw-bold" data-loading>Activate</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script src="{{ Module::asset('admin:js/admin.js') }}"></script>
    

    <script>
        $(document).on('click', '[data-loading]', function (e) {
            var button = $(e.currentTarget);

            if (button.is('i')) {
                button = button.parent();
            }

            if (button.hasClass('disabled')) {
                return e.preventDefault();
            }

            button.data('loading-text', button.html())
                .addClass('btn-loading')
                .button('loading');
        });
    </script>
</body>
</html>
