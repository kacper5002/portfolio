(() => {
    const section = document.querySelector('main .about-skills');
    if (!section) return;
    const viewports = [...section.querySelectorAll('.about-skills__viewport')];
    if (!viewports.length) return;
    const reduced = matchMedia('(prefers-reduced-motion: reduce)');

    const build = () => {
        viewports.forEach(viewport => {
            const track = viewport.querySelector('.about-skills__track');
            const source = track.querySelector('.about-skills__items');
            track.querySelectorAll('[data-skills-copy]').forEach(copy => copy.remove());
            viewport.classList.toggle('is-ready', !reduced.matches);
            if (reduced.matches) return;

            // Icons must be loaded before their off-screen tiles enter a moving row.
            source.querySelectorAll('img').forEach(image => { image.loading = 'eager'; });
            // One repeated sequence is the exact animation distance, including its gap.
            const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
            const distance = source.getBoundingClientRect().width + gap;
            if (!distance) return;
            const copies = Math.max(1, Math.ceil((viewport.clientWidth + gap) / distance));
            for (let i = 0; i < copies; i++) {
                const copy = source.cloneNode(true);
                copy.dataset.skillsCopy = '';
                copy.setAttribute('aria-hidden', 'true');
                copy.removeAttribute('id');
                copy.querySelectorAll('[id]').forEach(element => element.removeAttribute('id'));
                track.append(copy);
            }
            track.style.setProperty('--skills-distance', `${distance}px`);
            track.style.setProperty('--skills-duration', `${distance / 28}s`);
        });
    };

    let frame;
    const refresh = () => {
        cancelAnimationFrame(frame);
        frame = requestAnimationFrame(build);
    };
    build();
    reduced.addEventListener('change', refresh);
    if ('ResizeObserver' in window) {
        const resize = new ResizeObserver(refresh);
        viewports.forEach(viewport => resize.observe(viewport));
    } else {
        window.addEventListener('resize', refresh);
    }
    document.fonts?.ready.then(refresh);
})();
