$(document).ready(function(){

	//ALL SECTION
    $('#fade').hide(0).fadeIn(1000);

	//ADMIN
	function userAdded(){
		$().toastmessage('showToast', {
			text: 'User successfully added.',
			sticky: false,
			position: 'middle-center',
			type: 'success'
		});
	}

	$('#add_student').click(function() {
	  $('#addStudent').slideToggle('slow');
	});

	$('#add_instructor').click(function() {
	  $('#addInstructor').slideToggle('slow');
	});

	$('#add_encoder').click(function() {
	  $('#addEncoder').slideToggle('slow');
	});

});