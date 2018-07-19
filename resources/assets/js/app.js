require('./bootstrap');

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

//$(function () {
//	$('[data-toggle="tooltip"]').tooltip()
//})
//
//// Initialize popover component
//$(function () {
//	$('[data-toggle="popover"]').popover()
//})