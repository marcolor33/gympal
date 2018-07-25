
CKEDITOR.editorConfig = function(config) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    config.extraPlugins = 'youtube';
    config.toolbar = [      
        { name: 'others', items: [ 'Youtube' ] },       
    ];
};
