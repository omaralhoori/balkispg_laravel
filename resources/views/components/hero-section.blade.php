<section class="hero-section flex-grow flex items-center relative min-h-screen pt-20">
    <!-- Background Image -->
    <div class="hero-background absolute inset-0 z-0 bg-cover bg-center transition-all duration-700 ease-in-out" 
         data-alt="Panaromic view of Istanbul skyline at sunset" 
         style="background-image: linear-gradient(rgba(32, 29, 18, 0.7), rgba(32, 29, 18, 0.8)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuDgY6giqkj21tUvclk3yFwACm-TA3MpuiAmhESMAAJH30FG5E4lt2_XTywcqzvo_tHIfTmiA9hjqoMbJe96DTcRbx07K9FiJVUTN6gWYKdvrICMQGbdOZRqq6JE4lG8olMYHgocw45mNjTi4geQCEsHg1YKHdiaEdWZDKs9I_MkCqBnAMRFfDK013HRnHSCcnlUknLqOP0_mkrOjfvmq6hKdsaJtL205T0fFp44s8SqQPysOWE2-gtWdJ5s0_C7mMn83RH_WPbkPkj7');">
    </div>
    
    <div class="relative z-10 container mx-auto px-6 lg:px-20 py-12 flex flex-col lg:flex-row items-center gap-12 h-full">
        <!-- Content Side -->
        <div class="hero-content-wrapper flex-1 flex flex-col gap-8 text-right items-start transition-all duration-500 ease-in-out">
            <div class="inline-flex items-center gap-2 rounded-full bg-primary/10 px-4 py-2 border border-primary/20 backdrop-blur-md">
                <span class="hero-badge-icon material-symbols-outlined text-primary text-sm">stars</span>
                <span class="hero-badge-text text-primary text-xs font-bold uppercase tracking-wide">التميز والفخامة</span>
            </div>
            <h1 class="text-4xl lg:text-6xl font-black text-white leading-[1.2]">
                <span class="hero-title-main text-primary block mb-2">مجموعة بلقيس</span>
                <span class="hero-subtitle">للاستثمارات الفاخرة</span>
            </h1>
            <p class="hero-description text-gray-300 text-lg leading-relaxed max-w-xl">
                اكتشف قمة السياحة الفاخرة في تركيا، والعقارات المتميزة، والاستثمارات الاستراتيجية. نحن نصنع تجارب لا تُنسى ومستقبلاً واعداً.
            </p>
            <div class="flex gap-4 mt-4">
                <button class="flex items-center justify-center gap-2 h-12 px-8 rounded-lg bg-primary text-[#201d13] font-bold hover:bg-white hover:text-[#201d13] transition-all duration-300 shadow-[0_0_20px_rgba(212,175,53,0.3)]">
                    <span>استكشف خدماتنا</span>
                    <span class="material-symbols-outlined text-xl flip-rtl">arrow_right_alt</span>
                </button>
                <button class="flex items-center justify-center gap-2 h-12 px-8 rounded-lg border border-white/20 bg-white/5 text-white font-medium hover:bg-white/10 transition-all backdrop-blur-sm">
                    <span class="material-symbols-outlined text-xl">play_circle</span>
                    <span>شاهد الفيديو</span>
                </button>
            </div>
            <div class="hero-stats mt-8 flex items-center gap-8 border-t border-white/10 pt-6 w-full max-w-md">
                <div class="stat-item">
                    <p class="stat-value text-2xl font-bold text-white">١٥+</p>
                    <p class="stat-label text-xs text-gray-400">سنة خبرة</p>
                </div>
                <div class="stat-item">
                    <p class="stat-value text-2xl font-bold text-white">٥٠٠+</p>
                    <p class="stat-label text-xs text-gray-400">مشروع ناجح</p>
                </div>
                <div class="stat-item">
                    <p class="stat-value text-2xl font-bold text-white">٢٤/٧</p>
                    <p class="stat-label text-xs text-gray-400">دعم كبار الشخصيات</p>
                </div>
            </div>
        </div>
        
        <!-- Cards Side -->
        <div class="w-full lg:w-1/3 flex flex-row lg:flex-col gap-4 overflow-x-auto lg:overflow-visible pb-4 lg:pb-0 snap-x">
            <!-- Tourism Card -->
            <div class="service-card active group relative shrink-0 w-[280px] lg:w-full h-[180px] rounded-xl overflow-hidden cursor-pointer border-2 border-primary shadow-2xl transition-all duration-500 hover:-translate-y-1 snap-center" data-service-id="tourism">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                     data-alt="Golden horn view in Istanbul with boats" 
                     style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAB9BBRm56rmgNJx_Kcp9tcTfI5S_HLGq8KveH-Lk0zA2tpWj6LJQhlm7YSWc0Fhdgcsj-Pj36vW7lE7pCVj6lw7-7Fwh5OZNFGehnT8gK7FqZX9JmRYiJxYA918pyJiwmHg-Kq2KLZ2XB2iz4Q2Eafk2a48gPix7DDvopx-TaW_uStJ9UKuonftdmqVln2E7eimIj3mR8N3bGP2IGjR1ayBs-R1b-A6Kw2k-4-yIQLD2mwFvluGzyAiyELUieWRxfb5XFp3U-rAx9k');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 flex items-end justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1">السياحة</h3>
                        <p class="text-gray-300 text-sm line-clamp-1">رحلات فاخرة وتجارب فريدة في إسطنبول</p>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center text-[#201d13]">
                        <span class="material-symbols-outlined">flight</span>
                    </div>
                </div>
            </div>
            
            <!-- Real Estate Card -->
            <div class="service-card inactive group relative shrink-0 w-[280px] lg:w-full h-[160px] rounded-xl overflow-hidden cursor-pointer border border-white/10 opacity-70 hover:opacity-100 hover:border-primary/50 transition-all duration-500 snap-center" data-service-id="realestate">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                     data-alt="Modern luxury villa exterior with pool" 
                     style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB3miaPdM6JYX_fl3q7Z3Wmq7JZZlrQZuGVccIRaQo50dH6KRfKV9nWoZs75qvtfbai2u_MThYoTcQL3KtQ55EkSh1Px722tjfAkK_2WxF0AKp8yfm6ybCfLF_wopioskABaFtvfJvqk8fVkwr8JIvh96VFK8kf-xhv1nYqL8Dzs0cRXzUReKKLGkj1OXduSpdpx9ENcw0KxikO-Ie86YEmPZ1Q5mgz6VIbtZuovL_6twd_9tFuoJZehr6N78Lr_R6CMhdCPkxezMXb');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 flex items-end justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-1">العقارات</h3>
                        <p class="text-gray-300 text-xs">فلل وقصور بإطلالات خلابة</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:bg-primary group-hover:text-[#201d13] transition-colors">
                        <span class="material-symbols-outlined text-sm">home_work</span>
                    </div>
                </div>
            </div>
            
            <!-- Investment Card -->
            <div class="service-card inactive group relative shrink-0 w-[280px] lg:w-full h-[160px] rounded-xl overflow-hidden cursor-pointer border border-white/10 opacity-70 hover:opacity-100 hover:border-primary/50 transition-all duration-500 snap-center" data-service-id="investment">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                     data-alt="Glass skyscrapers reflecting sky low angle" 
                     style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCtl35DDI3SX3bvkkkXjd2zi5f5e8aEP_QfcyL9BK_Pa7o1BFTbRdyT58nevQAvwuz_PQb1fm5QcsRyj97l3eT17TwmWESBIRn0IXU20Qxf1cF6iLGR3TeqHW5QEWiyjlyiQC91axRif6jhVOOZhJhcMW3Jv1rsk4LkOmhZIu8ohjtRpwHlV4aeq256VNbIcaWAcdd42pFtvUpML7y012yC43eaCsG-sBqJW3qN78AvAAGmTpVZkzehFdFhnGxmqFW6rEftQG2mensf');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 flex items-end justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-1">الاستثمار</h3>
                        <p class="text-gray-300 text-xs">فرص استثمارية بعوائد عالية</p>
                    </div>
                    <div class="h-8 w-8 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:bg-primary group-hover:text-[#201d13] transition-colors">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom decorative element -->
    <div class="absolute bottom-0 w-full h-24 bg-gradient-to-t from-background-dark to-transparent pointer-events-none"></div>
</section>
