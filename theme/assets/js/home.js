(() => {
    const root = document.querySelector('.portfolio-hub');
    if (!root) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    // Reveal once when visible, including cards below the fold on phones.
    if ('IntersectionObserver' in window && !reduced.matches) {
        const slots = [...root.querySelectorAll('.hub-slot')];
        const reveal = slot => {
            slot.classList.remove('is-pending');
            observer.unobserve(slot);
        };
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => { if (entry.isIntersecting) reveal(entry.target); });
        }, { threshold: .08 });
        slots.forEach(slot => { slot.classList.add('is-pending'); observer.observe(slot); });
        root.addEventListener('focusin', event => {
            const slot = event.target.closest('.hub-slot');
            if (slot) reveal(slot);
        });
        const revealAll = () => { slots.forEach(reveal); observer.disconnect(); };
        reduced.addEventListener('change', () => { if (reduced.matches) revealAll(); });
        window.addEventListener('pageshow', event => { if (event.persisted) revealAll(); });
    }
})();
