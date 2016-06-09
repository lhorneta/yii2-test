$(document).ready(function(e) {

	$(document).on("keyup",".recount",function() {
		var 
			count = $(this).val(),
			product_id = $(this).attr('name');

		if(count !=='' && count >= 0){
			$.get( "/web/index.php?r=cart%2Fupdate&product_id="+product_id+"&qty="+count, function( data ) {
			  $('#cart').load(document.location+' #cart > *');
	            	
			});
		}
	});

	$(document).on("click",".recount_span", function() {

		$.get( "/web/index.php?r=cart%2Fview", function( data ) {
		  $('#cart').load(document.location+' #cart > *');
            	
		});
	});
});