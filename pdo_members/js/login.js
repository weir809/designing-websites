
function validateUser(){
valid = true;
var x=document.forms["userForm"]["User"].value;
	if (x==null || x==""){
		//alert('Please enter a username')
		document.getElementById('errorUser').innerHTML = 'Please enter a username';
		valid = false;
	}
	else{
		document.getElementById('errorUser').innerHTML = '';
	}
	return valid;
}

function validatePass(){
valid = true;
var x=document.forms["userForm"]["Pass"].value;
	if (x==null || x==""){
		//alert('Please enter a password')
		document.getElementById('errorPassword').innerHTML = 'Please enter a password.';
		valid = false;
	}
	else{
		document.getElementById('errorPassword').innerHTML = '';
	}
	return valid;
}

function validateEmail(){
valid = true;
var x=document.forms["userForm"]["Email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
		//alert('Please enter a valid email address.')
		document.getElementById('errorEmail').innerHTML = 'Please enter a valid email address.';
		valid = false;
		}
	else{
		document.getElementById('errorEmail').innerHTML = '';
	}
	return valid;
}

function confirm_delete()
{
	return confirm('Are you sure you want to delete this member? \n This action cannot be undone!!')
}

// JS Flash Message
(function($) {
    $.fn.flash_message = function(options) {

        options = $.extend({
            text: 'Done',
            time: 3000,
            how: 'before',
            class_name: ''
        }, options);

        return $(this).each(function() {
            if( $(this).parent().find('.flash_message').get(0) )
                return;

            var message = $('<span />', {
                'class': 'flash_message ' + options.class_name,
                text: options.text
            }).hide().fadeIn('fast');

            $(this)[options.how](message);

            message.delay(options.time).fadeOut('slow', function() {
                $(this).remove();
            });

        });
    };
})(jQuery);

$('.add-member').click(function() {

    $('#status-area').flash_message({
        text: 'Member Added',
        how: 'append'
    });
});

$('#login-error').flash_message({
    text: 'Wrong username or password', // text to show
    how: 'append', // ['append', 'prepend', 'before', 'after']
    time: 4000, // how long should the message be visible
    //class_name: 'success' // additional class names for CSS hooks
});

$('#status-area').flash_message({
    text: 'Member added', // text to show
    how: 'append', // ['append', 'prepend', 'before', 'after']
    time: 4000, // how long should the message be visible
    //class_name: 'success' // additional class names for CSS hooks
});



// function addMemberFlash(function() {
//
//     $('#status-area').flash_message({
//         text: 'Member Added',
//         how: 'append'
//     });
// });


//toggle password visibility
$(".glyphicon-eye-open").on("click", function() {
    $(this).toggleClass("glyphicon-eye-close");
    var type = $("#password").attr("type");
    if (type == "text"){
        $("#password").prop('type','password');}
    else{
        $("#password").prop('type','text'); }
});

