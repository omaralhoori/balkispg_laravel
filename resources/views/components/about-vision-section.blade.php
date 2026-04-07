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
        
        {{-- ============================================================ --}}
        {{-- 1. About Us (Text + Image) --}}
        {{-- ============================================================ --}}
        <!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
            {{-- Image Side --}}
            <div class="relative group order-2 lg:order-1">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ $aboutImage }}" alt="{{ $homePage->about_title }}" class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#121216]/60 to-transparent"></div>
                </div>
                {{-- Decorative frame --}}
                <div class="absolute -bottom-6 -start-6 w-32 h-32 border-s-4 border-b-4 border-primary/40 rounded-bl-3xl -z-10"></div>
                <div class="absolute -top-6 -end-6 w-32 h-32 border-e-4 border-t-4 border-primary/40 rounded-tr-3xl -z-10"></div>
                
                {{-- Experience Badge --}}
                <div class="absolute bottom-10 start-10 bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl">
                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-bold font-heading text-primary">15+</span>
                        <div class="h-10 w-px bg-white/20"></div>
                        <span class="text-white font-medium uppercase tracking-wider text-sm leading-tight">
                            {{ __('سنوات من') }}<br>{{ __('الخبرة العقارية') }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Text Side --}}
            <div class="flex flex-col gap-6 order-1 lg:order-2">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-1 bg-gold-gradient rounded-full"></span>
                    <span class="text-primary font-bold uppercase tracking-[0.2em] text-sm">{{ __('لماذا نحن') }}</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-black font-heading text-white leading-tight">
                   
                </h2>
                <div class="text-gray-400 text-lg leading-relaxed space-y-4">
                    {!! nl2br(e($homePage->about_description)) !!}
                </div>
                
                <div class="flex flex-wrap gap-4 mt-4">
                    <div class="flex items-center gap-3 bg-white/5 border border-white/10 px-5 py-3 rounded-xl transition-colors hover:bg-white/10 group">
                        <span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">verified_user</span>
                        <span class="text-white font-medium">{{ __('جودة موثوقة') }}</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/5 border border-white/10 px-5 py-3 rounded-xl transition-colors hover:bg-white/10 group">
                        <span class="material-symbols-outlined text-primary group-hover:scale-110 transition-transform">handshake</span>
                        <span class="text-white font-medium">{{ __('شراكات استراتيجية') }}</span>
                    </div>
                </div>
            </div>
        </div> -->

        {{-- ============================================================ --}}
        {{-- 2. Highlights (Services Summary + Vision + Mission) --}}
        {{-- ============================================================ --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {{-- Services Summary --}}
            <div class="pillar-card group bg-white/[0.03] border border-white/10 p-8 rounded-3xl transition-all duration-500 hover:bg-primary/5 hover:border-primary/40">
                
                <div class="w-14 h-14 bg-gold-gradient rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-[#201d13] text-3xl font-bold">apps</span>
                </div>
                <h3 class="text-2xl font-bold font-heading text-white mb-4 group-hover:text-primary transition-colors">
                     {{ $homePage->about_title }}
                </h3>
                <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
                    {!! nl2br(e($homePage->about_description)) !!}
                </p>
                <!-- <div class="mt-8">
                    <a href="#services" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-4 transition-all">
                        <span>{{ __('اكتشف المزيد') }}</span>
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </a>
                </div> -->
            </div>

            {{-- Vision --}}
            <div class="pillar-card group bg-white/[0.03] border border-white/10 p-8 rounded-3xl transition-all duration-500 hover:bg-primary/5 hover:border-primary/40">
                <div class="w-14 h-14 bg-gold-gradient rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-[#201d13] text-3xl font-bold">
                        {{ $homePage->vision_icon ?? 'visibility' }}
                    </span>
                </div>
                <h3 class="text-2xl font-bold font-heading text-white mb-4 group-hover:text-primary transition-colors">
                    {{ $homePage->vision_title }}
                </h3>
                <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
                    {{ $homePage->vision_description }}
                </p>
            </div>

            {{-- Mission --}}
            <div class="pillar-card group bg-white/[0.03] border border-white/10 p-8 rounded-3xl transition-all duration-500 hover:bg-primary/5 hover:border-primary/40">
                <div class="w-14 h-14 bg-gold-gradient rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-primary/20 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-[#201d13] text-3xl font-bold">
                        {{ $homePage->mission_icon ?? 'rocket_launch' }}
                    </span>
                </div>
                <h3 class="text-2xl font-bold font-heading text-white mb-4 group-hover:text-primary transition-colors">
                    {{ $homePage->mission_title }}
                </h3>
                <p class="text-gray-400 leading-relaxed group-hover:text-gray-300 transition-colors">
                    {{ $homePage->mission_description }}
                </p>
            </div>

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
.pillar-card {
    box-shadow: 0 10px 40px -10px rgba(0,0,0,0.5);
}
</style>
