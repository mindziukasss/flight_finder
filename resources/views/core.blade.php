<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="UTF-8">
    <title></title>
    @include('style')

</head>
<body>

    @include('menu')
    <div class="container">
    @yield('content')

</div>

</body>

@include('scripts')
@yield('scripts')
</html>

