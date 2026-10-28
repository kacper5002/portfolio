(() => {
    const root = document.querySelector('.portfolio-hub');
    if (!root) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');
    const pointer = matchMedia('(hover: hover) and (pointer: fine) and (min-width: 1100px)');
    const cards = [...root.querySelectorAll('[data-hub-card]')];
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
    let frame = 0;
    const reset = () => {
        cancelAnimationFrame(frame);
        cards.forEach(card => ['--rx', '--ry', '--dx', '--dy', '--image-x', '--image-y', '--light-x', '--light-y'].forEach(key => card.style.removeProperty(key)));
    };
    root.addEventListener('pointermove', event => {
        if (reduced.matches || !pointer.matches || event.pointerType === 'touch') return;
        cancelAnimationFrame(frame);
        frame = requestAnimationFrame(() => {
            const stage = root.getBoundingClientRect();
            const x = (event.clientX - stage.left) / stage.width - .5;
            const y = (event.clientY - stage.top) / stage.height - .5;
            cards.forEach((card, index) => {
                const bounds = card.parentElement.getBoundingClientRect();
                const hovered = card.contains(event.target);
                const cx = Math.max(-.5, Math.min(.5, (event.clientX - bounds.left) / bounds.width - .5));
                const cy = Math.max(-.5, Math.min(.5, (event.clientY - bounds.top) / bounds.height - .5));
                card.style.setProperty('--ry', hovered ? `${cx * 7}deg` : '0deg');
                card.style.setProperty('--rx', hovered ? `${-cy * 7}deg` : '0deg');
                card.style.setProperty('--image-x', hovered ? `${-cx * 10}px` : '0px');
                card.style.setProperty('--image-y', hovered ? `${-cy * 10}px` : '0px');
                card.style.setProperty('--light-x', `${(cx + .5) * 100}%`);
                card.style.setProperty('--light-y', `${(cy + .5) * 100}%`);
                card.style.setProperty('--dx', `${x * (4 + index)}px`);
                card.style.setProperty('--dy', `${y * (4 + index)}px`);
            });
        });
    });
    root.addEventListener('pointerleave', reset);
    reduced.addEventListener('change', reset);
    pointer.addEventListener('change', reset);
    window.addEventListener('pageshow', reset);

})();
