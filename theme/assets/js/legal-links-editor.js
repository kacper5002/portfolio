(() => {
    const el = wp.element.createElement;
    wp.blocks.registerBlockType('kacper-portfolio/legal-links', {
        apiVersion: 3, title: 'Impressum / Datenschutz', icon: 'admin-page', category: 'widgets',
        supports: { html: false },
        edit({ attributes }) {
            return el('div', wp.blockEditor.useBlockProps({ className: 'portfolio-dynamic-editor' }),
                el('strong', null, 'Impressum / Datenschutz'),
                el('p', null, 'Links erscheinen nach Veröffentlichung: Impressum mit dem Slug „impressum“ und die unter Einstellungen → Datenschutz gewählte Seite. Übersetzungen folgen Polylang.'),
                el(wp.components.Disabled, null, el(wp.serverSideRender, {
                    block: 'kacper-portfolio/legal-links', attributes,
                    EmptyResponsePlaceholder: () => el('p', null, 'Noch keine rechtlichen Seiten veröffentlicht. Entwürfe unter Seiten vervollständigen.'),
                }))
            );
        },
        save: () => null,
    });
})();
