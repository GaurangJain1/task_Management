{{-- table-striped --}}

{{-- THIS FILE IS USED FOR DISPLAY TASK TABLE ON WELCOME PAGE --}}

<!-- Modal -->
<div class="modal fade" id="colorinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Color Coading Info!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="info">
          <div class="h-3.5 w-4 mb-2 rounded-full bg-yellow-200"></div>On-Hold!
          <div class="h-3.5 w-4 mb-2 rounded-full bg-orange-500"></div>Re-Assigned!
          <div class="h-3.5 w-4 mb-2 rounded-full bg-emerald-200"></div>In-progress!
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <table id="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th scope="col">Sr.#</th>
            <th scope="col">Task Name<button type="button"  data-bs-toggle="modal" data-bs-target="#colorinfo">
              <img src="https://d3kinlcl20pxwz.cloudfront.net/cart/info-circle.svg" alt="status info"></button>
              {{-- <a data-toggle="modal"  data-bs-target="#colorinfo" >
                
                </a></span> --}}
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
            <th scope="col">Status(marked by Assignee)</th>
            <th scope="col">Last Updated On</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        {{-- @if ($taskDetail[0]->stature->stature == 'Hold!')
        class="h-2.5 w-2.5 rounded-full bg-yellow-500"
    @else
        class="h-2.5 w-2.5 rounded-full bg-yellow-500"
    @endif --}}
    <tbody>
        @foreach($tasks  as $task)
            <tr >
                <th scope="row" >{{$task->task_id}}</th>
                <td>{{$task->task_name}}
                  @if(($task->stature->stature) == 'Hold!')
                          <div class="h-2.5 w-4.5 rounded-full bg-yellow-200"></div>
                  @elseif(($task->stature->stature) == 'Re-Assign!')
                          <div class="h-2.5 w-4.5 rounded-full bg-orange-500"></div>
                  @else
                          <div class="h-2.5 w-4.5 rounded-full bg-emerald-200"></div>
                  @endif
                </td>
                
                {{-- <td style="cursor: pointer;"><button type="button" data-description="{{ $task->task_description }}" class="description" id="desc"  data-bs-toggle="modal" data-bs-target="#descModal">{{Str::limit($task->task_description,10)}}</button></td> --}}
                <td style="cursor: pointer;"><button type="button" class="id" data-id="{{$task->task_id}}" data-bs-toggle="modal" data-bs-target="#actionModal"  data-backdrop="false">{{Str::limit($task->task_description,10)}}</button></td>
                <td>{{$task->priority}}</td>
                <td >{{ Carbon\Carbon::parse($task->deadline)->format('m/d/Y h:i A') }}</td> 
                
                  @if(isset($task->users[0]))  
                      @foreach($task->users as $user)
                        <td>{{$user->name}}</td>
                      @endforeach
                  @else
                      <td style="opacity: 0.5;">User Not Assigned!</td>
                  @endif                        
                  
                {{-- <td>{{$task->users}}</td> --}}
                <td >{{ Carbon\Carbon::parse($task->created_at)->format('m/d/Y h:i A') }}</td>
                <td >{{$task->current_status}}</td>
                {{-- <td style="opacity: 0.5;">Not Started</td> --}}
                <td >{{ Carbon\Carbon::parse($task->updated_at)}}</td>
                {{-- <td >{{$task->deadline}}</td> --}}

                 @foreach($task->comments as $user)
                                                            
                @endforeach  
                {{-- hover:bg-gray-700 hover:text-white 'show-tasktable?page=2'--}}
                <td><button type="button" class="id" data-id="{{$task->task_id}}" data-bs-toggle="modal" data-bs-target="#actionModal"  data-backdrop="false">EDIT</button></td>
            </tr>
            
        @endforeach
        
       
    </tbody>
    <tr class="exam_pagin_link">
      {{-- {{ $tasks->withPath('/welcome')->links() }} --}}
      {{-- <td colspan="6" style="align: center"> {{$tasks->links()}}</td> --}}
      
      {{-- {{ $tasks->appends(Request::all())->links() }} --}}
    </tr>
</table>
{{$tasks->links()}}

{{-- <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="/welcome">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link"  id="new-table">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a                        >style="background-color: #f5e237;"
    </li>
  </ul>
</nav> --}}

  
