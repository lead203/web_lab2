var total = 1;
function add_new_image(){
	total++;
	$('<tr>')
	.attr('id','tr_image_'+total)

	.append (
		$('<td>')
		.attr('id','td_span_'+total)
		.append(
			$('<select></select>')
			.css({width:'150px'})
			.attr('id','select_title_'+total)
			.attr('name','product[ingridients'+total+']')
		)		
		
	)

	.append (
		$('<td>')
		.attr('id','td_title_'+total)
		.append(
			$('<input type="text" />')
			.css({width:'80px'})
			.attr('id','input_title_'+total)
			.attr('name','productQuantity[ingridients'+total+']')
		)		
		
	)
	
	.append (
		$('<td>')
		.append (
			$('<span id="progress_'+total+'"><a  href="#" onclick="$(\'#tr_image_'+total+'\').remove();" class="ico_delete"><img src="/img/del_form.png" alt="del" border="0"></a></span>')
		)
	)
	.appendTo('#table_container');


	$.ajax({
  	 	url: "data.php",
  	 	cache: false,
 	 	success: function(data){
  	 		$('select').html(data);
 	 	}
  	});
}