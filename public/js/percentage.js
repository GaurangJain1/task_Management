

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

  $('.id').click(function() {
        var id = $(this).attr('data-id');
        $('#full-id').text(id);
        $('#actionModal').modal('show');
    });
  $('#submitform').on('submit',function(e){
    
    e.preventDefault();
    var data=$('#submitform').serialize();
    alert(data);
    $.ajax({
      url :"sdata",
      type:"POST",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

      data:{
        // "_token":"{{csrf_token()}}",
        data:data
      },
      success:function(response){
        $('#respanel').html(response);
        $('#submitform')[0].reset();  
        $('#actionModal').modal('hide');
        fetchRecords();
      }
    });
  });
  function fetchRecords(){
    $.ajax({
      url:'getData',
      type:'GET',
      success:function(response){
        var tr='';
        for(var i=0;i<response.length;i++){
          var id = response[i].task_id;
          var desc = response[i].task_description;
          var name = response[i].task_name;
          var priority = response[i].priority;
          var file = response[i].attached_file;
          var deadline = response[i].deadline;
          var status = response[i].current_status;
          var cr = response[i].created_at;
          var up = response[i].updated_at;

        }
      }
    });
  }
  fetchRecords();
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

