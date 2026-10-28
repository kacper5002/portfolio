(() => {
    const root = document.querySelector('main .about-story');
    if (!root) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    const download = root.querySelector('.about-download a:not([href])');
    if (download) download.setAttribute('aria-disabled', 'true');
    if (reduced.matches) return;
    root.classList.add('about-motion');
    if (!('IntersectionObserver' in window)) return;
    const elements = [...root.querySelectorAll('.about-section-heading, .about-interest, .about-skill-group, .about-practice__feature, .about-work-row, .about-education-row, .about-language-list, .about-personal__body, .about-cv')];
    const show = element => {
        element.classList.remove('is-pending');
        observer.unobserve(element);
    };
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => { if (entry.isIntersecting) show(entry.target); });
    }, { threshold: 0, rootMargin: '0px 0px -24px 0px' });
    elements.forEach(element => {
        element.classList.add('about-reveal');
        if (element.getBoundingClientRect().top > innerHeight) element.classList.add('is-pending');
        observer.observe(element);
    });
    const showAll = () => {
        elements.forEach(show);
        observer.disconnect();
        root.classList.remove('about-motion');
    };
    root.addEventListener('focusin', event => {
        const element = event.target.closest('.about-reveal');
        if (element) show(element);
    });
    reduced.addEventListener('change', () => { if (reduced.matches) showAll(); });
    window.addEventListener('pageshow', event => { if (event.persisted) showAll(); });
    window.addEventListener('beforeprint', showAll);
})();
