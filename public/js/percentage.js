

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
// $(document).ready(function() {
//   $('.id').click(function() {
//       var id = $(this).attr('data-id');
//       $('#full-id').text(id);
//       $('#actionModal').modal('show');
//   }, function() {
//       $('#actionModal').modal('hide');
//   });
// });

$(document).ready(function() {
  var modalVisible = false;
  $('.id').click(function() {
    var id = $(this).attr('data-id');
    if (!modalVisible) {
      $('#full-id').text(id);
      $('#actionModal').modal('show');
      modalVisible = true;
    } else {
      $('#actionModal').modal('hide');
      modalVisible = false;
    }
    const jsonArray = id;

    const vector = jsonArray.map(obj => [
      obj.id,
      obj.name,
      obj.email,
      obj.email_verified_at,
      obj.pivot.task_id,
      obj.pivot.user_id
    ]);

    console.log(vector)
  });
});

