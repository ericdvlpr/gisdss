$(document).ready(function(){
  $('#reservation').daterangepicker();
  $('#brgyform').attr('style','display:none');
   $('#access').on('change', function(){
      if($(this).val() == 2){
        $('#brgyform').attr('style','display:block');
      }else{
          $('#brgyform').attr('style','display:none');
      }

   });
  $('.modal').on('hidden.bs.modal', function () {
    location.reload();
      })
        var userdataTable = $('#userstbl').DataTable({
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax":{
           url:"core/user_fetch.php",
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
       var tabledataTable = $('#brgytbl').DataTable({
         "processing": true,
         "serverSide": true,
         "order": [],
         "ajax":{
          url:"core/brgy_fetch.php",
          type:"POST"
         },
         "columnDefs":[
          {
           "target":[4,5],
           "orderable":false
          }
         ],
         "pageLength": 10
      });
      var warningdataTable = $('#warningtbl').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "searching": false,
         "paging": false,
        "ajax":{
         url:"core/warning_fetch.php",
         type:"POST"
        },
        "columnDefs":[
         {
          "target":[4,5],
          "orderable":false
         }
        ],
        "pageLength": 10
     });
     var forecastdataTable = $('#forecasttbl').DataTable({
       "processing": true,
       "serverSide": true,
       "order": [],
       "searching": false,
        "paging": false,
       "ajax":{
        url:"core/forecast_fetch.php",
        type:"POST"
       },
       "columnDefs":[
        {
         "target":[4,5],
         "orderable":false
        }
       ],
       "pageLength": 10
    });
    var advisorydataTable = $('#advisorytbl').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "searching": false,
       "paging": false,
      "ajax":{
       url:"core/advisory_fetch.php",
       type:"POST"
      },
      "columnDefs":[
       {
        "target":[4,5],
        "orderable":false
       }
      ],
      "pageLength": 10
   });
   var residentdataTable = $('#residenttbl').DataTable({
     "processing": true,
     "serverSide": true,
     "order": [],
     "searching": false,
      "paging": false,
     "ajax":{
      url:"core/resident_fetch.php",
      type:"POST"
     },
     "columnDefs":[
      {
       "target":[4,5],
       "orderable":false
      }
     ],
     "pageLength": 10
  });
   $('#add_button').click(function(){
      $('#user_form')[0].reset();
      $('.modal-title').html("<i class='fa fa-plus'></i> Add User");
      $('#action').val("Add");
      $('#btn_action').val("Add");
   });
   $('#input_button').click(function(){
      var today = new Date();
      var id = Date.now();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      today =   mm + '/' + dd + '/' + yyyy  ;

      $('#datepicker').datepicker({
         autoclose: true,
         startDate :today,
         endDate:''
       }).on("show", function(){
       $(this).val(today).datepicker('update');
     });
     var nextDay = new Date();
     var ndd = nextDay.getDate() + 1;
     var nmm = nextDay.getMonth() + 1;
     var nyyyy = nextDay.getFullYear();
     nextDay =  nmm + '/' + ndd + '/' + nyyyy;
     $('#valid_date').datepicker({
        autoclose: true,
        startDate :nextDay,
        endDate:''
      }).on("show", function(){
      $(this).val(nextDay).datepicker('update');
    });
      $('.modal-title').html("<i class='fa fa-plus'></i> Add Forecast");
      $('#issue_no').val(id);
      $('#action').val("Add");
      $('#btn_action').val("Add");
   });
   $(document).on('submit', '#resident_form', function(event){
          event.preventDefault();
          $('#action').attr('disabled','disabled');
          var form_data = $(this).serialize();
          $.ajax({
           url:"core/resident_action.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
             alert(data);
            $('#resident_form')[0].reset();
            $('#residentModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
            $('#action').attr('disabled', false);
            residentdataTable.ajax.reload();
           }
          })
     });
   $(document).on('submit', '#forecast_form', function(event){
          event.preventDefault();
          $('#action').attr('disabled','disabled');
          var form_data = $(this).serialize();
          $.ajax({
           url:"core/forecast_action.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
             alert(data);
            $('#forecast_form')[0].reset();
            $('#inputModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
            $('#action').attr('disabled', false);
            forecastdataTable.ajax.reload();
           }
          })
     });
     $(document).on('submit', '#user_form', function(event){
            event.preventDefault();
            $('#action').attr('disabled','disabled');
            var form_data = $(this).serialize();
            $.ajax({
             url:"core/user_action.php",
             method:"POST",
             data:form_data,
             success:function(data)
             {
               alert(data);
              $('#user_form')[0].reset();
              $('#userModal').modal('hide');
              $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
              $('#action').attr('disabled', false);
              userdataTable.ajax.reload();
             }
            })
       });
       $(document).on('submit', '#advisory_form', function(event){
              event.preventDefault();
              $('#action').attr('disabled','disabled');
              var form_data = $(this).serialize();
              $.ajax({
               url:"core/advisory_action.php",
               method:"POST",
               data:form_data,
               success:function(data)
               {
                alert(data);
                $('#advisory_form')[0].reset();
                $('#inputAdvisory').modal('hide');
                $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
                $('#action').attr('disabled', false);
                window.location.href = "advisory.php";
               }
              })
         });
         $(document).on('submit', '#hsdata_form', function(event){
                event.preventDefault();
                $('#action').attr('disabled','disabled');
                var form_data = $(this).serialize();
                $.ajax({
                 url:"core/historical_fetch.php",
                 method:"POST",
                 data:form_data,
                 success:function(data)
                 {
                  $('#hsdata_form')[0].reset();
                   $('#reports_table').html(data);
                  $('#action').attr('disabled', false);
                 }
                })
           });
           $(document).on('click', '.updateRes', function(){
               var res_id = $(this).attr("id");
               var btn_action = 'fetch_single';
               $.ajax({
                url:"core/resident_action.php",
                method:"POST",
                data:{res_id:res_id, btn_action:btn_action},
                dataType:"json",
                success:function(data)
                {
                 $('#residentModal').modal('show');
                 $('#res_name').val(data.res_name);
                 $('#res_username').val(data.res_username);
                 $('#res_password').attr("placeholder", "Re-type your password");
                 $('#res_brgy').val(data.res_brgy);
                 $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit User");
                 $('#res_id').val(res_id);
                 $('#action').val('Edit');
                 $('#btn_action').val('Edit');

                }
               })
            });
           $(document).on('click', '.updateUser', function(){
              var user_id = $(this).attr("id");
              var btn_action = 'fetch_single';
              $.ajax({
               url:"core/user_action.php",
               method:"POST",
               data:{user_id:user_id, btn_action:btn_action},
               dataType:"json",
               success:function(data)
               {
                $('#userModal').modal('show');
                $('#name').val(data.name);
                $('#username').val(data.username);
                $('#password').attr("placeholder", "Re-type your password");
                $('#access').val(data.access);
                $('#brgy').val(data.brgy);
                if(data.access == 2){
                    $('#brgyform').attr('style','display:block');
                }
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit User");
                $('#user_id').val(user_id);
                $('#action').val('Edit');
                $('#btn_action').val('Edit');

               }
              })
           });
           $(document).on('click', '.updateForcast', function(){
              var forecast_id = $(this).attr("id");
              var btn_action = 'fetch_single';
              $.ajax({
               url:"core/forecast_action.php",
               method:"POST",
               data:{forecast_id:forecast_id, btn_action:btn_action},
               dataType:"json",
               success:function(data)
               {
                $('#inputModal').modal('show');
                $('#issue_no').val(data.issue_no);
                $('#datepicker').val(data.issue_date);
                $('#valid_date').val(data.valid_date);
                $('#wind').val(data.wind);
                $('#wave').val(data.wave);
                $('#rain').val(data.rain);
                $('#temp').val(data.temp);
                $('#hum').val(data.hum);
                $('#sunrise').val(data.sunrise);
                $('#sunset').val(data.sunset);
                $('#sunset').val(data.sunset);
                $('#moonrise').val(data.moonrise);
                $('#moonset').val(data.moonset);
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Forecast");
                $('#forecast_id').val(forecast_id);
                $('#action').val('Edit');
                $('#btn_action').val('Edit');

               }
              })
           })
           $(document).on('click', '.updateAdvisory', function(){
              var advisory_id = $(this).attr("id");
              var btn_action = 'fetch_single';
              $.ajax({
               url:"core/advisory_action.php",
               method:"POST",
               data:{advisory_id:advisory_id, btn_action:btn_action},
               dataType:"json",
               success:function(data)
               {
                $('#inputAdvisory').modal('show');
                $('#issue_no').val(data.issue_no);
                $('#issue_date').val(data.issue_date);
                $('#alrt_wind').val(data.alrt_wind);
                $('#alrt_wave').val(data.alrt_wave);
                $('#alrt_rain').val(data.alrt_rain);
                $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Forecast");
                $('#advisory_id').val(advisory_id);
                $('#action').val('Edit');
                $('#btn_action').val('Edit');

               }
              })
           })
           $(document).on('click', '.deleteUser', function(){
                var user_id = $(this).attr("id");
                var status = $(this).data('status');
                var btn_action = "delete";
                if(confirm("Are you sure you want to change status?"))
                {
                 $.ajax({
                  url:"core/user_action.php",
                  method:"POST",
                  data:{user_id:user_id, status:status, btn_action:btn_action},
                  success:function(data)
                  {
                   $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                   userdataTable.ajax.reload();
                  }
                 })
                }
                else
                {
                 return false;
                }
           });
           $(document).on('click','#createAdvi',function(){
             // var calamity = $(this).data('calam');
              var today = new Date();
              var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
              var time = today.getHours() +""+ today.getMinutes() +""+ today.getSeconds();
              var dateTime = date+''+time;
              $('#issue_no').val(dateTime);
              $('#issue_date').val((today.getMonth()+1)+'/'+today.getDate()+'/'+today.getFullYear());
              $('#btn_action').val("Add");
           });

});
