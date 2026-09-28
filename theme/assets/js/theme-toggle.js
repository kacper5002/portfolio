(() => {
    const root = document.documentElement;
    const buttons = document.querySelectorAll('[data-theme-toggle]');
    const preference = window.matchMedia('(prefers-color-scheme: dark)');
    let manual = false;

    try {
        manual = ['light', 'dark'].includes(localStorage.getItem('portfolio-theme'));
    } catch (error) {}

    function apply(theme) {
        root.dataset.theme = theme;
        buttons.forEach((button) => {
            const label = theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode';
            button.setAttribute('aria-label', label);
            button.title = label;
            button.hidden = false;
        });
    }

    apply(root.dataset.theme === 'dark' ? 'dark' : 'light');

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
            manual = true;
            apply(theme);
            try { localStorage.setItem('portfolio-theme', theme); } catch (error) {}
        });
    });

    preference.addEventListener('change', (event) => {
        if (!manual) apply(event.matches ? 'dark' : 'light');
    });

    window.addEventListener('storage', (event) => {
        if (event.key !== 'portfolio-theme' && event.key !== null) return;
        manual = ['light', 'dark'].includes(event.newValue);
        apply(manual ? event.newValue : (preference.matches ? 'dark' : 'light'));
    });
})();
