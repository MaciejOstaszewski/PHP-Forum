$(document).ready(function(){
  $(".powitanie").delay(500).fadeOut(2000);
  $(".logoutScreen").delay(2000).fadeIn(2000);

});
jQuery(function($)
{
  $.scrollTo(0);
  $('.scrollup').click(function() { $.scrollTo($('body'), 1500); });
}
);

$(window).scroll(function()
{
  if($(this).scrollTop()>300) $('.scrollup').fadeIn();
  else $('.scrollup').fadeOut();
}
);
$(document).ready(function() {
	$("#addPostForm").validate({
		messages: {
			contents: {
          required: '<br /><br /><span style="color:#fd9013;" >Podaj treść posta</span><br />',
			},
		}
	});
	$("#addSectionForm").validate({
		messages: {
			nazwa: {
          required: '<br /><br /><span style="color:#fd9013;" >Podaj nazwe działu</span><br />',
			},
		}
	});
	$("#addTopicForm").validate({
		messages: {
			nazwa: {
          required: '<br /><br /><span style="color:#fd9013;" >Podaj nazwa tematu</span><br />',
			},
      contents: {
          required: '<br /><br /><span style="color:#fd9013;" >Podaj treść posta</span><br />',
      },
		}
	});
});
