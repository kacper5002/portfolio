(() => {
    // Progressive enhancement: keep the original links and switcher untouched.
    const nav = document.querySelector('.portfolio-navigation');
    const menu = nav?.querySelector('.portfolio-navigation__menu');
    if (!menu) return;
    const bar = nav.closest('header')?.querySelector('.portfolio-header__bar');
    const button = nav.querySelector('.hub-menu-button');
    if (!bar || !button || nav.dataset.menuReady) return;
    nav.dataset.menuReady = 'true';
    [...menu.children].forEach((item, index) => item.style.setProperty('--menu-index', index));
    function setOpen(open) {
        menu.inert = !open;
        menu.setAttribute('aria-hidden', String(!open));
        bar.classList.toggle('is-menu-open', open);
        button.setAttribute('aria-expanded', String(open));
        button.setAttribute('aria-label', open ? button.dataset.labelClose : button.dataset.labelOpen);
    }
    setOpen(false);
    button.addEventListener('click', () => setOpen(button.getAttribute('aria-expanded') !== 'true'));
    document.addEventListener('click', event => { if (!nav.contains(event.target)) setOpen(false); });
    nav.addEventListener('keydown', event => {
        if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') { setOpen(false); button.focus(); }
    });
    nav.addEventListener('focusout', event => { if (!nav.contains(event.relatedTarget)) setOpen(false); });
    // Initial pageshow can arrive late while images load. Never close a menu the user just opened.
    window.addEventListener('pageshow', event => { if (event.persisted) setOpen(false); });
})();
