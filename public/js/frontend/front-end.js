$(document).ready(function(){

    $("#comment-submit").submit(function( event ) {
	  event.preventDefault();
	  var $form = $( this );
	  var url = $form.attr("action");
    var comment = $form.find("textarea[name='comment']").val();
	  var future_followup_date = $form.find("input[name='future_followup_date']").val();
	  
	  $.ajax({
           type:'POST',
           url:url,
           data:{comment:comment,future_followup_date:future_followup_date},
           headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},
           success:function(data){
              $('#comment').val('');
              $('.comment-list li').remove();
              $('#dtp_input1').val('');
              $.each( data.data, function( key, value ) {
				  $(".comment-list").append("<li>"+value.comment+" BY " + value.name +" @ " + value.created_at +"</li>");
				});

             $(".comment-show").animate({ scrollTop: $('.comment-show')[0].scrollHeight}, 1000);
           }
        });

	});

    // sales comment
    $("#salescomment-submit").submit(function( event ) {
    event.preventDefault();
    var $form = $( this );
    var url = $form.attr("action");
    var comment = $form.find("textarea[name='comment']").val();
    var status = $form.find("input[name='status']:checked").val();
    var type = $form.find("input[name='type']").val();
    var followup_date = $form.find("input[name='followup_date']").val();
    $.ajax({
           type:'POST',
           url:url,
           data:{comment:comment,status:status,type:type,followup_date:followup_date},
           headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")},
           success:function(data){
              $('#comment').val('');
              $('.comment-list li').remove();
              $('#dtp_input1').val('');

              $.each( data.data, function( key, value ) {
          $(".comment-list").append("<li>"+value.comment+" BY " + value.name +" @ " + value.created_at +"</li>");
        });

             $(".comment-show").animate({ scrollTop: $('.comment-show')[0].scrollHeight}, 1000);
           }
        });

  });

});

