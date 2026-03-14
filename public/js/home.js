tailwind.config = {
    theme: {
        extend: {
            colors: {
                cream:      '#FAF6F1',
                charcoal:   '#1e1e1e',
                rouge:      '#d94f4f',
                blush:      '#E8C9B8',
                sand:       '#C9B49A',
                'warm-white': '#FDFAF7',
            },
            fontFamily: {
                raleway:   ['Raleway', 'sans-serif'],
                cormorant: ['"Cormorant Garamond"', 'serif'],
            },
            letterSpacing: {
                'ultra': '0.35em',
                'wide-2': '0.25em',
                'wide-3': '0.3em',
                'wide-4': '0.22em',
                'wide-5': '0.2em',
                'wide-6': '0.15em',
            },
        }
    }
};

$(function () {
    const totalSlides = 2;
    let progressRAF;

    // Desktop nav dropdown hover (all pages)
    const navItems = document.querySelectorAll('.nav-item .nav-dropdown');
    navItems.forEach(dropdown => {
        const parent = dropdown.closest('.nav-item');
        if (!parent) return;
        parent.addEventListener('mouseenter', () => {
            parent.classList.add('open');
        });
        parent.addEventListener('mouseleave', () => {
            parent.classList.remove('open');
        });
    });

    const owl = $('.hero-owl').owlCarousel({
        loop: true, items: 1,
        autoplay: true, autoplayTimeout: 4500, autoplayHoverPause: true,
        smartSpeed: 1000, animateOut: 'fadeOut', animateIn: 'fadeIn',
        nav: false, dots: false
    });

    function startProgress(duration) {
        let start = null;
        const bar = document.getElementById('slideProgress');
        if (!bar) return;
        bar.style.width = '0%';
        cancelAnimationFrame(progressRAF);
        function tick(ts) {
            if (!start) start = ts;
            const pct = Math.min(((ts - start) / duration) * 100, 100);
            bar.style.width = pct + '%';
            if (pct < 100) progressRAF = requestAnimationFrame(tick);
        }
        progressRAF = requestAnimationFrame(tick);
    }

    owl.on('changed.owl.carousel', function(e) {
        const counter = document.getElementById('slideCounter');
        if (counter) {
            const idx = ((e.item.index - 1) % totalSlides) + 1;
            counter.textContent = String(idx).padStart(2,'0') + ' / 0' + totalSlides;
        }
        startProgress(4500);
    });

    startProgress(4500);
    $('#prevSlide').click(() => owl.trigger('prev.owl.carousel'));
    $('#nextSlide').click(() => owl.trigger('next.owl.carousel'));

    $('#menuToggle').click(() => $('#mobileMenu').slideToggle(280));

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale')
        .forEach(el => observer.observe(el));

    const footerObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('footer-visible'), i * 100);
                footerObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.footer-section').forEach(el => footerObserver.observe(el));
    document.querySelectorAll('.footer-divider').forEach(el => footerObserver.observe(el));

    function applyResponsive() {
        const isMd = window.innerWidth >= 768;
        document.querySelectorAll('[data-md-width]').forEach(el => {
            el.style.width = isMd ? el.dataset.mdWidth : '100%';
        });
        const isLg = window.innerWidth >= 1024;
        document.querySelectorAll('[data-lg="true"]').forEach(el => {
            el.style.height = isLg ? '760px' : '500px';
            el.style.flex   = isLg ? '1' : 'none';
        });

        const fg = document.getElementById('footerGrid');
        if (fg) {
            if (window.innerWidth >= 1024) {
                fg.style.gridTemplateColumns = 'repeat(4, 1fr)';
            } else if (window.innerWidth >= 640) {
                fg.style.gridTemplateColumns = 'repeat(2, 1fr)';
            } else {
                fg.style.gridTemplateColumns = '1fr';
            }
        }
    }
    applyResponsive();
    window.addEventListener('resize', applyResponsive);

    window.addEventListener('scroll', () => {
        const btn = document.getElementById('backToTop');
        if (!btn) return;
        btn.style.display = window.scrollY > 400 ? 'block' : 'none';
    });

    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                cardObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('#panel-new .product-card-wrap').forEach(el => cardObserver.observe(el));

    const headingObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                headingObs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    document.querySelectorAll('.heading-wrap').forEach(el => headingObs.observe(el));

    const initialPanel = document.querySelector('.tab-panel.active');
    if (initialPanel) {
        requestAnimationFrame(() => requestAnimationFrame(() => initialPanel.classList.add('fade-in')));
    }
});

function switchProductTab(tab) {
    document.querySelectorAll('.tab-trigger').forEach(function(btn) {
        btn.classList.remove('active');
    });
    const activeBtn = document.getElementById('ptab-' + tab);
    if (activeBtn) {
        activeBtn.classList.add('active');
    }

    const current = document.querySelector('.tab-panel.active');

    if (current && current.id !== 'panel-' + tab) {
        current.classList.remove('fade-in');

        setTimeout(function() {
            current.classList.remove('active');
            showPanel(tab);
        }, 220);

    } else if (!current) {
        showPanel(tab);
    }
}

function showPanel(tab) {
    var panel = document.getElementById('panel-' + tab);
    if (!panel) return;

    panel.classList.add('active');

    requestAnimationFrame(function() {
        requestAnimationFrame(function() {
            panel.classList.add('fade-in');

            panel.querySelectorAll('.product-card-wrap').forEach(function(card, i) {
                card.classList.remove('visible');
                card.style.transitionDelay = (i * 60) + 'ms';
                setTimeout(function() {
                    card.classList.add('visible');
                }, 40 + i * 60);
            });
        });
    });
}

function toggleWish(btn) {
    btn.classList.toggle('wishlisted');
    const icon = btn.querySelector('i');
    if (!icon) return;
    if (btn.classList.contains('wishlisted')) {
        icon.classList.remove('fa-regular'); icon.classList.add('fa-solid');
        icon.style.color = 'var(--rouge)';
    } else {
        icon.classList.remove('fa-solid'); icon.classList.add('fa-regular');
        icon.style.color = '';
    }
}

function handleSubscribe(btn) {
    const msg = document.getElementById('subMsg');
    if (!msg) return;
    msg.style.display = 'block';
    btn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
    btn.style.background = '#C9B49A';
    setTimeout(() => {
        msg.style.display = 'none';
        btn.innerHTML = 'Subscribe &nbsp;<i class="fas fa-arrow-right"></i>';
        btn.style.background = '#d94f4f';
    }, 3500);
}

