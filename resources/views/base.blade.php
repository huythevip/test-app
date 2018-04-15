<!DOCTYPE html>
<html>
<head>
    @include('partials._header')
</head>
<body>
    @include('partials._nav')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
@include('partials._footer')
@yield('scripts')
</body>
</html>