<header class="fixed top-0 w-full z-50 border-b border-primary/10 bg-bg-main/90 backdrop-blur-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-sm bg-primary/10 text-primary border border-primary/20">
                <span class="material-symbols-outlined text-2xl">diamond</span>
            </div>
            <h2 class="text-white text-xl font-extrabold tracking-widest font-display">BALKIS <span class="text-primary font-light">PREMIUM</span></h2>
        </div>
        <nav class="hidden md:flex gap-8">
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('home') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('home') }}">الرئيسية</a>
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium {{ request()->routeIs('programs.*') ? 'text-primary border-b border-primary' : '' }}" href="{{ route('programs.index') }}">برامجنا</a>
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium" href="#services">خدمات الاستثمار</a>
            <a class="text-gray-400 hover:text-primary transition-colors text-sm font-medium" href="#contact">عن المجموعة</a>
        </nav>
        <div class="flex items-center gap-4">
            <a href="#contact" class="bg-primary text-zinc-dark px-5 py-2 text-xs font-bold uppercase tracking-wider hover:bg-white transition-colors">اتصل بنا</a>
            <div class="md:hidden text-white">
                <span class="material-symbols-outlined cursor-pointer">menu</span>
            </div>
        </div>
    </div>
</header>
