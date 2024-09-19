<x-layout>
    <x-slot:heading>
        HOME PAGE FOR ADMIN
    </x-slot:heading>
    
    <br>
    <br>
    <h2>Table Task is Displayed</h2>
    <br>
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

    
    <div id="actionModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">All Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="word-wrap: break-word;">
                    <p id="full-id"></p>
                </div>
                <div class="task_description">
                    <p></p>
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
                    @foreach($data as $task)
                        <tr>
                            <th scope="row">{{$task->task_id}}</th>
                            <td>{{ $task->task_name}}</td>

                            <td style="cursor: pointer;"><button type="button" data-description="{{ $task->task_description }}" class="description"  data-bs-toggle="modal" data-bs-target="#descModal">{{Str::limit($task->task_description,10)}}</button></td>
                            <td>{{$task->priority}}</td>
                            <td >{{ Carbon\Carbon::parse($task->deadline)->format('m/d/Y h:i A') }}</td> 
                            @foreach($task->users as $user)
                                <td>{{$user->name}}</td>                           
                            @endforeach
                            <td >{{ Carbon\Carbon::parse($task->created_at)->format('m/d/Y h:i A') }}</td>
                            {{-- <td >{{$task->current_status}}</td> --}}
                            <td style="opacity: 0.5;">Not Started</td>
                            <td >{{ Carbon\Carbon::parse($task->updated_at)->format('m/d/Y h:i A') }}</td>
                            {{-- <td >{{$task->deadline}}</td> --}}

                            {{-- <td style="opacity: 0.5;">Emp</td>
                            <td style="opacity: 0.5;">00/00/0000</td>
                            <td style="opacity: 0.5;">Not Started</td>
                            <td style="opacity: 0.5;">00/00/0000</td> --}}

                            @foreach($task->comments as $user)
                                    {{-- {{$user->created_at}} --}}
                                    {{-- <div class="name">
                                        <td>{{$user->created_at}}</td>
                                    </div> --}}
                                    {{-- <div class="mail">
                                        @if(empty($user->email))
                                            <td style="opacity: 0.5;">Not Assigned!</td>
                                        @else
                                            <td>{{$user->email}}</td>
                                        @endif
                                    </div>
                                    @foreach($user->getrole as $role)  
                                    <div class="role">
                                        <@if(empty($role->Role))
                                             <td style="opacity: 0.5;">Not Asssigned!</td>
                                        @else
                                            <td>{{$role->Role}}</td>    
                                        @endif
                                    </div>  
                                    @endforeach                                             --}}
                            @endforeach
                            {{-- hover:bg-gray-700 hover:text-white --}}
                            <td><button type="button" class="id" data-id="{{ $task->users}}" data-bs-toggle="modal" data-bs-target="#actionModal">More</button></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>               
             
</x-layout>                      
{{-- title="{{$task->task_description}}class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
    rounded-md px-3 py-2 text-sm font-medium text-gray-300 " --}}