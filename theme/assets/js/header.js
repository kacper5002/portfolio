(() => {
    // Progressive enhancement: keep the original links and switcher untouched.
    const nav = document.querySelector('.portfolio-navigation');
    const menu = nav?.querySelector('.portfolio-navigation__menu');
    if (!menu) return;
    const bar = nav.closest('header').querySelector('.portfolio-header__bar');
    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'hub-menu-button';
    button.textContent = 'Menu';
    const symbol = document.createElement('span');
    symbol.textContent = '+';
    symbol.setAttribute('aria-hidden', 'true');
    button.append(symbol);
    menu.id = 'hub-primary-menu';
    button.setAttribute('aria-controls', menu.id);
    function setOpen(open) {
        menu.inert = !open;
        menu.setAttribute('aria-hidden', String(!open));
        bar.classList.toggle('is-menu-open', open);
        button.setAttribute('aria-expanded', String(open));
    }
    bar.classList.add('hub-header-enhanced');
    setOpen(false);
    nav.classList.add('hub-menu-enhanced');
    nav.prepend(button);
    button.addEventListener('click', () => setOpen(button.getAttribute('aria-expanded') !== 'true'));
    document.addEventListener('click', event => { if (!nav.contains(event.target)) setOpen(false); });
    nav.addEventListener('keydown', event => {
        if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') { setOpen(false); button.focus(); }
    });
    nav.addEventListener('focusout', event => { if (!nav.contains(event.relatedTarget)) setOpen(false); });
    window.addEventListener('pageshow', () => setOpen(false));
})();
