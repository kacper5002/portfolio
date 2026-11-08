/* Previews for dynamic blocks used in the native project templates. */
(() => {
    const el = wp.element.createElement;
    const titles = {
        'project-card': 'Projektkarte',
        'project-contact': 'Kontakt aufnehmen',
        'project-back': 'Zurück zu den Projekten',
    };
    Object.entries(titles).forEach(([key, title]) => {
        const name = `kacper-portfolio/${key}`;
        wp.blocks.registerBlockType(name, {
            apiVersion: 3, title, category: 'theme', icon: 'portfolio',
            supports: { html: false }, usesContext: ['postId', 'postType'],
            edit({ attributes, context }) {
                return el('div', wp.blockEditor.useBlockProps(),
                    el(wp.components.Disabled, null, el(wp.serverSideRender, {
                        block: name, attributes,
                        urlQueryArgs: context.postId ? { post_id: context.postId } : {},
                        EmptyResponsePlaceholder: () => el('p', null, title),
                    })));
            },
            save: () => null,
        });
    });
})();
