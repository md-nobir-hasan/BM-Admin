@php
    $site_info = App\Models\CompanyInfo::first();
    $site_contact_info = App\Models\CompanyContact::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title', $site_info->title) </title>

    <!-- Favicon-->
    <link rel="icon" href="{{ asset($site_info->logo) }}" type="image/png">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
    @stack('third_party_stylesheets')
    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        @include('backend.partial.nav')
        <!-- Left side column. contains the logo and sidebar -->
        @include('backend.partial.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper  py-md-5 px-md-5">
            @include('backend.partial.flush-message')
            @yield('content')
        </div>

        <!-- Main Footer -->
        @include('backend.partial.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{asset('assets/backend/js/app.balde.js')}}"></script> --}}

    {{-- Custom js global js --}}
    <script>

        function ajax(p, fallFunc) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ajax insert
            if (p.action == 'store') {
                var url = "{{ route('ajax.singlestore') }}";
            }
            // ajax index
            if (p.action == 'index') {
                var url = "{{ route('ajax.index') }}";
            }
            // ajax edit
            if (p.action == 'edit') {
                var url = "{{ route('ajax.edit') }}";
            }
            // ajax delete
            if (p.action == 'delete') {
                var url = "{{ route('ajax.delete') }}";
            }

            var data_object = {
                'data_obj': p.data_obj
            };
            if (p.model) {
                data_object.model = p.model;
            }
            if (p.with_arr) {
                data_object.with_arr = p.with_arr;
            }
            if (p.condition) {
                data_object.condition = p.condition;
            }
            $.ajax({
                url: url,
                type: 'post',
                async: false,
                data: data_object,
                success: function(response) {
                    fallFunc(response);
                }
            });
        }

        function remove(This, model) {
            let id = $(This).find('input').val();
            console.log(id);
            if (id) {
                ajax({
                    'action': 'delete',
                    'data_obj': {
                        'id': id
                    },
                    'model': model,
                }, function(res) {
                    if (res) {
                        $(This).parent().remove();
                    } else {
                        console.log('Something error from this delete method');
                    }
                })
            }
        }

        // ============================================ End ========================
    </script>
    <script>    
        function copyToClipboard(text) {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(function() {
                    alert('Link copied to clipboard!');
                }, function() {
                    alert('Failed to copy link.');
                });
            } else {
                // Fallback for older browsers
                var tempInput = document.createElement('input');
                tempInput.value = text;
                document.body.appendChild(tempInput);
                tempInput.select();
                try {
                    document.execCommand('copy');
                    alert('Link copied to clipboard!');
                } catch (err) {
                    alert('Failed to copy link.');
                }
                document.body.removeChild(tempInput);
            }
        }
        </script>
    @stack('third_party_scripts')

    @stack('page_scripts')
</body>

</html>
