<?php $a ?>
<x-layout>
    <x-slot:heading>
    Progress PAGE
    </x-slot:heading>
        <h1>This is <b>Progress Of Task </b></h1>
        <br>

    <br>
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Percentage Completed</h5>
                <button type="button" cla   ss="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    {{-- <table>
        <tr>
            <td>task_id  </td>
            <td>percentage_done</td>
            <td>today</td>
            
        </tr>
        @foreach($data as $progress)
        <tr>
            <td>{{$progress->task_id}}</td>
            <td>{{$progress->percentage_done}}</td>
            <td>{{$progress->today}}</td>
            
        </tr>
        @endforeach
    </table> --}}
    <label for="customRange1" class="form-label">Filter on basis of Percentage</label>
        <input type="range" class="form-range" id="customRange1" value="0">
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Task id</th>
            <th scope="col">Percentage_done</th>
            <th scope="col">date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $progress)
          <tr>
            <td>{{$progress->task_id}}</td>
            <td>{{$progress->percentage_done}}
                @if($progress->percentage_done == 100)
                    {{-- <div class="flex-none rounded-full bg-emerald-500/20 p-1"> --}}
                        <div class="h-2.5 w-2.5 rounded-full bg-emerald-500"></div>
                    {{-- </div> --}}
                
                @endif
            </td>
            <td>{{$progress->today}}</td>
            <td><button type="button" class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
                rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" data-id="{{$progress->task_id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button>
                @if($progress->percentage_done == 100)
                <a class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
                rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="false" href="/contact/{{$progress->task_id}} ">
                FEEDBACK
                </a>
                @endif
            
            </td>
            
          </tr>
          @endforeach
         
        </tbody>
    </table>
      {{-- <div class="container">
        <div class="progress">
            <span class="title">{{$progress->task_id}}</span>
            <div class="percentage">
                <span class="percentage-per">
                    <span class="tooltip">{{$progress->percentage_done}}</span>
                </span>
            </div>
        </div>
    </div> --}}
</x-layout>


{{-- {{$progress->task_id}} --}}