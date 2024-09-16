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
                                <th scope="col">First
                                    <span class="float-right">
                                        <i class="fa fa-arrow-up"></i>
                                        <i class="fa fa-arrow-down"></i>
                                    </span>
                                </th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Sr.#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $task)
                                    <tr>
                                        <th scope="row">{{$task->task_id}}</th>
                                        <td>{{$task->task_name}}</td>
                                        <td>{{$task->task_description}}</td>
                                        <td>{{$task->priority}}</td>
                                        <td >{{$task->deadline}}</td>
                                        @foreach($task->users as $user)
                                                <div class="name">
                                                    <td>{{$user->name}}</td>
                                                </div>
                                                <div class="mail">
                                                    <td>{{$user->email}}</td>
                                                </div>                                               
                                        @endforeach
                                        <td><button type="button" class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
                                            rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" data-id="2" data-bs-toggle="modal" data-bs-target="#exampleModal">More</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>               
             
</x-layout>                      