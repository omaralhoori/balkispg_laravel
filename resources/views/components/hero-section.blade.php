@php
    $homePage = $homePage ?? \App\Models\HomePage::getCurrent();
    $services = $services ?? $homePage->activeServices;
    $mainBgImage = $homePage->main_background_image_url 
        ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDgY6giqkj21tUvclk3yFwACm-TA3MpuiAmhESMAAJH30FG5E4lt2_XTywcqzvo_tHIfTmiA9hjqoMbJe96DTcRbx07K9FiJVUTN6gWYKdvrICMQGbdOZRqq6JE4lG8olMYHgocw45mNjTi4geQCEsHg1YKHdiaEdWZDKs9I_MkCqBnAMRFfDK013HRnHSCcnlUknLqOP0_mkrOjfvmq6hKdsaJtL205T0fFp44s8SqQPysOWE2-gtWdJ5s0_C7mMn83RH_WPbkPkj7';
@endphp

<section class="hero-section relative min-h-screen flex flex-col items-center justify-start pt-24 pb-16 overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0 bg-cover bg-center"
         style="background-image: linear-gradient(rgba(18,18,22,0.72), rgba(18,18,22,0.88)), url('{{ $mainBgImage }}');">
    </div>

   

    {{-- Radial glow top --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[340px] rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(198,162,100,0.18) 0%, transparent 70%); z-index:1;"></div>

    <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-12 flex flex-col items-center gap-8">

        {{-- ============================================================ --}}
        {{-- 1. Company Name + Logo --}}
        {{-- ============================================================ --}}
        <div class="flex items-center justify-center gap-4 animate-hero-fade mt-10" style="animation-delay:0s">
            
            {{-- Company Name --}}
            <div class="text-center ltr:text-left rtl:text-right">
                <h1 class="text-4xl lg:text-5xl font-black font-heading  text-white leading-tight">
                    <span class="font-heading">{{ $homePage->main_title ?? 'مجموعة بلقيس' }}</span> 
                    <span class="text-4xl lg:text-5xl  text-primary  font-heading uppercase ">{{ $homePage->main_subtitle }}</span>
                </h1>
            </div>

            {{-- Logo --}}
            <div class="h-24 w-24 flex items-center justify-center rounded-full backdrop-blur-sm overflow-hidden shrink-0">
                <img src="/image/bpg.png"
                     alt="{{ __('شعار مجموعة بلقيس') }}"
                     class="h-full w-full object-contain p-1"
                     onerror="this.parentElement.innerHTML='<span class=\'material-symbols-outlined text-primary text-3xl\'>stars</span>'">
            </div>
        </div>

        {{-- ============================================================ --}}
        {{-- 2. Description --}}
        {{-- ============================================================ --}}
        <p class="hero-description text-gray-300 text-lg leading-relaxed text-center max-w-2xl animate-hero-fade"
           style="animation-delay:0.15s">
            {{ $homePage->main_description ?? 'اكتشف قمة السياحة الفاخرة في تركيا، والعقارات المتميزة، والاستثمارات الاستراتيجية. نحن نصنع تجارب لا تُنسى ومستقبلاً واعداً.' }}
        </p>

        {{-- ============================================================ --}}
        {{-- 3. Slogan — Gold Gradient Frame --}}
        {{-- ============================================================ --}}
        <div class="hero-slogan-wrapper animate-hero-fade" style="animation-delay:0.3s">
            <div class="relative inline-flex items-center justify-center px-10 py-4 rounded-xl bg-gold-gradient"
                 style="background: linear-gradient(135deg, rgba(118,92,57,0.18) 0%, rgba(196,165,113,0.18) 100%);
                        border: 1.5px solid transparent;
                        background-clip: padding-box;">
                {{-- Gold border via pseudo via box shadow --}}
                <div class="absolute inset-0 rounded-xl pointer-events-none"
                     style="background: linear-gradient(135deg,#765C39,#C4A571,#765C39) border-box;
                            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
                            -webkit-mask-composite: destination-out;
                            mask-composite: exclude;
                            border: 1.5px solid transparent;"></div>
                {{-- Corner decorations --}}
                <span class="absolute -top-1.5 -start-1.5 w-3 h-3 rounded-full bg-primary opacity-80"></span>
                <span class="absolute -top-1.5 -end-1.5 w-3 h-3 rounded-full bg-primary opacity-80"></span>
                <span class="absolute -bottom-1.5 -start-1.5 w-3 h-3 rounded-full bg-primary opacity-80"></span>
                <span class="absolute -bottom-1.5 -end-1.5 w-3 h-3 rounded-full bg-primary opacity-80"></span>

                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary text-xl">format_quote</span>
                    <span class="text-gold-gradient font-heading font-bold text-xl sm:text-2xl tracking-wide">
                        {{ $homePage->main_badge_text ?? 'التميز والفخامة في كل خطوة' }}
                    </span>
                    <span class="material-symbols-outlined text-primary text-xl rotate-180">format_quote</span>
                </div>
            </div>
        </div>

        {{-- ============================================================ --}}
        {{-- 4. CTA Button (optional) --}}
        {{-- ============================================================ --}}
        @if($homePage->cta_button_text)
        <div class="animate-hero-fade" style="animation-delay:0.42s">
            <a href="{{ $homePage->cta_button_url ?? '#' }}"
               class="inline-flex items-center gap-2 h-12 px-8 rounded-lg bg-gold-gradient text-[#201d13] font-bold hover:brightness-110 transition-all duration-300 shadow-[0_0_24px_rgba(198,162,100,0.3)]">
                <span>{{ $homePage->cta_button_text }}</span>
                <span class="material-symbols-outlined text-xl {{ app()->getLocale() == 'ar' ? 'flip-rtl' : '' }}">arrow_right_alt</span>
            </a>
        </div>
        @endif

        {{-- ============================================================ --}}
        {{-- 5. Three Sub-Company Cards --}}
        {{-- ============================================================ --}}
        <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6 mt-4 animate-hero-fade" style="animation-delay:0.55s">
            @foreach($services as $idx => $service)
            <a href="{{ $service->card_url ?? '#' }}"
               class="sub-company-card group relative flex flex-col rounded-2xl overflow-hidden border border-white/10 hover:border-primary/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_16px_40px_-12px_rgba(198,162,100,0.35)]"
               style="background: rgba(18,18,22,0.7); backdrop-filter: blur(14px);">

                {{-- Card Top Accent Line --}}
                <div class="absolute top-0 inset-x-0 h-0.5 bg-gold-gradient opacity-60 group-hover:opacity-100 transition-opacity duration-300"></div>

                {{-- Company Name (top) --}}
                <div class="flex items-center justify-between px-5 pt-5 pb-3">
                    <h3 class="text-white font-heading font-bold text-lg group-hover:text-primary transition-colors duration-300">
                        {{ $service->card_title }}
                    </h3>
                    <span class="material-symbols-outlined text-primary text-2xl">{{ $service->card_icon }}</span>
                </div>

                {{-- Card Description --}}
                <div class="px-5 mb-4">
                    <p class="text-gray-400 text-sm leading-relaxed line-clamp-2 group-hover:text-gray-300 transition-colors duration-300">
                        {{ $service->card_description }}
                    </p>
                </div>

                {{-- Divider --}}
                <div class="mx-5 h-px bg-white/10 group-hover:bg-primary/30 transition-colors duration-300"></div>

                {{-- Card Bottom: Logo + Service Icons --}}
                <div class="flex items-center justify-between gap-4 px-5 py-5">
                   
                    {{-- Service Icons with Tooltips --}}
                    <div class="flex items-center gap-2 flex-wrap justify-end">
                        @if($service->stats && is_array($service->stats))
                            @foreach($service->stats as $svc)
                            <div class="service-icon-wrapper relative group/tip">
                                {{-- Icon Button --}}
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center border border-white/10 bg-white/5 hover:bg-primary/20 hover:border-primary/60 transition-all duration-200 cursor-default">
                                    <span class="material-symbols-outlined text-gray-400 group-hover/tip:text-primary transition-colors duration-200 text-base">
                                        {{ $svc['icon'] ?? ($svc['icon_name'] ?? 'star') }}
                                    </span>
                                </div>
                                {{-- Tooltip --}}
                                <div class="service-tooltip absolute z-50 bottom-full mb-2 start-1 -translate-x-1/2
                                            w-48 rounded-xl px-3 py-2.5 pointer-events-none
                                            opacity-0 invisible group-hover/tip:opacity-100 group-hover/tip:visible
                                            transition-all duration-200 translate-y-1 group-hover/tip:translate-y-0"
                                     style="background: linear-gradient(135deg, rgba(22,20,16,0.97) 0%, rgba(35,28,18,0.97) 100%);
                                            border: 1px solid rgba(198,162,100,0.35);
                                            box-shadow: 0 8px 24px -4px rgba(0,0,0,0.6);">
                                    <p class="text-primary text-xs font-bold mb-1">{{ $svc['label'] ?? '' }}</p>
                                    <p class="text-gray-300 text-xs leading-relaxed">{{ $svc['desc'] ?? ($svc['description'] ?? '') }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- Company Logo --}}
                    <div class="shrink-0 flex items-center justify-center w-14 h-14 rounded-xl border border-white/10 bg-white/5 overflow-hidden">
                        @if($service->card_image_url)
                            <img src="{{ $service->card_image_url }}"
                                 alt="{{ $service->card_title }}"
                                 class="w-full h-full object-contain p-1">
                        @else
                            <span class="material-symbols-outlined text-primary text-3xl">{{ $service->card_icon }}</span>
                        @endif
                    </div>
                </div>

                {{-- Hover glow --}}
                <div class="absolute inset-0 rounded-2xl pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                     style="background: radial-gradient(ellipse at 50% 100%, rgba(198,162,100,0.07) 0%, transparent 70%);"></div>
            </a>
            @endforeach
        </div>

    </div>

    {{-- Bottom fade --}}
    <div class="absolute bottom-0 w-full h-24 pointer-events-none" style="background: linear-gradient(to top, rgba(18,18,22,1) 0%, transparent 100%);"></div>
</section>

{{-- Hero Animations --}}
<style>
@keyframes heroFadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
}
.animate-hero-fade {
    opacity: 0;
    animation: heroFadeUp 0.75s ease forwards;
}

/* Tooltip: ensure it appears above on RTL too */
[dir="rtl"] .service-tooltip {
    transform: translateX(50%);
}
[dir="rtl"] .group\/tip:hover .service-tooltip {
    transform: translateX(50%) translateY(0);
}
</style>

@push('scripts')
@php
    $servicesData = $services->mapWithKeys(function($service) {
        return [$service->service_key => [
            'id'            => $service->service_key,
            'title'         => $service->title,
            'subtitle'      => $service->subtitle,
            'description'   => $service->description,
            'badge'         => $service->badge_text,
            'badgeIcon'     => $service->badge_icon,
            'backgroundImage' => $service->background_image_url,
            'ctaButtonText' => $service->cta_button_text,
            'ctaButtonUrl'  => $service->cta_button_url ?? '#',
            'stats'         => $service->stats ?? [],
        ]];
    })->toArray();
@endphp
<script>
    window.homePageServices = @json($servicesData);
</script>
@endpush