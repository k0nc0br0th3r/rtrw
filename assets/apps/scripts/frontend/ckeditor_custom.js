/**
 * CKEDITOR CUSTOM
 *
 * @author Hikmahtiar <hikmahtiar.cool@gmail.com>
 */
window.CKEDITOR_APP = (function() {
	return {
		init: function(inputEl, type) {
			var _this = this;

			var config = _this.config(type);
			$(inputEl).ckeditor(config);
		},

		config: function(type) {

			var cnf = '';

			if(type == "standard") {
				cnf = {
					language: 'id',
					height: 300,
		            toolbarGroups : [
						{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
						{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
						{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
						{ name: 'forms', groups: [ 'forms' ] },
						'/',
						{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
						{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
						{ name: 'links', groups: [ 'links' ] },
						{ name: 'insert', groups: [ 'insert' ] },
						{ name: 'tools', groups: [ 'tools' ] },
						'/',
						{ name: 'styles', groups: [ 'styles' ] },
						{ name: 'colors', groups: [ 'colors' ] },
						{ name: 'others', groups: [ 'others' ] },
						{ name: 'about', groups: [ 'about' ] }
					],
					enterMode : CKEDITOR.ENTER_BR,
        			shiftEnterMode: CKEDITOR.ENTER_P,
					removeButtons :'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,SelectAll,Replace,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,Blockquote,BidiLtr,BidiRtl,Language,Anchor,Unlink,Link,Flash,Image,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Styles,TextColor,BGColor,Font,Format,FontSize,ShowBlocks,About'
		        };
			}

			return cnf;
		}
	}
})(jQuery);