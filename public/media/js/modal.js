
 $(function(){
	 console.log('asdf');
   var fx = {
    "initModal" : function(){
     if($(".modal-window").length == 0){
      return $('<div>').addClass("modal-window").appendTo("body");
     }else{
      return $(".modal-window")
     }
    }
   }
   $('.product').click(function(){
     var id=$(this).attr('id');
	 console.log(id);
	 var modal = fx.initModal();
	 $.ajax({
		 type:"Post",
		 url:"/ajax",
		 data:"id="+id,
		 success: function(data){	
		 modal.append(data)
		 },
		 error: function(msg){
			 console.log(msg);
		 },
		 beforeSend: function(){
			//modal.append('<img src="/loader.gif">')
		 }
		 })
	 
	  $('<a>').attr('href', '#')
          .addClass('modal-close')
          .html('&times;')
          .click(function(event){
            event.preventDefault();
            modal.remove();
			$('#overlay').remove();
          }).appendTo(modal);
		  
		$("<div>").attr('id', 'overlay').fadeIn(2000).appendTo('body');
  

   });
 })
 


 
  