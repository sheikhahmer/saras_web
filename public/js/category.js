tailwind.config = {
    theme: {
        extend: {
            colors: {
                cream:       '#FAF6F1',
                charcoal:    '#1e1e1e',
                rouge:       '#d94f4f',
                blush:       '#E8C9B8',
                sand:        '#C9B49A',
                'warm-white':'#FDFAF7',
            },
            fontFamily: {
                raleway:    ['Raleway', 'sans-serif'],
                cormorant:  ['"Cormorant Garamond"', 'serif'],
            },
            letterSpacing: {
                'ultra':  '0.35em',
                'wide-1': '0.12em',
                'wide-2': '0.18em',
                'wide-3': '0.2em',
                'wide-4': '0.22em',
                'wide-5': '0.25em',
                'wide-6': '0.3em',
                'wide-7': '0.32em',
            },
            fontSize: {
                '2xs':  ['0.52rem', { lineHeight: '1' }],
                '3xs':  ['0.45rem', { lineHeight: '1' }],
                'nav':  ['0.63rem', { lineHeight: '1' }],
                'tag':  ['0.54rem', { lineHeight: '1' }],
                'xs2':  ['0.58rem', { lineHeight: '1' }],
                'xs3':  ['0.6rem',  { lineHeight: '1' }],
                'xs4':  ['0.62rem', { lineHeight: '1' }],
                'xs5':  ['0.65rem', { lineHeight: '1' }],
                'xs6':  ['0.68rem', { lineHeight: '1.5' }],
                'xs7':  ['0.72rem', { lineHeight: '1' }],
            },
            boxShadow: {
                'dropdown': '0 20px 60px rgba(0,0,0,0.10), 0 4px 12px rgba(0,0,0,0.06)',
            },
            gridTemplateColumns: {
                'shop-4': 'repeat(4, 1fr)',
                'shop-3': 'repeat(3, 1fr)',
                'shop-5': 'repeat(5, 1fr)',
                'shop-2': 'repeat(2, 1fr)',
                'dropdown': 'repeat(3, 1fr)',
            },
            maxWidth: {
                'screen-shop': '1400px',
            },
            transitionTimingFunction: {
                'spring': 'cubic-bezier(0.34,1.56,0.64,1)',
                'smooth': 'cubic-bezier(0.4,0,0.2,1)',
            },
            backdropBlur: {
                'nav': '16px',
            },
            height: {
                'nav': '72px',
            },
        }
    }
};

const CATS = typeof window.CATEGORY_DATA !== 'undefined'
    ? window.CATEGORY_DATA
    : [];

let activeCat = 'all';

function animateCards(panelId) {
    const panel = document.getElementById(panelId);
    if (!panel) return;
    panel.querySelectorAll('.product-card').forEach((card, i) => {
        card.classList.remove('visible');
        setTimeout(() => card.classList.add('visible'), 80 + i * 60);
    });
    const hKey = panelId.replace('panel-', '');
    const h = document.getElementById('heading-' + hKey);
    if (h) {
        h.classList.remove('visible');
        setTimeout(() => h.classList.add('visible'), 40);
    }
}

window.addEventListener('load', () => {
    const params = new URLSearchParams(window.location.search);
    const requested = params.get('cat');
    const exists = CATS.find(c => c.key === requested);
    if (requested && exists && requested !== 'all') {
        switchCat(requested);
    } else {
        animateCards('panel-all');
    }
});

function switchCat(key) {
    if (key === activeCat) return;
    document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
    const tab = document.getElementById('ctab-' + key);
    if (tab) {
        tab.classList.add('active');
        tab.scrollIntoView({ behavior:'smooth', inline:'center', block:'nearest' });
    }
    const prev = document.getElementById('panel-' + activeCat);
    if (prev) prev.classList.remove('active');
    const next = document.getElementById('panel-' + key);
    if (next) { next.classList.add('active'); animateCards('panel-' + key); }
    const catData = CATS.find(c => c.key === key);
    const countEl = document.getElementById('countNum');
    if (countEl) countEl.textContent = catData ? catData.count : '—';
    updateChip(key);
    activeCat = key;
    const barWrap = document.getElementById('catBar');
    if (barWrap && barWrap.closest('div')) {
        setTimeout(() => barWrap.closest('div').scrollIntoView({ behavior:'smooth', block:'nearest' }), 60);
    }
}

// expose for inline onclick handlers
window.switchCat = switchCat;
window.sortProducts = sortProducts;
window.setView = setView;
window.toggleWish = toggleWish;
window.handleLoadMore = handleLoadMore;

function updateChip(key) {
    const wrap = document.getElementById('chipsWrap');
    if (!wrap) return;
    wrap.innerHTML = '';
    if (key !== 'all') {
        const cat = CATS.find(c => c.key === key);
        if (!cat) return;
        const chip = document.createElement('div');
        chip.className = 'chip inline-flex items-center gap-[6px] bg-[rgba(217,79,79,0.07)] border border-[rgba(217,79,79,0.18)] px-[11px] py-[5px] text-[0.58rem] font-bold tracking-wide-1 uppercase text-rouge cursor-pointer transition-all duration-[200ms] hover:bg-rouge hover:text-white';
        chip.innerHTML = cat.label + ' <span style="opacity:.6">✕</span>';
        chip.onclick = () => switchCat('all');
        wrap.appendChild(chip);
    }
}

function sortProducts(val) {
    const grid = document.getElementById('grid-' + activeCat);
    if (!grid) return;
    grid.classList.add('filtering');
    setTimeout(() => {
        const cards = Array.from(grid.querySelectorAll('.product-card'));
        cards.sort((a, b) => {
            const pa = parseFloat(a.dataset.price), pb = parseFloat(b.dataset.price);
            const ra = parseFloat(a.dataset.rating), rb = parseFloat(b.dataset.rating);
            if (val === 'price-asc')  return pa - pb;
            if (val === 'price-desc') return pb - pa;
            if (val === 'rating')     return rb - ra;
            return 0;
        });
        cards.forEach(c => grid.appendChild(c));
        grid.classList.remove('filtering');
        animateCards('panel-' + activeCat);
    }, 320);
}

function setView(cls, btn) {
    document.querySelectorAll('.view-btn').forEach(b => {
        b.classList.remove('bg-charcoal','text-white','border-charcoal');
        b.classList.add('bg-white','text-[rgba(30,30,30,0.42)]','border-[rgba(30,30,30,0.13)]');
    });
    btn.classList.add('bg-charcoal','text-white','border-charcoal');
    btn.classList.remove('bg-white','text-[rgba(30,30,30,0.42)]','border-[rgba(30,30,30,0.13)]');
    document.querySelectorAll('.products-grid').forEach(g => {
        g.classList.remove('cols-3','cols-5');
        g.style.gridTemplateColumns = '';
        if (cls === 'cols-3') g.style.gridTemplateColumns = 'repeat(3,1fr)';
        else if (cls === 'cols-5') g.style.gridTemplateColumns = 'repeat(5,1fr)';
        else g.style.gridTemplateColumns = 'repeat(4,1fr)';
    });
    animateCards('panel-' + activeCat);
}

function toggleWish(btn) {
    btn.classList.toggle('on');
    const icon = btn.querySelector('i');
    if (!icon) return;
    icon.className = btn.classList.contains('on') ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
}

function handleLoadMore(btn) {
    btn.innerHTML = '<span><i class="fas fa-spinner fa-spin"></i> Loading…</span>';
    setTimeout(() => { btn.innerHTML = '<span>All Loaded ✓</span>'; btn.style.opacity='0.4'; btn.disabled=true; }, 1200);
}

const revObs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); revObs.unobserve(e.target); } });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => revObs.observe(el));

