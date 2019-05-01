
$('.parse').click(function(){
	var url=$('#parse_aliexpress').val();
	var id=$(this).attr('data-id');
$.ajax({
  type: 'get',
  data: 'id='+id+'&url='+url,
  url: '/ajax/parse/catalog',
  beforeSend: function(){
   $('#empty').html('<img src="/media/img/loader.gif" width="100px">');
  },
  success: function(data){
   $('#empty').html(data);    
  },
  error: function(msg){
   console.log(msg);
  }
 });
});

