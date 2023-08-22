<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    @yield('css')
    <title>ASDJ | @yield('title')</title>
</head>
<body>
    <main>
        @yield('content')
    </main>

    @yield('script')
</body>
</html>
