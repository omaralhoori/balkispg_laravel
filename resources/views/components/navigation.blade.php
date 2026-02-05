<header class="absolute top-0 w-full z-50 border-b border-[#433d28]/30 bg-[#201d12]/80 backdrop-blur-sm">
    <div class="flex items-center justify-between px-6 py-4 lg:px-20">
        <div class="flex items-center gap-4 text-white">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary">
                <span class="material-symbols-outlined text-2xl">diamond</span>
            </div>
            <h2 class="text-white text-xl font-bold tracking-tight">BALKIS PREMIUM</h2>
        </div>
        <nav class="hidden md:flex flex-1 justify-end gap-10">
            <a class="text-white hover:text-primary transition-colors text-sm font-medium" href="{{ route('home') }}">الرئيسية</a>
            <a class="text-white hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('programs.*') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('programs.index') }}">برامجنا</a>
            <a class="text-white hover:text-primary transition-colors text-sm font-medium" href="#services">خدماتنا</a>
            <a class="text-white hover:text-primary transition-colors text-sm font-medium" href="#packages">الباقات</a>
            <a class="text-white hover:text-primary transition-colors text-sm font-medium" href="#contact">تواصل معنا</a>
        </nav>
        <div class="md:hidden text-white">
            <span class="material-symbols-outlined cursor-pointer">menu</span>
        </div>
    </div>
</header>
