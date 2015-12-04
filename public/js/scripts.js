$(window).on('load', function() {
	$('#country').on('change', function(){
		var countryId = $(this).val();
		$.ajax({
			url: 'getcitiesbycountry/'+countryId,
			method: 'GET',
			dataType: 'JSON',
			success: function(response){
				$("#city").empty();
				$.each(response.result, function(i, item) {
					$("#city").append($("<option>",{value: item.id, text: item.name}));
				});
			}
		});
	});
});