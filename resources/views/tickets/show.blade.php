<x-main>

<div class="container-sm my-3">
    <center><h3>{{$ticket['title']}}</h3></center>
    <div>Ticket status: {{$ticket->status}}</div>
    <div class="">{{$ticket->message}}</div>
    <center><img src="{{Storage::url($ticket->image)}}"></center>
</div>

</x-main>