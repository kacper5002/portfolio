/* Cross-document View Transitions: normal anchors, URLs and browser history. */
(() => {
    if (!('onpageswap' in window) || !('onpagereveal' in window)) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    const clean = () => document.querySelectorAll('[data-hub-transition]').forEach(element => {
        element.style.removeProperty('view-transition-name');
        element.style.removeProperty('transform');
        delete element.dataset.hubTransition;
    });
    function pair(url) {
        if (!url) return null;
        const path = new URL(url, location.href).pathname;
        if (document.body.classList.contains('home')) {
            return [...document.querySelectorAll('[data-hub-card]')].find(card => new URL(card.href).pathname === path);
        }
        // Only a destination entered from a language homepage shares the card snapshot.
        if (window.portfolioHubNavigation?.homeUrls.some(home => new URL(home).pathname === path)) return document.querySelector('main');
        return null;
    }
    function prepare(event, url) {
        if (!event.viewTransition) return;
        clean();
        if (reduced.matches) { event.viewTransition.skipTransition(); return; }
        const target = pair(url);
        if (!target) { event.viewTransition.skipTransition(); return; }
        target.dataset.hubTransition = '';
        target.style.viewTransitionName = 'hub-page';
        if (target.matches('[data-hub-card]')) target.style.transform = 'none';
        event.viewTransition.finished.finally(clean).catch(() => {});
    }
    window.addEventListener('pageswap', event => prepare(event, event.activation?.entry?.url));
    window.addEventListener('pagereveal', event => prepare(event, window.navigation?.activation?.from?.url));
    window.addEventListener('pageshow', clean);
})();
