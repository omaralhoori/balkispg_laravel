// Hero Section Interactive Cards
document.addEventListener('DOMContentLoaded', function() {
    const services = {
        tourism: {
            id: 'tourism',
            title: 'مجموعة بلقيس',
            subtitle: 'للسياحة الفاخرة',
            description: 'اكتشف قمة السياحة الفاخرة في تركيا. رحلات حصرية، فنادق فاخرة، وتجارب لا تُنسى في أجمل مدن العالم. نحن نصنع ذكريات تبقى معك مدى الحياة.',
            badge: 'التميز والفخامة',
            badgeIcon: 'stars',
            backgroundImage: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDgY6giqkj21tUvclk3yFwACm-TA3MpuiAmhESMAAJH30FG5E4lt2_XTywcqzvo_tHIfTmiA9hjqoMbJe96DTcRbx07K9FiJVUTN6gWYKdvrICMQGbdOZRqq6JE4lG8olMYHgocw45mNjTi4geQCEsHg1YKHdiaEdWZDKs9I_MkCqBnAMRFfDK013HRnHSCcnlUknLqOP0_mkrOjfvmq6hKdsaJtL205T0fFp44s8SqQPysOWE2-gtWdJ5s0_C7mMn83RH_WPbkPkj7',
            stats: [
                { value: '١٥+', label: 'سنة خبرة' },
                { value: '٥٠٠+', label: 'مشروع ناجح' },
                { value: '٢٤/٧', label: 'دعم كبار الشخصيات' }
            ]
        },
        realestate: {
            id: 'realestate',
            title: 'مجموعة بلقيس',
            subtitle: 'للعقارات الفاخرة',
            description: 'استثمر في عقارات تركيا المتميزة. فلل فاخرة، شقق راقية، وقصور بإطلالات خلابة. نضمن لك أفضل العوائد الاستثمارية مع ضمانات حكومية كاملة.',
            badge: 'الاستثمار الذكي',
            badgeIcon: 'home_work',
            backgroundImage: 'https://lh3.googleusercontent.com/aida-public/AB6AXuB3miaPdM6JYX_fl3q7Z3Wmq7JZZlrQZuGVccIRaQo50dH6KRfKV9nWoZs75qvtfbai2u_MThYoTcQL3KtQ55EkSh1Px722tjfAkK_2WxF0AKp8yfm6ybCfLF_wopioskABaFtvfJvqk8fVkwr8JIvh96VFK8kf-xhv1nYqL8Dzs0cRXzUReKKLGkj1OXduSpdpx9ENcw0KxikO-Ie86YEmPZ1Q5mgz6VIbtZuovL_6twd_9tFuoJZehr6N78Lr_R6CMhdCPkxezMXb',
            stats: [
                { value: '١٠٠٠+', label: 'عقار متاح' },
                { value: '٩٥%', label: 'معدل الرضا' },
                { value: 'ضمان', label: 'حكومي كامل' }
            ]
        },
        investment: {
            id: 'investment',
            title: 'مجموعة بلقيس',
            subtitle: 'للاستثمارات الاستراتيجية',
            description: 'فرص استثمارية حصرية بعوائد عالية ومضمونة. استثمر في قطاعات متعددة مع فريق من الخبراء الماليين والقانونيين لضمان نجاح استثماراتك.',
            badge: 'النمو المستدام',
            badgeIcon: 'trending_up',
            backgroundImage: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCtl35DDI3SX3bvkkkXjd2zi5f5e8aEP_QfcyL9BK_Pa7o1BFTbRdyT58nevQAvwuz_PQb1fm5QcsRyj97l3eT17TwmWESBIRn0IXU20Qxf1cF6iLGR3TeqHW5QEWiyjlyiQC91axRif6jhVOOZhJhcMW3Jv1rsk4LkOmhZIu8ohjtRpwHlV4aeq256VNbIcaWAcdd42pFtvUpML7y012yC43eaCsG-sBqJW3qN78AvAAGmTpVZkzehFdFhnGxmqFW6rEftQG2mensf',
            stats: [
                { value: '٢٠%+', label: 'عائد سنوي' },
                { value: '١٠٠+', label: 'مستثمر راضٍ' },
                { value: 'مضمون', label: 'عوائد آمنة' }
            ]
        }
    };

    // Get DOM elements
    const heroSection = document.querySelector('.hero-section');
    if (!heroSection) return;

    const backgroundDiv = heroSection.querySelector('.hero-background');
    const titleSpan = heroSection.querySelector('.hero-title-main');
    const subtitleSpan = heroSection.querySelector('.hero-subtitle');
    const descriptionP = heroSection.querySelector('.hero-description');
    const badgeSpan = heroSection.querySelector('.hero-badge-text');
    const badgeIcon = heroSection.querySelector('.hero-badge-icon');
    const statsContainer = heroSection.querySelector('.hero-stats');
    const cards = heroSection.querySelectorAll('.service-card');

    let currentService = 'tourism';
    let isTransitioning = false;

    // Function to update hero content
    function updateHeroContent(serviceId) {
        if (isTransitioning || serviceId === currentService) return;
        
        const service = services[serviceId];
        if (!service) return;

        isTransitioning = true;
        currentService = serviceId;

        // Fade out content
        const contentWrapper = heroSection.querySelector('.hero-content-wrapper');
        if (contentWrapper) {
            contentWrapper.style.opacity = '0';
            contentWrapper.style.transform = 'translateY(20px)';
        }

        // Update background with fade effect
        if (backgroundDiv) {
            backgroundDiv.style.opacity = '0';
            
            setTimeout(() => {
                backgroundDiv.style.backgroundImage = `linear-gradient(rgba(32, 29, 18, 0.7), rgba(32, 29, 18, 0.8)), url('${service.backgroundImage}')`;
                backgroundDiv.style.opacity = '1';
            }, 300);
        }

        // Update content after fade out
        setTimeout(() => {
            if (titleSpan) titleSpan.textContent = service.title;
            if (subtitleSpan) subtitleSpan.textContent = service.subtitle;
            if (descriptionP) descriptionP.textContent = service.description;
            if (badgeSpan) badgeSpan.textContent = service.badge;
            if (badgeIcon) badgeIcon.textContent = service.badgeIcon;

            // Update stats
            if (statsContainer) {
                const statElements = statsContainer.querySelectorAll('.stat-item');
                service.stats.forEach((stat, index) => {
                    if (statElements[index]) {
                        const valueEl = statElements[index].querySelector('.stat-value');
                        const labelEl = statElements[index].querySelector('.stat-label');
                        if (valueEl) valueEl.textContent = stat.value;
                        if (labelEl) labelEl.textContent = stat.label;
                    }
                });
            }

            // Fade in new content
            if (contentWrapper) {
                contentWrapper.style.opacity = '1';
                contentWrapper.style.transform = 'translateY(0)';
            }

            isTransitioning = false;
        }, 300);
    }

    // Update card states
    function updateCardStates(activeId) {
        cards.forEach(card => {
            const cardId = card.dataset.serviceId;
            if (cardId === activeId) {
                card.classList.add('active');
                card.classList.remove('inactive');
                // Update height for active card
                if (window.innerWidth >= 1024) {
                    card.style.height = '180px';
                }
            } else {
                card.classList.remove('active');
                card.classList.add('inactive');
                // Update height for inactive card
                if (window.innerWidth >= 1024) {
                    card.style.height = '160px';
                }
            }
        });
    }

    // Add click handlers to cards
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const serviceId = this.dataset.serviceId;
            if (serviceId && !isTransitioning) {
                updateHeroContent(serviceId);
                updateCardStates(serviceId);
            }
        });
    });

    // Initialize
    updateCardStates('tourism');
});
