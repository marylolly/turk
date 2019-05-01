$(function(){


$('.count1').on('input',function(){
	var data=$(this).val();
	var id=$(this).attr('data-id');
	var price=$('#price_'+id).text();
	$('#count_'+id).text((price*data).toFixed(2));
	
	
	
});



































}); 