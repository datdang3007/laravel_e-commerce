<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Thêm CDN Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    @include('partials.home_header')

    <!-- Content -->
    @yield('content')
    
    <!-- Footer -->
    @include('partials.home_footer')
</body>
    <!-- Thêm CDN Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @yield('scripts')
</html>
