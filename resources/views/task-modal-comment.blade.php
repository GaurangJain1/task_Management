<div class="col-span-full">
    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">All Messages!</label>
@if (isset($taskComments[0]->comments[0]))
@php
$n= count($taskComments[0]->comments) - 1;
$m = 0;
@endphp
  <div class="mt-2">
    <textarea id="messages" name="messages" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-lg ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" > @while($n>=$m)->{{$taskComments[0]->comments[$m]->comment}}-{{($taskComments[0]->comments[$m++]->created_at->format('m/d/Y h:i A'))}}
       @endwhile
    </textarea>
    {{-- @php
        $n--;
    @endphp --}}
</div>

@else

<div class="mt-2">
  <textarea id="messages" name="messages" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-lg ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="No Conversation!" ></textarea>
</div>
{{-- <p class="mt-3 text-sm leading-6 text-gray-600">Please provide a short summary of the task.</p> --}}
@endif
<div class="sm:col-span-4">
    <div class="mt-2">
      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
        <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm" ><label for="commenting" class="block text-sm font-medium leading-6 text-gray-900">Send message!! </label></span>
        <input type="text" name="comment" id="comment" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 shadow-lg  bg-body-tertiary rounded placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Type a message!" > 
        <button id ="send-comment" data-backdrop="false" type= "submit" class="rounded-md bg-green-600 ml-1 px-3 py-1 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
          <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>