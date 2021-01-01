/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = 'http://127.0.0.1/cms/svnsolution/public/ckeditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://127.0.0.1/cms/svnsolution/public/ckeditor/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'http://127.0.0.1/cms/svnsolution/public/ckeditor/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'http://127.0.0.1/cms/svnsolution/public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://127.0.0.1/cms/svnsolution/public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'http://127.0.0.1/cms/svnsolution/public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    config.height = '480px';
};