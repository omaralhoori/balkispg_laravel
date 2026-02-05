@php
    $homePage = $homePage ?? \App\Models\HomePage::getCurrent();
    // Get statistics from homePage or use defaults
    $statistics = $homePage->statistics ?? [
        [
            'value' => '١٥+',
            'label' => 'سنة خبرة',
            'icon' => 'calendar_today',
        ],
        [
            'value' => '٥٠٠+',
            'label' => 'مشروع ناجح',
            'icon' => 'check_circle',
        ],
        [
            'value' => '١٠٠٠+',
            'label' => 'عميل راضٍ',
            'icon' => 'people',
        ],
        [
            'value' => '٢٤/٧',
            'label' => 'دعم مستمر',
            'icon' => 'support_agent',
        ],
    ];
    
    // Get header content from database or use defaults
    $badgeText = $homePage->statistics_badge_text ?? 'إنجازاتنا';
    $title = $homePage->statistics_title ?? 'أرقام تتحدث';
    $subtitle = $homePage->statistics_subtitle ?? null;
    $description = $homePage->statistics_description ?? 'نحن نفخر بإنجازاتنا وشراكاتنا الاستراتيجية مع نخبة المستثمرين ورجال الأعمال في المنطقة';
@endphp

<!-- Statistics Section -->
<section class="relative py-20 px-4 md:px-10 lg:px-20 overflow-hidden">
    <!-- Background Decorative Element -->
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[120px] -z-10 -translate-x-1/2 -translate-y-1/2"></div>
    
    <div class="max-w-7xl mx-auto flex flex-col gap-10">
        <!-- Header -->
        <div class="flex flex-col items-center text-center gap-3">
            @if($badgeText)
                <span class="text-primary text-sm font-bold tracking-widest uppercase">{{ $badgeText }}</span>
            @endif
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
                @if($subtitle)
                    {{ $title }} <span class="text-primary">{{ $subtitle }}</span>
                @else
                    @php
                        // Check if title contains "تتحدث" or similar pattern to highlight part
                        if (str_contains($title, 'تتحدث')) {
                            $titleParts = explode(' ', $title, 2);
                            if (count($titleParts) > 1) {
                                echo $titleParts[0] . ' <span class="text-primary">' . $titleParts[1] . '</span>';
                            } else {
                                echo $title;
                            }
                        } else {
                            echo $title;
                        }
                    @endphp
                @endif
            </h2>
            @if($description)
                <p class="text-gold-dim max-w-2xl text-lg">
                    {{ $description }}
                </p>
            @endif
        </div>
        
        <!-- Statistics Flex -->
        <div class="flex flex-wrap justify-center items-stretch gap-6 mt-8">
            @foreach($statistics as $stat)
                <div class="glass-card p-8 rounded-xl flex flex-col items-center text-center gap-4 transition-all duration-300 hover:border-primary/30 hover:scale-105 flex-1 min-w-[250px] max-w-[300px]">
                    @if(isset($stat['icon']))
                        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center border border-primary/20">
                            <span class="material-symbols-outlined text-primary text-3xl">{{ $stat['icon'] }}</span>
                        </div>
                    @endif
                    <div class="flex flex-col gap-2">
                        <p class="stat-value text-4xl md:text-5xl font-bold text-white leading-none">
                            {{ $stat['value'] ?? '' }}
                        </p>
                        <p class="stat-label text-gold-dim text-base font-medium">
                            {{ $stat['label'] ?? '' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

