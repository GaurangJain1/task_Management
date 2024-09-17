<x-layout>
    <x-slot:heading>
        History PAGE
    </x-slot:heading>
    {{-- <?php print_r($users)?> --}}
    {{-- @if($tasks) --}}
@foreach ($data as $item)
{{ $item->task_id}}
<a href="/comment"><button type="button" class="text-gray-500 rounded-md  px-3 py-2 hover:bg-gray-700 hover:text-white
                                            rounded-md px-3 py-2 text-sm font-medium text-gray-300 " data-id="{{$item->task_id}} data-bs-toggle="modal" data-bs-target="#exampleModal">{{ $item->task_name}}</button></a>


<br>
@endforeach

{{-- @endif --}}
    
</x-layout>
{{-- ->task_name --}}
