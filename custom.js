$(document).ready(function(){
	$('.titleTextBox').hide();
    $('.descriptionTextBox').hide();
    $('.radioTitle').click(function(){
    	$('.titleTextBox').show();
    	$('.descriptionTextBox').hide();
    	$("input[type='text']").val("");
    });
    $('.radioDescription').click(function(){
    	$('.descriptionTextBox').show();
    	$('.titleTextBox').hide();
    	$("input[type='text']").val("");
    });
    $('.radioAllworks').click(function(){
    	$('.descriptionTextBox').hide();
    	$('.titleTextBox').hide();
    	$("input[type='text']").val("");
    });
});