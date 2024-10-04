


  {{-- <div class="modal-dialog" role="document">
      <div class="modal-getAllUser" style="margin-left: -129px;width:150%;">
          <div class="modal-header">
              <h5 class="modal-title">All Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body" style="word-wrap: break-word;">
              
              <form  id="submitform">
                  @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-getAllUser" style="margin-left: -129px;width:150%;">
                            <div class="modal-header">
                                <h5 class="modal-title">All Detailssssssssssss</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="word-wrap: break-word;">
                                
                                <form  id="submitform">
                                    @csrf --}}
                                    @csrf
                                    @method('POST')
                                      <div class="border-b border-gray-900/10 pb-12" >
                                        <h2 class="text-base font-semibold leading-7 text-gray-900">Task Details</h2>  
                                        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be used to create task. You can also Edit it afterwards.</p>
                                  
                                        {{-- {{-- <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"> --}}
                                          {{-- <div class="sm:col-span-4"> --}}
                                            <label for="taskid" class="block text-sm font-medium leading-6 text-gray-900">Task id</label>
                                            {{-- <p id="task-id"></p> --}}
                                            <input type="text" name="taskid" id="task-id" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$taskDetail[0]->task_id}}" >

                                            
                                          <div class="sm:col-span-4">
                                            <label for="taskname" class="block text-sm font-medium leading-6 text-gray-900" >Task Name</label>
                                            <div class="mt-2">
                                              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"></span>
                                                <input type="text" name="taskname" id="taskname" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$taskDetail[0]->task_name}}" >
                                              </div>
                                            </div>
                                          </div>
                                  
                                          <div class="col-span-full">
                                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Task Description</label>
                                            <div class="mt-2">
                                              <textarea id="about" name="desc" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >{{$taskDetail[0]->task_description}}</textarea>
                                            </div>
                                            <p class="mt-3 text-sm leading-6 text-gray-600">Please provide a short summary of the task.</p>
                                          </div>
                                          <div class="sm:col-span-4">
                                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Task Status</label>
                                            <div class="mt-2">
                                              <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm" ></span>
                                                <input type="text" name="taskstatus" id="taskstatus" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="" value="{{$taskDetail[0]->current_status}}">
                                              </div>
                                            </div>
                                          </div>
                                          @if(isset($taskDetail[0]->users[0]))
                                                <div class="sm:col-span-3">
                                                  <label for="priority" class="block text-sm font-medium leading-6 text-gray-900">Select User to Assign!!</label>
                                                  <div class="mt-2">
                                                    <select id="role" name="Role" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" value="{{$taskDetail[0]}}">

                                                      {{-- <option >PLZ SELECT</option> --}}
                                                      @foreach($getAllUser as $users)
                                                        <option  value="{{ $users->id }}" @if($taskDetail[0]->users[0]->id === $users->id) {{ 'selected' }} @endif>{{$users->name}}</option>
                                                        {{-- <option {{ $product->source_id == $source->id ? 'selected' : '' }} > {{ $source->name }} </option> --}}
                                                        {{-- <option {{{{$taskDetail[0]->users[0]->name}} == '{{$users->name}}' ? 'selected' : '' }}>{{$users->name}}</option> --}}
                                                      @endforeach
                                                    </select>
                                                  </div>
                                           
                                          @endif       
                                          </div>
                                          <div class="col-span-full">
                                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Attach File</label>
                                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                              <div class="text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" taskDetail="currentColor" aria-hidden="true">
                                                  <path taskDetail-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                </svg>
                                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-900">
                                                    <span>Upload a file</span>
                                                    <input id="file-upload" name="file_upload" type="file" class="sr-only">
                                                  </label>
                                                  <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs leading-5 text-gray-600">TXT, PNG, JPG, GIF up to 10MB</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                            <div class="sm:col-span-3">
                                              <label style="padding: 15px;"for="priority" class="block text-sm font-medium leading-6 text-gray-900">Priority</label>
                                              <div class="mt-2" style="padding: 10px;">
                                                <select id="priority" name="priority" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" ">
                                                  <option {{ $taskDetail[0]->priority == 'High' ? 'selected' : '' }}>High</option>
                                                  <option {{ $taskDetail[0]->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                                                  <option {{ $taskDetail[0]->priority == 'Low' ? 'selected' : '' }}>Low</option>
                                                </select>
                                              </div>
                                            </div>
                                                <div>
                                                
                                                  <p style="padding: 12px;">Due Date: <input  type="text" name ="enddate" id="datepicker1" style="background-color: gainsboro;" value="{{$taskDetail[0]->deadline}}"></p>
                                                  <p style="padding: 12px;">Task Creates At: <input type="text" name ="enddate" id="createdate" style="background-color: gainsboro;" value="{{$taskDetail[0]->created_at}}"></p>
                                                </div>
                                            <label class = "roleminus" for="roleminus">
                                                <input type="checkbox" name="rolem" id="" value ="Assignee" >
                                                <box-icon name='user'></box-icon>
                                                Task Completed?
                                            </label>
                                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                              {{-- <button id="close" type="button" class="text-sm font-semibold leading-6 text-gray-900">Seen!</button> --}}
                                              {{-- <button type="submit" class="rounded-md bg-green-300 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-100">Close!</button> --}}
                                              <button id ="edit" type= "submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Make Changes!</button>
                                            </div>
                                          {{-- </form>
                                        </div>
                            <div class="task_description">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    
                          
                {{-- <div class="task_description">
                    <p></p> --}}
                {{-- </div>
            </div>
        </div> --}}
    
