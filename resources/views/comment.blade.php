<x-layout>
    <x-slot:heading>
        Comments
    </x-slot:heading>
    @foreach($data as $comment)
    <br>
    <br>
    <br>
        {{$comment}}
    @endforeach
</x-layout>