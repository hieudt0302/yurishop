/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://localhost/dak_ha/public/assets/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl =  'http://localhost/dak_ha/public/assets/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 	'http://localhost/dak_ha/public/assets/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 	'http://localhost/dak_ha/public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl =  'http://localhost/dak_ha/public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://localhost/dak_ha/public/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

	config.my_toolbar = [
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
	{ name: 'tools', items: [ 'Maximize' ] },
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },
	{ name: 'others', items: [ '-' ] },
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
	{ name: 'styles', items: [ 'Styles', 'Format' ] },
	{ name: 'about', items: [ 'About' ] }
];
};
