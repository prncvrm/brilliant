$(document).ready(function() {
	$('.date').datepicker({format:'yyyy-mm-dd'});
	$('.datatable').DataTable();
	load_roleDetails();
	load_branchDetails();
	$('#roleassignment-users').change(function(){
		load_roleDetails();
	});
	$('#branchpermission-users').change(function(){
		load_branchDetails();
	});
	t = function(n) {
		var t = new Date,
		i = new Date(n.split("/").reverse().join("-")),
		r = t.getFullYear(),
		u = i.getFullYear();
		return r - u
	};
	$('#employeemanagement-dateofbirth').change(function(){
		var n = t($("#employeemanagement-dateofbirth").val());
        n != undefined ? ($("#employeemanagement-age").val(n)) : ($("#employeemanagement-age").val(""));
	});
	

});
	
function load_roleDetails(){
	$.ajax({
    	type:'POST',
    	url:'role-details',
    	data: {"id":$("#roleassignment-users").val()},
    	success:function(response){
    		$('#roleDetails').html(response);
    	}
    	});
}
function load_branchDetails(){
	$.ajax({
    	type:'POST',
    	url:'branch-details',
    	data: {"id":$("#branchpermission-users").val()},
    	success:function(response){
    		$('#branchDetails').html(response);
    	}
    	});
}