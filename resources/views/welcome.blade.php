  {{-- THIS FILE IS USED FOR WELCOME VIEW --}}

  <x-layout>
    <x-slot:heading>
        HOME PAGE FOR ADMIN
    </x-slot:heading>
    
    <br>
    <br>
    <h2>Table Task is Displayed</h2>
    <p id="respanel"></p>
    <br>
    
    <!-- Modal -->
{{-- <div id="descModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Full Description</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                  {{-- <span aria-hidden="true">&times;</span> --}}
              {{-- </button>
          </div>
          <div class="modal-body" style="word-wrap: break-word;">
              <p id="full-description"></p>
          </div>
      </div>
  </div>
</div> --}}

<div id="actionModal" class="modal fade-xl" tabindex="-1" role="dialog" >
    
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="margin-left: -129px;width:150%;">
          <div class="modal-header">
              <h5 class="modal-title">All Detailsssss</h5>
              {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" id ="close-modal"> --}}
                  {{-- <span aria-hidden="true" style="position: relative" ><b> &times;</b></span> --}}
              {{-- </button> --}}
              <button type="button" id="close-actionModal" class="btn-close" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="word-wrap: break-word;">
              
              <div id="submitform">
                    {{-- @include('task-modal'); --}}
              </div>
              
  </div>
  
        
{{-- <div class="task_description">
  <p></p> --}}
</div>
</div>
</div>
</div> 

                      
            {{-- @foreach($data as $task)
            
                        @foreach ($task->users as $user)
                            
                                @if ($user != null)
                                @else
                                @endif
                           
                        @endforeach --}}
       
           
            <div id="task-table" >
              
            </div>
            {{$tasks->links()}}
            {{-- @include('task-table'); --}}
            
            

              {{-- <nav aria-label="Page navigation example" style="margin-left: auto;">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav> --}}
              
                {{-- {!!$tasks->links()!!} --}}
                {{-- {{ $tasks->links() }} --}}
              
            {{-- <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sr.#</th>
                    <th scope="col">Task Name
                        <span class="float-right">
                            <i class="fa fa-arrow-up"></i>
                            <i class="fa fa-arrow-down"></i>
                        </span>
                    </th>
                    <th scope="col">Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Assigned to</th>
                    <th scope="col">Task Start Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last Updated On</th>
                    <th scope="col" allign="center">Actions</th>
                  </tr>
                </thead>
                <tbody id="task_table">
                    
                </tbody>
              </table>                             --}}
             
</x-layout>                      
{{-- title="{{$task->task_description}}class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
    rounded-md px-3 py-2 text-sm font-medium text-gray-300 " --}}
