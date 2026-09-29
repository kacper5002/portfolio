/* Editor registration for the existing PHP blocks; frontend behavior is unchanged. */
(() => {
    const el = wp.element.createElement;
    const ServerSideRender = wp.serverSideRender;
    const definitions = {
        'site-navigation': {
            title: 'Portfolio Navigation', icon: 'menu',
            description: 'Die Links folgen den Seiten und ihren Polylang-Übersetzungen. Seitentitel unter Seiten bearbeiten.',
        },
        'project-details': {
            title: 'Projektdetails', icon: 'info-outline',
            description: 'Jahr, Technologien und Links werden aus dem aktuellen Projekt geladen. Diese Daten im Projekt bearbeiten.',
        },
    };
    Object.entries(definitions).forEach(([key, definition]) => {
        const name = `kacper-portfolio/${key}`;
        wp.blocks.registerBlockType(name, {
            apiVersion: 3, title: definition.title, icon: definition.icon, category: 'widgets',
            supports: { html: false }, usesContext: ['postId', 'postType'],
            edit({ attributes, context }) {
                return el('div', wp.blockEditor.useBlockProps({ className: 'portfolio-dynamic-editor' }),
                    el('strong', null, definition.title),
                    el('p', null, definition.description),
                    el(wp.components.Disabled, null,
                        el(ServerSideRender, {
                            block: name, attributes,
                            urlQueryArgs: context.postId ? { post_id: context.postId } : {},
                            EmptyResponsePlaceholder: () => el('p', null, 'Die Vorschau erscheint, sobald passende Inhalte vorhanden sind.'),
                        })
                    )
                );
            },
            save: () => null,
        });
    });
})();
