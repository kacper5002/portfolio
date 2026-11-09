/* Animate the indicator after normal navigation; filtering still works without JS. */
(() => {
    const nav = document.querySelector('.projects-filters');
    if (!nav) return;

    const links = [...nav.querySelectorAll('a')];
    const active = links.findIndex(link => link.getAttribute('aria-current') === 'page');
    const key = 'portfolio-project-filter-slide';
    const reducedMotion = matchMedia('(prefers-reduced-motion: reduce)');
    let previous;
    try {
        previous = JSON.parse(sessionStorage.getItem(key));
        sessionStorage.removeItem(key);
    } catch { /* Navigation and the active label do not depend on storage. */ }

    if (!reducedMotion.matches && previous && Number.isInteger(previous.from)
        && previous.from >= 0 && previous.from < links.length && active >= 0
        && previous.to === location.href && Date.now() - previous.time < 10000) {
        nav.style.setProperty('--filter-index', previous.from);
        nav.querySelector('.projects-filters__indicator').getBoundingClientRect();
        requestAnimationFrame(() => {
            nav.classList.add('is-sliding');
            nav.style.setProperty('--filter-index', active);
        });
    }

    nav.addEventListener('click', event => {
        const link = event.target.closest('a');
        if (!links.includes(link) || event.defaultPrevented || event.button !== 0
            || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey
            || link.href === location.href || reducedMotion.matches) return;
        try {
            sessionStorage.setItem(key, JSON.stringify({ from: active, to: link.href, time: Date.now() }));
        } catch { /* Keep the browser's regular link behavior. */ }
    });
})();
