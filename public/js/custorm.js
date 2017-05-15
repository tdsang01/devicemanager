$( document ).ready(function() {
   $('#id_periodstart').change(function() {
	   var start = $('#id_periodstart').val();
	   try {
		   start = parseInt(start);
		} catch (e) {
			console.log('Error when try parse int');
		}
		$('#id_periodend').children().show();
		for(let i = 1; i < start; i++) {
			$('#id_periodend #' + i).hide();
		}
		$('#id_periodend').val(start);
   })
});