jQuery(document).ready(function($) {
	$('.carousel').flickity();

   	$("#form-field-username").focusout(function(){
	
		var url = $(location).attr("href");
		var parts = url.split("/");
		var url_last_part = parts[parts.length-2];
	
		
		var input_name_field_value = ($(this).val());
		var person_number_value = $("#form-field-person:selected").val();
		
	
		var form_field_person = $('#form-field-person').siblings('ul').find('li').children('.selected').text();
		
		
// 		var person_form_selected =	form_field_person.siblings('.selected')	;
		
// 		form_field_person.each(function(e){
// 			console.log(e);
// 		})
		$.ajax({
		  url: ajax_scripts.ajaxurl,
		  type: 'post',
		  data: {
			  'action': 'form_value_generator_final',
			  'input_name_field_value' : input_name_field_value,
			  'url_last_part' : url_last_part,
			  'form_field_person' : form_field_person
			},
			success: function(response){
// 				alert(response);   
// 				alert(person_number_value);
				console.log(form_field_person);
// 				console.log(person_form_selected);
// 				
				
				
			}
		});
	});
});
