<x-layout>
    <x-slot:heading>
        Comments
    </x-slot:heading>
    @foreach($data as $comment)
    <br>
    <br>
    <br>
        {{-- {{$comment}} --}}
        <div class="chat">
            <div class="top">
            
                <div class="sender">
                    <p>
                        {{$comment->Sender}}
                        <div class="message">
                            {{$comment->comments}}
                        </div>
                    </p>
                </div>
                

            </div>
            
            <div class="bottom">
                <input type="text" id="message "name="message" placeholder="Enter Comment.." autocomplete="off">
                <button type="submit"></button>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p>
                {{$comment->Receiver}}
                <div class="message">
                    {{$comment->comments}}
                </div>
            </p>
        </div>
    @endforeach
</x-layout>