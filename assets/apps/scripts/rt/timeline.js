window.TIMELINE = (function($){
	return {

		elForm : '.komentar-form',

		init : function() {
			var parentThis = this;

			parentThis.handleKomentar();
		},

		handleKomentar : function() {
			var parentThis = this;

			$(parentThis.elForm).ajaxForm({
				dataType : 'json',
				success : function(response) {
					$.notify(response.message, response.status);

					if(response.status == 'success') {
						setTimeout(function() {
							window.location.reload();
						}, 1000);
					}
				}
			});
		}
	}
})(jQuery);