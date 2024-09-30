<!-- Modal -->
<div id="descModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Full Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="word-wrap: break-word;">
                <p id="full-description"></p>
            </div>
        </div>
    </div>
</div>


<table class="table">
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
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">{{$task->task_id}}</th>
                <td>{{ $task->task_name}}</td>

                <td style="cursor: pointer;"><button type="button" data-description="{{ $task->task_description }}" class="description"  data-bs-toggle="modal" data-bs-target="#descModal">{{Str::limit($task->task_description,10)}}</button></td>
                <td>{{$task->priority}}</td>
                <td >{{ Carbon\Carbon::parse($task->deadline)->format('m/d/Y h:i A') }}</td> 
                
                  @foreach($task->users as $user)
                    <td>{{$user->name}}</td>                           
                  @endforeach
                
                {{-- <td>{{$task->users}}</td> --}}
                <td >{{ Carbon\Carbon::parse($task->created_at)->format('m/d/Y h:i A') }}</td>
                <td >{{$task->current_status}}</td>
                <td style="opacity: 0.5;">Not Started</td>
                <td >{{ Carbon\Carbon::parse($task->updated_at)->format('m/d/Y h:i A') }}</td>
                {{-- <td >{{$task->deadline}}</td> --}}

                 @foreach($task->comments as $user)
                                                            
                @endforeach  
                {{-- hover:bg-gray-700 hover:text-white --}}
                <td><button type="button" class="id" data-id="{{$task->task_id}}" data-bs-toggle="modal" data-bs-target="#actionModal">EDIT</button></td>
            </tr>
        @endforeach
    </tbody>
  </table> 
