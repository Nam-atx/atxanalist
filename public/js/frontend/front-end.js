$(document).ready(function(){

    $("#comment-submit").submit(function( event ) {
	  event.preventDefault();
	  var $form = $( this );
	  var url = $form.attr("action");
	  var comment = $form.find("textarea[name='comment']").val();
	  
	  $.ajax({
           type:'POST',
           url:url,
           data:{comment:comment},
           headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},
           success:function(data){
              $('#comment').val('');
              $('.comment-list li').remove();

              $.each( data.data, function( key, value ) {
				  $(".comment-list").append("<li>"+value.comment+" BY " + value.name +" @ " + value.created_at +"</li>");
				});

             $(".comment-show").animate({ scrollTop: $('.comment-show')[0].scrollHeight}, 1000);
           }
        });

	});

});

