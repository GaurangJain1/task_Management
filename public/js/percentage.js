
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

// $(document).ready(function() {
  
// });


// $(document).ready(function(){
      // $('#close').click(function(){
      //   $('#actionModal').empty();
      // });
      
// });

// function() {
//   $('#descModal').modal('hide');
// }


function table(){                   //code to render table
  $.ajax({
    url:'show-tasktable',
    type:'GET', 
    success:function(response){
        $('#task-table').html(response);

        descModal();

        detailModal();

    }
  });

}

function descModal(){                   //start of code for desc
  $('.description').hover(function(e){
    e.preventDefault();
    var description = $(this).attr('data-description');
      $('#full-description').text(description);
      $('#descModal').modal('show');
    });
}
function detailModal(){                 // start of code for prepopulating modal
  $('.id').click(function() {
    // e.preventDefault();
    
    console.log("up in detail");
    
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

        // calling of function for saving data
        savedata();
          



        $('#submitform')[0].reset();
        // $('#username').val(response[0].task_name);
        // $('#about').val(response[0].task_description);

        // $('#taskstatus').val(response[0].current_status);
        // // $('#assignedto').val(response[0].id);
        // $('#priority').val(response[0].priority);
        // // $('#role').val(response[0].users[0].id);
        // $('#datepicker1').val(response[0].deadline);
        // $('#createdate').val(response[0].created_at);
        // $('#actionModal').modal('show');
        // $('#close').click(modal('hide'));
        return;
      }
    });
    // $('#full-id').text(id);
    // $('#actionModal').modal('show');
  });
}
function savedata(){
  $('#edit').click(function(e){                   // start of code for saving data
  // $('#submitform')[0].reset();
  // $('#actionModal').modal('hide');
    e.preventDefault();
      //   var id = $(this).attr('task-id');
      //   var name =  $(this).attr('username');
      //   var desc = $(this).attr('about');
      //   var status = $(this).attr('taskstatus');
      //   var priority = $(this).attr('priority');
      //   // var file = respons;
      //   var role =$(this).attr('assignedto');
      //   var deadline = $(this).attr('deadline');
      

        var id = $("#task-id").val();
        var name =  $("#taskname").val();
        var desc = $("#about").val();
        var status = $("#taskstatus").val();
        var priority = $("#priority").val();
        var role =$("#role").val();
        var deadline = $("#datepicker1").val();
        // console.log(id);
        console.log(name);
        console.log(role);
        // console.log(status);
        $('#submitform')[0].reset();

    
      $.ajax({
        url:"edit/task",
        type:'POST',
        // hasContent: true,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{
          data_id:id,
          data_name:name,
          data_desc:desc,
          data_status:status,
          data_priority:priority,
          user_role:role,
          data_deadline:deadline
    
        },
        success:function(response){
          // console.log(response);
          // $('#task-table').prepend(response);  
          loadtable();
          return;
        }
      });
    });
}
function loadtable(){                 //code for loading data in background      
  console.log("hi");
  $('#submitform')[0].reset();
  // alert('hello2'); 
  $('.modal-backdrop').remove();
  // $('.modal-content').hide();
  $('#actionModal').modal('hide');
  $.ajax({
    url:'show-tasktable',
    type:'GET',
    success:function(response){
      $('#task-table').html(response);
      detailModal();
      // $('.id').click(function(){
      //   console.log('insideeeee');
      // });
      return;
    }
  });
}

$(document).ready(function(){           //loading of DOM document
  //call to render table
  table();
  detailModal();


  // $('.id').click(function() {
  //   console.log("down after table()");
  // });


  $('.btn-close').click(function(){
      $('#descModal').modal('hide');
      // table();
      // console.log("a1st");
  });
  $('.btn-close').click(function(){
    $('#actionModal').modal('hide');
    $('.modal-backdrop').remove();

    // table();
    // console.log("a1st");
});
  // $('#close-actionModal').click(function(){
  //     // console.log("2ndd");
  //     $('#actionModal').modal('hide');
  //  });



  $('#new-table').click(function(){             //call for pagination
    table();
  });
  


  $('#ch').click(function() { 
    console.log("hiiiii");
  });

  
  
  


});


// attr('data-id')
// $(document).ready(function(){

  
  // });



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





