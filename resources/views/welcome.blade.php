<x-layout>
    <x-slot:heading>
        HOME PAGE
    </x-slot:heading>
    
    <h1>THIS IS WELCOMEE FILEE!!!!!!!</h1>
    <br>
    <h2>Table Task is Displayed</h2>
    <br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Percentage Completed</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                Update Percentage for Task Id: <p id ="modal-value"></p>
            </div>
            <form action="{{route("updateprogressPost")}}" method="post" id = "update-form  ">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        {{-- <label for=""></label> --}}
                        
                        <input type="text" name ="percentage" class="form-control" placeholder="Update % of task completed">
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id ="#update-data" type="submit" class="btn btn-primary" >Update changes!</button>
                </div>
            </form>
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
                                <th scope="col">End Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Assigned to</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $task)
                                    <tr>
                                        <th scope="row">{{$task->task_id}}</th>
                                        <td>{{$task->task_name}}</td>
                                        <td title="task description only upto 10 characters">{{Str::limit($task->task_description,10)}}</td>
                                        <td>{{$task->priority}}</td>
                                        <td >{{$task->deadline}}</td>
                                        <td style="opacity: 0.5;">Not Assigned!</td>
                                        @foreach($task->users as $user)
                                                <div class="name">
                                                    {{-- @if(!isset($user->name))
                                                        <td style="opacity: 0.5;">Not Assigned!</td>
                                                    @else
                                                        <td>{{$user->name}}</td>
                                                    @endif --}}
                                                    
                                                    <td {{ optional($user)->name ? '' : 'style="opacity: 0.5;"' }}>
                                                        {{ optional($user)->name ?: 'Not Assigned!' }}
                                                    </td>
                                                </div>
                                                <div class="mail">
                                                    @if(collect([$user->emai])->isEmpty())
                                                        <td style="opacity: 0.5;">Not Assigned!</td>
                                                    @else
                                                        <td>{{$user->email}}</td>
                                                    @endif
                                                </div>
                                                @foreach($user->getrole as $role)  
                                                <div class="mail">
                                                    <@if(collect([$role->Role])->isEmpty())
                                                        <td style="opacity: 0.5;">Not Assigned!</td>
                                                    @else
                                                        <td>{{$role->Role}}</td>
                                                    @endif
                                                </div>  
                                                @endforeach                                            
                                        @endforeach
                                        {{-- hover:bg-gray-700 hover:text-white --}}
                                        <td><button type="button" class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
                                            rounded-md px-3 py-2 text-sm font-medium text-gray-300 " data-id="{{$task->task_id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">More</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>               
             
</x-layout>                      