@extends('layouts.app')

@section('title', 'برامجنا الحصرية - Balkis Premium Group')

@php
    $homePage = \App\Models\HomePage::getCurrent();
@endphp

@section('content')
<section class="relative pt-44 pb-20 luxury-pattern">
    <div class="absolute inset-0 bg-gradient-to-b from-bg-main/50 via-bg-main to-bg-main"></div>
    <div class="relative z-10 container mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-black text-primary mb-6 font-display tracking-tight leading-tight">
            برامجنا الحصرية والمميزة
        </h1>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg leading-relaxed">
            اكتشف فرص استثمارية وسياحية مصممة خصيصاً لتناسب احتياجات النخبة، نجمع بين الفخامة التركية والعوائد المتميزة.
        </p>
    </div>
</section>

<section class="sticky top-[73px] z-40 bg-bg-main/95 border-b border-white/5 py-6 backdrop-blur-md">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
            <div class="flex flex-wrap gap-2 justify-center">
                <button class="category-filter px-6 py-2 rounded-full border border-primary bg-primary/10 text-primary text-sm font-bold" data-category="all">
                    الكل
                </button>
                @foreach($categories as $category)
                    <button class="category-filter px-6 py-2 rounded-full border border-white/10 hover:border-primary/50 text-gray-400 hover:text-primary text-sm font-bold transition-all" data-category="{{ $category }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>
            <div class="relative w-full lg:w-96">
                <input id="search-input" class="w-full bg-zinc-dark border border-white/10 text-white px-5 py-2.5 pr-12 rounded-lg focus:ring-1 focus:ring-primary focus:border-primary outline-none text-sm" placeholder="ابحث عن برنامج..." type="text"/>
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-primary text-xl">search</span>
            </div>
        </div>
    </div>
</section>

<main class="container mx-auto px-6 py-16">
    <div id="programs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-10">
        @foreach($programs as $program)
            <div class="program-card group bg-zinc-dark border border-white/5 rounded-2xl overflow-hidden card-shadow transition-all duration-500 hover:-translate-y-2" data-category="{{ $program->category }}" data-title="{{ strtolower($program->title) }}" data-description="{{ strtolower($program->description ?? '') }}">
                <div class="relative h-64 overflow-hidden">
                    @if($program->image_url)
                        <img alt="{{ $program->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $program->image_url }}"/>
                    @else
                        <div class="w-full h-full bg-zinc-800 flex items-center justify-center">
                            <span class="material-symbols-outlined text-6xl text-gray-600">image</span>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4 bg-primary text-zinc-dark px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-sm">
                        {{ $program->category }}
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-primary transition-colors font-display">{{ $program->title }}</h3>
                    @if($program->description)
                        <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-2">{{ $program->description }}</p>
                    @endif
                    <a href="{{ $program->url ?? '#' }}" class="w-full flex items-center justify-center gap-2 py-3 border border-primary/30 text-primary text-sm font-bold hover:bg-primary hover:text-zinc-dark transition-all group-hover:border-primary">
                        <span>استكشف التفاصيل</span>
                        <span class="material-symbols-outlined text-lg">arrow_left_alt</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    
    @if($programs->count() === 0)
        <div class="text-center py-20">
            <span class="material-symbols-outlined text-6xl text-gray-600 mb-4">inbox</span>
            <p class="text-gray-400 text-lg">لا توجد برامج متاحة حالياً</p>
        </div>
    @endif

    <div id="pagination" class="mt-20 flex justify-center items-center gap-4">
        <!-- Pagination will be handled by JavaScript if needed -->
    </div>
</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryFilters = document.querySelectorAll('.category-filter');
        const searchInput = document.getElementById('search-input');
        const programCards = document.querySelectorAll('.program-card');
        
        let currentCategory = 'all';
        let currentSearch = '';
        
        function filterPrograms() {
            let visibleCount = 0;
            
            programCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardTitle = card.getAttribute('data-title');
                const cardDescription = card.getAttribute('data-description');
                
                const matchesCategory = currentCategory === 'all' || cardCategory === currentCategory;
                const matchesSearch = currentSearch === '' || 
                    cardTitle.includes(currentSearch.toLowerCase()) || 
                    cardDescription.includes(currentSearch.toLowerCase());
                
                if (matchesCategory && matchesSearch) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show message if no results
            const grid = document.getElementById('programs-grid');
            let noResultsMsg = document.getElementById('no-results-message');
            
            if (visibleCount === 0) {
                if (!noResultsMsg) {
                    noResultsMsg = document.createElement('div');
                    noResultsMsg.id = 'no-results-message';
                    noResultsMsg.className = 'col-span-full text-center py-20';
                    noResultsMsg.innerHTML = `
                        <span class="material-symbols-outlined text-6xl text-gray-600 mb-4">search_off</span>
                        <p class="text-gray-400 text-lg">لم يتم العثور على برامج تطابق البحث</p>
                    `;
                    grid.appendChild(noResultsMsg);
                }
            } else {
                if (noResultsMsg) {
                    noResultsMsg.remove();
                }
            }
        }
        
        // Category filter
        categoryFilters.forEach(button => {
            button.addEventListener('click', function() {
                categoryFilters.forEach(btn => {
                    btn.classList.remove('border-primary', 'bg-primary/10', 'text-primary');
                    btn.classList.add('border-white/10', 'text-gray-400');
                });
                
                this.classList.add('border-primary', 'bg-primary/10', 'text-primary');
                this.classList.remove('border-white/10', 'text-gray-400');
                
                currentCategory = this.getAttribute('data-category');
                filterPrograms();
            });
        });
        
        // Search filter
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                currentSearch = this.value;
                filterPrograms();
            });
        }
    });
</script>
@endpush

