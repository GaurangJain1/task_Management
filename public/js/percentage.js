

const button = document.querySelector('.btn btn primary float-end');

button.addEventListener('click', () => {
  const taskid = button.getAttribute('data-id');
  

  console.log(taskid);                      
}); 

// console.log("taskid"); 

// $('.update-data').on('click', function () {
//   $('#delete-court-form').attr('action', $(this));
// });
// $('#update-data').on('click', function(event) {
//     var value = $(event.relatedTarget).data('data-id');
//     $('#modal-value').text(value);
// });

// .data('delete-link')  show.bs.modal