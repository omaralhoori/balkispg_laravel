<header class="fixed top-0 w-full z-50 border-b border-primary/10 bg-bg-main/90 backdrop-blur-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-3">

            <h2 class="text-white text-xl font-extrabold tracking-widest font-display">BALKIS <span class="text-primary font-light">PREMIUM</span></h2>
        </div>
        <nav class="hidden md:flex gap-8">
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('home') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('home', ['locale' => app()->getLocale()]) }}">{{ __('Home') }}</a>
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('programs.*') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('programs.index', ['locale' => app()->getLocale()]) }}">{{ __('Programs') }}</a>
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('blog.*') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}">{{ __('Blog') }}</a>
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('about') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('about', ['locale' => app()->getLocale()]) }}">{{ __('About') }}</a>
        </nav>
        <div class="flex items-center gap-4">
            <x-language-switcher />
            <a href="{{ route('whatsapp.redirect', ['locale' => app()->getLocale()]) }}" target="_blank" rel="noopener noreferrer" class="bg-primary text-zinc-dark px-5 py-2 text-xs font-bold uppercase tracking-wider hover:bg-white transition-colors">{{ __('Contact Us') }}</a>
            <div class="md:hidden text-white">
                <span class="material-symbols-outlined cursor-pointer">menu</span>
            </div>
        </div>
    </div>
</header>
