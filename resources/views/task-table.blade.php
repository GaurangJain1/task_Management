{{-- table-striped --}}

    
  <table id="example" class="table" style="width:100%">
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
            <th scope="col">Status(marked by Assignee)</th>
            <th scope="col">Last Updated On</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
    <tbody>
        @foreach($tasks as $task)
            <tr @if($tasks[0]->stature->stature == "Hold!"){style="background-color: #f5e237;"}@endif>
                <th scope="row">{{$task->task_id}}</th>
                <td>{{ $task->task_name}}</td>

                <td style="cursor: pointer;"><button type="button" data-description="{{ $task->task_description }}" class="description" id="desc"  data-bs-toggle="modal" data-bs-target="#descModal">{{Str::limit($task->task_description,10)}}</button></td>
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
                <td >{{ Carbon\Carbon::parse($task->updated_at)->format('m/d/Y h:i A') }}</td>
                {{-- <td >{{$task->deadline}}</td> --}}

                 @foreach($task->comments as $user)
                                                            
                @endforeach  
                {{-- hover:bg-gray-700 hover:text-white 'show-tasktable?page=2'--}}
                <td><button type="button" class="id" data-id="{{$task->task_id}}" data-bs-toggle="modal" data-bs-target="#actionModal"  data-backdrop="false">EDIT</button></td>
            </tr>
            
        @endforeach
        
       
    </tbody>
    <tr class="exam_pagin_link">
      {{-- {{$tasks->links()}} --}}
      {{-- <td colspan="6" style="align: center"> {{$tasks->links()}}</td> --}}
      
      {{-- {{ $tasks->appends(Request::all())->links() }} --}}
    </tr>
</table>
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
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> --}}

  
