/* Native block controls; translations belong to each homepage's content. */
(() => {
    const el = wp.element.createElement;
    const { useBlockProps, MediaUpload, MediaUploadCheck } = wp.blockEditor;
    const { TextControl, Button } = wp.components;
    const { __ } = wp.i18n;
    const fields = {
        greetingText: __('Introduction above cards (empty = language default)', 'kacper-portfolio'),
        aboutText: __('About: short description', 'kacper-portfolio'),
        projectsTitle: __('Projects: card title', 'kacper-portfolio'),
        projectsText: __('Projects: short description', 'kacper-portfolio'),
        resumeText: __('Resume: short description', 'kacper-portfolio'),
        contactText: __('Contact: short description', 'kacper-portfolio'),
    };
    const attributes = { portraitId: { type: 'integer', default: 0 } };
    Object.keys(fields).forEach(key => attributes[key] = { type: 'string', default: '' });
    wp.blocks.registerBlockType('kacper-portfolio/home-hub', {
        apiVersion: 3, title: 'Portfolio hub', icon: 'layout', category: 'design', attributes,
        supports: { html: false, multiple: false },
        edit({ attributes, setAttributes }) {
            return el('div', useBlockProps(),
                el('h2', null, 'Portfolio hub'),
                el('p', null, __('Four cards. Page titles and links follow WordPress and Polylang. AI category illustrations are used by default; the project card uses a featured image when available.', 'kacper-portfolio')),
                ...Object.entries(fields).map(([key, label]) => el(TextControl, { key, label, value: attributes[key], onChange: value => setAttributes({ [key]: value }) })),
                el(MediaUploadCheck, null, el(MediaUpload, {
                    allowedTypes: ['image'], value: attributes.portraitId,
                    onSelect: media => setAttributes({ portraitId: media.id }),
                    render: ({ open }) => el(Button, { variant: 'secondary', onClick: open }, attributes.portraitId ? __('Change portrait', 'kacper-portfolio') : __('Choose portrait', 'kacper-portfolio')),
                })),
                attributes.portraitId ? el('p', null, __('Portrait attachment ID:', 'kacper-portfolio') + ' ' + attributes.portraitId) : null,
            );
        },
        save: () => null,
    });
})();
