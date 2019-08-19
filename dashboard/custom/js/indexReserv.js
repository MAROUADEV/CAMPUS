// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
    manageMemberTable = $("#reservTable").DataTable({
		"ajax": "php_action/retrieveReserv.php",
		"order": []
	});
 
    
});

