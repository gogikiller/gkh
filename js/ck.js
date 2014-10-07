CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.enterMode = CKEDITOR.ENTER_BR;
	config.removePlugins = 'elementspath'; 
	config.uiColor = '#e2f4fd';
	config.language='ru';
	config.toolbar=[['Smiley']];
	config.smiley_descriptions = [
    ':)', ':(', ';)', ':D', ':/', ':P', ':*)', ':-o',
    ':|', '>:(', 'o:)', '8-)', '>:-)', ';(', '', '', '',
    '', '', ':-*', ''
];

	config.toolbarLocation = 'bottom';
	config.resize_enabled = false;
};