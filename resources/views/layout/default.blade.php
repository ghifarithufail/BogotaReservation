<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        @include('includes.header')
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-52 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        @include('includes.sidebar')
    </aside>

    <div>
        @yield('content')
    </div>

    {{-- js --}}
    @include('includes.js')
</body>
</html>
