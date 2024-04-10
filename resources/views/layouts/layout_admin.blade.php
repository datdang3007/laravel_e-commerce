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
    <div class="flex">
        <!-- Left Sidebar -->
        @if(isset($sidebarMenu))
            @include('components.sidebar_menu', ['menuItems' => $sidebarMenu])
        @endif

        <div class="flex flex-col w-10/12 h-screen">
            <!-- Header Partial -->
            @include('partials.admin_header')

            <!-- Main Content -->
            <div class="flex-1 overflow-y-auto">
                <div class="main-content px-4 py-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- Thêm CDN Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @yield('scripts')
</html>
