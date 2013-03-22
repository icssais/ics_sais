$(document).ready(function(){

	//ALL SECTION
    $('#section').hide(0).fadeIn(1000);

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
	
	/*View Acad History*/
	$('#hist_1').click(function() {
	  $('#hist1').slideToggle('slow');
	});
	
	$('#hist_2').click(function() {
	  $('#hist2').slideToggle('slow');
	});
	
	$('#hist_3').click(function() {
	  $('#hist3').slideToggle('slow');
	});
	
	$('#hist_4').click(function() {
	  $('#hist4').slideToggle('slow');
	});
	
	$('#hist_5').click(function() {
	  $('#hist5').slideToggle('slow');
	});
	
	$('#hist_6').click(function() {
	  $('#hist6').slideToggle('slow');
	});
	
	$('#hist_7').click(function() {
	  $('#hist7').slideToggle('slow');
	});
	
	$('#hist_8').click(function() {
	  $('#hist8').slideToggle('slow');
	});
	
	$('#hist_9').click(function() {
	  $('#hist9').slideToggle('slow');
	});
	
	$('#hist_10').click(function() {
	  $('#hist10').slideToggle('slow');
	});
	
	$('#hist_11').click(function() {
	  $('#hist11').slideToggle('slow');
	});
	
	$('#hist_12').click(function() {
	  $('#hist12').slideToggle('slow');
	});
	
	$('#hist_13').click(function() {
	  $('#hist13').slideToggle('slow');
	});
	
	$('#hist_14').click(function() {
	  $('#hist14').slideToggle('slow');
	});

	$('#app_ge').click(function() {
	  $('#ge').slideToggle('slow');
	});
	
	$('#app_electives').click(function() {
	  $('#electives').slideToggle('slow');
	});
});