@php
    $homePage = $homePage ?? \App\Models\HomePage::getCurrent();
    $apiUrl = $homePage->tourism_api_url;
    $sectionTitle = $homePage->tourism_section_title ?? __('أهم التفاصيل السياحية');
    
    // Fetch data if API URL is set
    $tourismItems = [];
    if ($apiUrl) {
        $tourismItems = cache()->remember('tourism_details_api_v1', now()->addHours(6), function() use ($apiUrl) {
            try {
                $response = \Illuminate\Support\Facades\Http::timeout(5)->get($apiUrl);
                if ($response->successful()) {
                    $json = $response->json();
                    // Assuming API returns an array or 'data' key
                    return is_array($json) ? ($json['data'] ?? $json) : [];
                }
            } catch (\Exception $e) {
                \Log::warning('Tourism API Error: ' . $e->getMessage());
            }
            return [];
        });
    }

    // Filter or limit items (top 3 or 4)
    $tourismItems = array_slice(array_filter((array)$tourismItems), 0, 4);
    
    // Get WhatsApp link helper
    $whatsapp = \App\Models\WhatsAppNumber::where('is_active', true)->orderBy('order')->first();
@endphp

@if($apiUrl && !empty($tourismItems))
<section class="tourism-details-section py-24 bg-[#f8f9fa] relative overflow-hidden">
    {{-- Decorative bg --}}
    <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] pointer-events-none" 
         style="background-image: radial-gradient(#C6A264 1px, transparent 1px); background-size: 30px 30px;"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
        
        {{-- Section Header --}}
        <div class="flex flex-col items-center mb-16 text-center">
            <div class="flex items-center gap-3 mb-4">
                <span class="w-10 h-1 bg-gold-gradient rounded-full"></span>
                <span class="text-primary font-bold uppercase tracking-widest text-sm uppercase">{{ __('اكتشف تركيا') }}</span>
                <span class="w-10 h-1 bg-gold-gradient rounded-full"></span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black font-heading text-gray-900 leading-tight">
                {{ $sectionTitle }}
            </h2>
        </div>

        {{-- Items Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($tourismItems as $item)
                @php
                    // Map common API fields (name/title, image, desc)
                    $name = $item['name'] ?? $item['title'] ?? '';
                    $image = $item['image'] ?? $item['thumbnail'] ?? '';
                    $desc = $item['description'] ?? $item['short_desc'] ?? $item['excerpt'] ?? '';
                    
                    // Pre-fill WhatsApp message
                    $waMessage = __('مرحباً، أود معرفة المزيد من التفاصيل حول: ') . $name;
                    $waUrl = '#';
                    if ($whatsapp) {
                        $waUrl = $whatsapp->getWhatsAppUrl($waMessage);
                    }
                @endphp
                
                <a href="{{ $waUrl }}" target="_blank"
                   class="tourism-card group relative h-[420px] rounded-2xl overflow-hidden shadow-lg transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    
                    {{-- Background Image --}}
                    <div class="absolute inset-0 z-0">
                        <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    </div>

                    {{-- Content --}}
                    <div class="absolute inset-0 z-10 flex flex-col justify-end p-6">
                        <h3 class="text-xl font-bold font-heading text-white mb-2 group-hover:text-primary transition-colors">
                            {{ $name }}
                        </h3>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4 line-clamp-2 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            {{ $desc }}
                        </p>
                        
                        <div class="flex items-center gap-2 text-primary text-sm font-bold mt-2">
                            <span class="material-symbols-outlined text-lg">whatsapp</span>
                            <span>{{ __('استفسر الآن') }}</span>
                            <span class="material-symbols-outlined text-sm ltr:group-hover:translate-x-2 rtl:group-hover:-translate-x-2 transition-transform">arrow_forward</span>
                        </div>
                    </div>

                    {{-- Heat Badge (Optional Decorative - showing 'Top Pick') --}}
                    <div class="absolute top-4 end-4 z-20">
                        <div class="bg-primary/90 text-[#201d13] text-[10px] font-bold px-2 py-1 rounded-md flex items-center gap-1 shadow-md">
                            <span class="material-symbols-outlined text-xs">local_fire_department</span>
                            <span class="uppercase tracking-tighter">{{ __('رائج') }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>
@endif

<style>
.tourism-card {
    background: #2b2b35; /* Fallback */
}
.tourism-details-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to bottom, #121216 0%, transparent 100%);
    z-index: 1;
    pointer-events: none;
}
</style>
