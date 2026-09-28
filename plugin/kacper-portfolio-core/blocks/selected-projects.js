(function (blocks, element, editor) {
    blocks.registerBlockType('kacper-portfolio/selected-projects', {
        apiVersion: 3,
        title: 'Selected projects',
        icon: 'portfolio',
        category: 'widgets',
        supports: { html: false },
        edit: function () {
            return element.createElement('div', editor.useBlockProps(),
                element.createElement('strong', null, 'Selected projects'),
                element.createElement('p', null, 'Up to 3 published projects, loaded automatically for the current language. Edit images, descriptions and technologies in Projekte.'));
        },
        save: function () { return null; }
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);
