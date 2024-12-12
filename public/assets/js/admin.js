$(document).ready(function(){
	$(".btn-toggle").click(function(e) {
	e.preventDefault();
	  $(".wrapper").toggleClass("toggled");
	});

	$(".table").DataTable();
    $('.select').select2();
});
