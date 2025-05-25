<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SiKANDA</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/diskominfo.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>
    <div class="animated-bg"></div>
    <div class="container">
        <img src="{{ asset('img/white.png') }}" alt="Logo DISKOMINFOTIK" class="logo" width="30%">
        @yield('content')
    </div>
</body>

</html>
