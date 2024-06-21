
<?php
var roomsRecords = $('#roomsListing').DataTable({
	"lengthChange": false,
	"processing":true,
	"serverSide":true,		
	"bFilter": true,
	'serverMethod': 'post',		
	"order":[],
	"ajax":{
		url:"rooms_action.php",
		type:"POST",
		data:{action:'listRooms'},
		dataType:"json"
	},
	"columnDefs":[
		{
			"targets":[0, 6, 7],
			"orderable":false,
		},
	],
	"pageLength": 10
});		
if(!empty($_POST['action']) && $_POST['action'] == 'listRooms') {
	$room->listRooms();
}
?>