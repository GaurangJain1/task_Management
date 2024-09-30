

// const button = document.querySelector('.btn btn primary float-end');

// button.addEventListener('click', () => {
//   const taskid = button.getAttribute('data-id');
  

//   console.log(taskid);                      
// }); 

// console.log("taskid"); 

// $('.update-data').on('click', function () {
//   $('#delete-court-form').attr('action', $(this));
// });
// $('#update-data').on('click', function(event) {
//     var value = $(event.relatedTarget).data('data-id');
//     $('#modal-value').text(value);
// });

// .data('delete-link')  show.bs.modal

$(document).ready(function() {
  $('.description').hover(function() { 
    var description = $(this).attr('data-description');
    $('#full-description').text(description);
    $('#descModal').modal('show');
}, function() {
    $('#descModal').modal('hide');
});
});


$(document).ready(function(){
  $.ajax({
    url:'show-tasktable',
    type:'GET',
    success:function(response){
      $('#task-table').html(response);

    }
  })
    
});


// attr('data-id')
$(document).ready(function(){

  $('.id').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
          url:'fill',
          type:'GET',
          // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
            // "_token":"{{csrf_token()}}",.modal-body.submitform.
            data:id
          },
          success:function(response){
            // alert(response);
            // console.log(response);
            // var data = JSON.parse(response)

            $('#submitform').html(response);
            $('#submitform')[0].reset();
            // $('#username').val(response[0].task_name);
            // $('#about').val(response[0].task_description);

            // $('#taskstatus').val(response[0].current_status);
            // // $('#assignedto').val(response[0].id);
            // $('#priority').val(response[0].priority);
            // // $('#role').val(response[0].users[0].id);
            // $('#datepicker1').val(response[0].deadline);
            // $('#createdate').val(response[0].created_at);
            $('#actionModal').modal('show');
            // $('#close').click(modal('hide'));
          }
        });
        // $('#full-id').text(id);
        // $('#actionModal').modal('show');
  });

  $('#edit').click(function(e){
    e.preventDefault();
          // var id = $(this).attr('task-id');
          var id = $(this).attr('task-id');
          var name =  $(this).attr('username');
          var desc = $(this).attr('about');
          var status = $(this).attr('taskstatus');
          var priority = $(this).attr('priority');
          // var file = respons;
          var role =$(this).attr('assignedto');
          var deadline = $(this).attr('deadline');

        $.ajax({
          url:'fill',
          type:'POST',
          // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data:{
            id:id,
            name:name,
            desc:desc,
            status:status,
            priority:priority,
            role:role,
            deadline:deadline

          },
          success:function(response){
            console.log(response);
          }
        });

  });



    // fetchRecords();
  // $('#submitform').on('submit',function(e){
    
  //   e.preventDefault();
  //   var data=$('#submitform').serialize();
  //   alert(data);
  //   $.ajax({
  //     url :"sdata",
  //     type:"POST",
  //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

  //     data:{
  //       // "_token":"{{csrf_token()}}",
  //       data:data
  //     },
  //     success:function(response){
  //       // $('#respanel').html(response);
  //       $('#submitform')[0].reset();  
  //       $('#actionModal').modal('hide');
        
  //     }
  //   });
  // });
  // function fetchRecords(){
  //   $.ajax({
  //     url:'getData',
  //     type:'GET',
  //     success:function(response){
        // console.log(response);
        
        // var tr='';
        // for(var i=0;i<response.length;i++){
        //   var id = response[i].task_id;
        //   var name = response[i].task_name;
        //   var desc = response[i].task_description;
        //   var priority = response[i].priority;
        //   // var file = response[i].attached_file;
        //   // var role = response[i].Role;
        //   var deadline = response[i].deadline;
        //   var status = response[i].current_status;
        //   var cr = response[i].created_at;
        //   var up = response[i].updated_at;

        //   tr += '<tr>';
        //   tr += '<td>'+id+'</td>';
        //   tr += '<td>'+name+'</td>';
        //   // tr += '<td>'<button type="button" data-description="desc" class="description"  data-bs-toggle="modal" data-bs-target="#descModal"> <? php Str::limit(desc,10)?> </button>'</td>';
        //   tr += '<td>'+priority+'</td>';
        //   tr += '<td>'+deadline+'</td>';
        //   // tr += '<td style="opacity: 0.5;">'+status+'</td>';
        //   tr += '<td>'+status+'</td>';
        //   tr += '<td>'+cr+'</td>';
        //   tr += '<td>'+up+'</td>';
        //   tr += '<td>'+<button type="button" class="id"  data-bs-toggle="modal" data-bs-target="#actionModal" value="'+id+'">More</button>+'</td>';
        //   tr += '</tr>';
          // $('#task_table').html(tr);
        
      // }
  //   });
  // }
  // fetchRecords();
});



// $(document).ready(function() {
//   $('.id').click(function() {
//       var id = $(this).attr('data-id');
//       $('#full-id').text(id);
//       $('#actionModal').modal('show');
//   }, function() {
//       $('#actionModal').modal('hide');
//   });
// });

// $(document).ready(function() {
//   var modalVisible = false;
//   $('.id').click(function() {
//     var id = $(this).attr('data-id');
//     if (!modalVisible) {
//       $('#full-id').html(id);
//       $('#actionModal').modal('show');
//       modalVisible = true;
//     } else {
//       $('#actionModal').modal('hide');
//       modalVisible = false;
//     }
//     // const jsonArray = id;

//     // const vector = jsonArray.map(obj => [
//     //   obj.id,
//     //   obj.name,
//     //   obj.email,
//     //   obj.email_verified_at,
//     //   obj.pivot.task_id,
//     //   obj.pivot.user_id
//     // ]);
//     var idAsArray = JSON.parse(id);
//     const arr = Object.values(idAsArray);
//     console.log(arr);
//     $('.task_desc').text(arr);
//     // console.log(idAsArray)
//   });
// });

