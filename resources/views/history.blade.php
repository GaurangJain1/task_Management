<x-layout>
    <x-slot:heading>
        History PAGE
    </x-slot:heading>
    {{-- <?php print_r($users)?> --}}
    @if($tasks)
@foreach ($tasks as $item)
{{ $item->task_id}}

{{ $item->task_name}}
<br>
@endforeach

@endif
    
</x-layout>
{{-- ->task_name --}}
