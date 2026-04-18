@php
    $homePage = $homePage ?? \App\Models\HomePage::getCurrent();
    $aboutImage = $homePage->about_image 
        ? asset('storage/' . $homePage->about_image) 
        : 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1200';
@endphp

<section class="about-vision-section relative py-24 bg-[#121216] overflow-hidden">
    {{-- Decorative backgrounds --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
        
        <!-- <div class="max-w-3xl mb-16">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-8 h-1 bg-gold-gradient rounded-full"></span>
                <span class="text-primary font-bold uppercase tracking-[0.2em] text-sm">{{ $homePage->about_title }}</span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black font-heading text-white leading-tight mb-6">
                {{ $homePage->about_title }}
            </h2>
            <p class="text-gray-400 text-lg leading-relaxed">
                {!! nl2br(e($homePage->about_description)) !!}
            </p>
        </div> -->

        {{-- ============================================================ --}}
        {{-- 2. Highlights (Services Summary + Vision + Mission) --}}
        {{-- ============================================================ --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @php
                $links = $homePage->home_links ?? [];
                // Ensure we have 5 if something went wrong
                if (count($links) < 5) {
                    $links = array_merge($links, array_fill(0, 5 - count($links), ['title' => '...', 'url' => '#', 'icon' => 'help']));
                }
            @endphp
            
            @foreach($links as $index => $link)
            <a href="{{ $link['url'] ?? '#' }}" 
               class="link-card group relative bg-white/[0.03] border border-white/10 p-6 rounded-2xl transition-all duration-500 hover:bg-primary/10 hover:border-primary/40 flex flex-col items-center text-center gap-4"
               style="animation-delay: {{ $index * 100 }}ms">
                
                {{-- Icon Container --}}
                <div class="w-16 h-16 bg-gold-gradient rounded-xl flex items-center justify-center shadow-lg shadow-primary/10 group-hover:scale-110 group-hover:-translate-y-2 transition-all duration-500">
                    <span class="material-symbols-outlined text-[#201d13] text-3xl font-bold">
                        {{ $link['icon'] ?? 'arrow_forward' }}
                    </span>
                </div>

                <h3 class="text-lg font-bold font-heading text-white group-hover:text-primary transition-colors">
                    {{ $link['title'] ?? '' }}
                </h3>

                {{-- Hover Decoration --}}
                <div class="absolute bottom-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="material-symbols-outlined text-primary text-sm animate-bounce">keyboard_double_arrow_down</span>
                </div>

                {{-- Card Glow --}}
                <div class="absolute -inset-1 bg-primary/20 rounded-2xl blur opacity-0 group-hover:opacity-100 transition-opacity -z-10"></div>
            </a>
            @endforeach
        </div>

    </div>
</section>

<style>
.about-vision-section {
    position: relative;
}
.about-vision-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
}
.link-card {
    box-shadow: 0 10px 40px -10px rgba(0,0,0,0.5);
    animation: fadeInUp 0.8s ease-out both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
