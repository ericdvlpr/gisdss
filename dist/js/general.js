$(document).ready(function(){

    var userdataTable = $('#user_data').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax":{
     url:"user_fetch.php",
     type:"POST"
    },
    "columnDefs":[
     {
      "target":[4,5],
      "orderable":false
     }
    ],
    "pageLength": 25
   });
});
