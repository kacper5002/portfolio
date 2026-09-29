/* Native Gutenberg controls; content belongs to each translated homepage. */
(() => {
    const el = wp.element.createElement;
    const { useBlockProps, MediaUpload, MediaUploadCheck } = wp.blockEditor;
    const { TextControl, Button, Disabled } = wp.components;
    const fields = {
        greetingText: 'Begrüßung (leer = Standardtext der Sprache)',
        aboutText: 'Über mich: Kurzbeschreibung',
        projectsTitle: 'Projekte: Kartentitel',
        projectsText: 'Projekte: Kurzbeschreibung',
        contactText: 'Kontakt: Kurzbeschreibung',
    };
    const images = {
        portraitId: 'Über mich: Foto', projectsImageId: 'Projekte: Bild',
        contactImageId: 'Kontakt: Bild',
    };
    // Preserve previously saved Resume values without exposing an unused card.
    const attributes = {
        resumeText: { type: 'string', default: '' },
        resumeImageId: { type: 'integer', default: 0 },
    };
    Object.keys(images).forEach(key => attributes[key] = { type: 'integer', default: 0 });
    Object.keys(fields).forEach(key => attributes[key] = { type: 'string', default: '' });
    wp.blocks.registerBlockType('kacper-portfolio/home-hub', {
        apiVersion: 3, title: 'Portfolio Startseite', icon: 'layout', category: 'design', attributes,
        supports: { html: false, multiple: false }, usesContext: ['postId', 'postType'],
        edit({ attributes, setAttributes, context }) {
            const [showPreview, setShowPreview] = wp.element.useState(true);
            return el('div', useBlockProps({ className: 'portfolio-hub-editor' }),
                el('h2', null, 'Portfolio Startseite'),
                el('p', null, 'Hier Begrüßung, Beschreibungen und Bilder der drei Karten bearbeiten. Die Titel von Über mich und Kontakt folgen den verknüpften Seiten. Jede Sprache hat eigene Inhalte.'),
                ...Object.entries(fields).map(([key, label]) => el(TextControl, {
                    key, label, value: attributes[key], onChange: value => setAttributes({ [key]: value }),
                })),
                el('div', { className: 'portfolio-hub-editor__images' },
                    ...Object.entries(images).map(([key, label]) => el('div', { key },
                        el(MediaUploadCheck, null, el(MediaUpload, {
                            allowedTypes: ['image'], value: attributes[key],
                            onSelect: media => setAttributes({ [key]: media.id }),
                            render: ({ open }) => el(Button, { variant: 'secondary', onClick: open }, label),
                        })),
                        key !== 'portraitId' && attributes[key] ? el(Button, {
                            variant: 'tertiary', onClick: () => setAttributes({ [key]: 0 }),
                        }, 'Standardbild verwenden') : null
                    ))
                ),
                el(Button, { variant: 'secondary', onClick: () => setShowPreview(!showPreview), 'aria-expanded': showPreview },
                    showPreview ? 'Vorschau ausblenden' : 'Vorschau anzeigen'),
                showPreview ? el(Disabled, null, el(wp.serverSideRender, {
                    block: 'kacper-portfolio/home-hub', attributes,
                    urlQueryArgs: context.postId ? { post_id: context.postId } : {},
                })) : null
            );
        },
        save: () => null,
    });
})();
