@extends('layouts.app')

@section('title', $post->meta_title . ' - Balkis Premium Group')

@php
    $homePage = \App\Models\HomePage::getCurrent();
    
    // Calculate reading time (assuming average reading speed of 200 words per minute)
    $wordCount = str_word_count(strip_tags($post->content ?? ''));
    $readingTime = max(1, ceil($wordCount / 200));
    
    // SEO Meta Tags
    $metaTitle = $post->meta_title ?: $post->title;
    $metaDescription = $post->meta_description ?: $post->excerpt;
    $metaKeywords = $post->meta_keywords;
    $ogImage = $post->og_image_url;
    $canonicalUrl = $post->canonical_url ?: route('blog.show', $post->slug);
    $currentUrl = url()->current();
@endphp

@section('meta_description', $metaDescription)
@if($metaKeywords)
    @section('meta_keywords', $metaKeywords)
@endif

@section('og_type', 'article')
@section('og_url', $currentUrl)
@section('og_title', $metaTitle)
@section('og_description', $metaDescription)
@if($ogImage)
    @section('og_image', $ogImage)
@endif

@section('canonical_url', $canonicalUrl)

@section('content')
<section class="relative pt-20">
    <div class="h-[60vh] md:h-[75vh] relative overflow-hidden">
        @if($post->featured_image_url)
            <img alt="{{ $post->title }}" class="w-full h-full object-cover" src="{{ $post->featured_image_url }}"/>
        @else
            <div class="w-full h-full bg-zinc-dark flex items-center justify-center">
                <span class="material-symbols-outlined text-6xl text-gray-600">image</span>
            </div>
        @endif
        <div class="absolute inset-0 featured-gradient"></div>
        <div class="absolute bottom-0 w-full">
            <div class="max-w-5xl mx-auto px-6 pb-16">
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <span class="bg-primary text-zinc-dark px-4 py-1 text-xs font-bold rounded-sm uppercase tracking-widest">{{ $post->category }}</span>
                    <span class="text-gray-300 text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-primary">calendar_today</span>
                        {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                    </span>
                    <span class="text-gray-300 text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm text-primary">schedule</span>
                        {{ $readingTime }} دقائق قراءة
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-white font-almarai leading-tight max-w-4xl">{{ $post->title }}</h1>
            </div>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-6 py-16">
    <div class="flex flex-col lg:flex-row gap-16">
        <div class="w-full lg:w-2/3">
            <article class="article-content">
                @if($post->excerpt)
                    <p class="text-xl text-gray-200 font-medium mb-10 leading-relaxed border-r-2 border-primary/30 pr-6">
                        {{ $post->excerpt }}
                    </p>
                @endif

                @if($post->content)
                    {!! $post->content !!}
                @else
                    <p class="text-gray-300 text-lg leading-8 mb-6">المحتوى غير متاح حالياً.</p>
                @endif
            </article>

            <div class="mt-20 pt-10 border-t border-white/10 flex flex-col md:flex-row justify-between gap-8">
                @if($prevPost)
                    <a class="flex-1 group flex items-center gap-4 p-4 rounded-xl bg-zinc-dark hover:bg-zinc-800 transition-all border border-white/5" href="{{ route('blog.show', $prevPost->slug) }}">
                        <div class="w-20 h-20 rounded-lg overflow-hidden shrink-0">
                            @if($prevPost->featured_image_url)
                                <img alt="{{ $prevPost->title }}" class="w-full h-full object-cover" src="{{ $prevPost->featured_image_url }}"/>
                            @else
                                <div class="w-full h-full bg-zinc-800 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-2xl text-gray-600">image</span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <span class="text-primary text-[10px] font-bold block mb-1">المقال السابق</span>
                            <h4 class="text-white text-sm font-bold group-hover:text-primary transition-colors">{{ $prevPost->title }}</h4>
                        </div>
                    </a>
                @else
                    <div class="flex-1"></div>
                @endif

                @if($nextPost)
                    <a class="flex-1 group flex items-center justify-end gap-4 p-4 rounded-xl bg-zinc-dark hover:bg-zinc-800 transition-all border border-white/5 text-left" href="{{ route('blog.show', $nextPost->slug) }}">
                        <div class="text-right">
                            <span class="text-primary text-[10px] font-bold block mb-1">المقال التالي</span>
                            <h4 class="text-white text-sm font-bold group-hover:text-primary transition-colors">{{ $nextPost->title }}</h4>
                        </div>
                        <div class="w-20 h-20 rounded-lg overflow-hidden shrink-0">
                            @if($nextPost->featured_image_url)
                                <img alt="{{ $nextPost->title }}" class="w-full h-full object-cover" src="{{ $nextPost->featured_image_url }}"/>
                            @else
                                <div class="w-full h-full bg-zinc-800 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-2xl text-gray-600">image</span>
                                </div>
                            @endif
                        </div>
                    </a>
                @else
                    <div class="flex-1"></div>
                @endif
            </div>

            @php
                $approvedComments = $post->approvedComments()->orderBy('created_at', 'desc')->get();
            @endphp

            @if($approvedComments->count() > 0)
                <section class="mt-20">
                    <h3 class="text-2xl font-bold text-white mb-8 font-almarai">التعليقات ({{ $approvedComments->count() }})</h3>
                    <div class="space-y-6">
                        @foreach($approvedComments as $comment)
                            <div class="bg-zinc-dark p-6 rounded-2xl border border-white/5">
                                <div class="flex items-start justify-between mb-4">
                                    <div>
                                        <h4 class="text-white font-bold mb-1">{{ $comment->name }}</h4>
                                        <p class="text-gray-500 text-xs">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                <p class="text-gray-300 leading-relaxed">{{ $comment->message }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <section class="mt-20">
                <h3 class="text-2xl font-bold text-white mb-8 font-almarai">اترك تعليقاً</h3>
                @if(session('comment_success'))
                    <div class="bg-primary/20 border border-primary/30 text-primary px-6 py-4 rounded-lg mb-6">
                        {{ session('comment_success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="bg-red-500/20 border border-red-500/30 text-red-400 px-6 py-4 rounded-lg mb-6">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="space-y-6 bg-zinc-dark p-8 rounded-2xl border border-white/5" action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_post_id" value="{{ $post->id }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm text-gray-400 mr-2">الاسم بالكامل</label>
                            <input name="name" value="{{ old('name') }}" class="w-full bg-bg-main border-white/10 rounded-lg focus:ring-primary focus:border-primary text-white px-4 py-3 @error('name') border-red-500 @enderror" placeholder="مثال: أحمد محمد" type="text" required/>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm text-gray-400 mr-2">البريد الإلكتروني</label>
                            <input name="email" value="{{ old('email') }}" class="w-full bg-bg-main border-white/10 rounded-lg focus:ring-primary focus:border-primary text-white px-4 py-3 @error('email') border-red-500 @enderror" placeholder="your@email.com" type="email" required/>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm text-gray-400 mr-2">التعليق</label>
                        <textarea name="message" class="w-full bg-bg-main border-white/10 rounded-lg focus:ring-primary focus:border-primary text-white px-4 py-3 @error('message') border-red-500 @enderror" placeholder="اكتب رأيك هنا..." rows="5" required>{{ old('message') }}</textarea>
                    </div>
                    <button class="bg-primary text-zinc-dark px-10 py-3 font-bold hover:bg-white transition-colors rounded-sm" type="submit">إرسال التعليق</button>
                </form>
            </section>
        </div>

        <aside class="w-full lg:w-1/3 space-y-10">
            <div class="bg-zinc-dark p-8 rounded-2xl border border-white/5 text-center">
                <div class="w-24 h-24 mx-auto mb-4 rounded-full border-2 border-primary p-1">
                    <div class="w-full h-full bg-primary/20 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-4xl text-primary">person</span>
                    </div>
                </div>
                <h4 class="text-white text-lg font-bold font-almarai mb-1">فريق بلقيس</h4>
                <p class="text-primary text-xs font-medium mb-4 uppercase tracking-wider">خبراء الاستثمار</p>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">فريق من الخبراء المتخصصين في السوق العقاري التركي وإدارة المحافظ الاستثمارية.</p>
                <div class="flex justify-center gap-4">
                    @if($homePage && $homePage->footer_linkedin_url)
                        <a class="text-gray-500 hover:text-primary transition-colors" href="{{ $homePage->footer_linkedin_url }}" target="_blank" rel="noopener noreferrer">
                            <span class="material-symbols-outlined">alternate_email</span>
                        </a>
                    @endif
                    <a class="text-gray-500 hover:text-primary transition-colors" href="{{ route('blog.index') }}">
                        <span class="material-symbols-outlined">share</span>
                    </a>
                </div>
            </div>

            <div class="bg-zinc-dark p-8 rounded-2xl border border-white/5">
                <h4 class="text-white text-sm font-bold mb-6 font-almarai border-r-4 border-primary pr-3">مشاركة المقال</h4>
                <div class="flex gap-4">
                    <button onclick="shareOnTwitter()" class="flex-1 bg-primary/10 border border-primary/20 text-primary py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-primary hover:text-zinc-dark transition-all">
                        <span class="material-symbols-outlined text-xl">share</span>
                        <span class="text-xs font-bold uppercase tracking-widest">Twitter</span>
                    </button>
                    <button onclick="shareOnLinkedIn()" class="flex-1 bg-primary/10 border border-primary/20 text-primary py-3 rounded-lg flex items-center justify-center gap-2 hover:bg-primary hover:text-zinc-dark transition-all">
                        <span class="material-symbols-outlined text-xl">link</span>
                        <span class="text-xs font-bold uppercase tracking-widest">LinkedIn</span>
                    </button>
                </div>
            </div>

            @if($relatedPosts->count() > 0)
                <div class="bg-zinc-dark p-8 rounded-2xl border border-white/5">
                    <h4 class="text-white text-sm font-bold mb-8 font-almarai border-r-4 border-primary pr-3">مقالات رائجة</h4>
                    <div class="space-y-6">
                        @foreach($relatedPosts as $index => $relatedPost)
                            <a class="group flex gap-4" href="{{ route('blog.show', $relatedPost->slug) }}">
                                <span class="text-2xl font-black text-white/10 group-hover:text-primary/30 transition-colors">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <div>
                                    <h5 class="text-white text-sm font-bold mb-1 leading-snug group-hover:text-primary transition-colors">{{ $relatedPost->title }}</h5>
                                    @php
                                        $relatedWordCount = str_word_count(strip_tags($relatedPost->content ?? ''));
                                        $relatedReadingTime = max(1, ceil($relatedWordCount / 200));
                                    @endphp
                                    <span class="text-gray-500 text-[10px]">{{ $relatedReadingTime }} دقائق قراءة</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="relative bg-primary p-8 rounded-2xl overflow-hidden">
                <div class="absolute -top-12 -right-12 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                <h3 class="text-zinc-dark text-xl font-bold mb-3 font-almarai relative z-10">النشرة الحصرية</h3>
                <p class="text-zinc-dark/80 text-sm mb-6 relative z-10">اشترك لتصلك تحليلات السوق مباشرة إلى بريدك.</p>
                <div class="space-y-3 relative z-10">
                    @if(session('newsletter_success'))
                        <div class="bg-white/20 text-zinc-dark px-4 py-3 rounded text-sm font-medium mb-3">
                            {{ session('newsletter_success') }}
                        </div>
                    @endif
                    @if($errors->has('email') || $errors->has('newsletter'))
                        <div class="bg-red-500/20 text-red-900 px-4 py-3 rounded text-sm font-medium mb-3">
                            {{ $errors->first('email') ?: $errors->first('newsletter') }}
                        </div>
                    @endif
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-3">
                        @csrf
                        <input name="email" value="{{ old('email') }}" class="w-full bg-white/20 border-transparent placeholder-zinc-dark/60 text-zinc-dark text-sm px-4 py-3 rounded focus:ring-zinc-dark/40 @error('email') border-red-500 @enderror" placeholder="بريدك الإلكتروني" type="email" required/>
                        <button type="submit" class="w-full bg-zinc-dark text-white py-3 font-bold text-sm hover:bg-black transition-colors">اشترك الآن</button>
                    </form>
                </div>
            </div>
        </aside>
    </div>
</main>
@endsection

@push('scripts')
<script>
    function shareOnTwitter() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent('{{ $post->title }}');
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
    }

    function shareOnLinkedIn() {
        const url = encodeURIComponent(window.location.href);
        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank', 'width=600,height=400');
    }
</script>
@endpush

