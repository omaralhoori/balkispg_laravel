<!DOCTYPE html>
<html class="dark" dir="rtl" lang="ar">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Balkis Premium Group')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Noto+Sans+Arabic:wght@400;500;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-[#111418] dark:text-white">
    <div class="relative flex min-h-screen flex-col overflow-hidden bg-background-light dark:bg-background-dark">
        @include('components.navigation')
        
        <main class="flex-grow">
            @yield('content')
        </main>
        
        @hasSection('showStatsBar')
            @include('components.stats-bar')
        @endif
        
        @include('components.footer')
    </div>
    
    @stack('scripts')
</body>
</html>
