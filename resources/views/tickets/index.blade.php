<x-main>
 
       <x-success />

    {{$title ?? null}}

    <div class="container-sm my-2">
        <div class="col-12">
          @foreach ($tickets as $ticket)
            <div class="card border-success p-1 my-3 m-auto" style="width: 500px;">
              <h5 class="card-title text-center text-primary emphasis">{{$ticket['title']}}</h5>
              <h5 class="card-title text-center text-darkorange emphasis">{{$ticket['created_at']}}</h5>
              <h5 class="card-title text-center"><span class="text-secondary">Status:</span> @if($ticket['status'] === 'open')
                <span class="text-success">{{$ticket['status']}}</span>
                @elseif ($ticket['status'] === 'closed')
                <span class="text-danger">{{$ticket['status']}}</span>
                </h5>
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center text-success emphasis my-3">{{$ticket['category']}}</h5>
                    <h5 class="card-title text-center text-danger emphasis my-3"><span class="text text-dark">Autore: </span>{{$ticket->user ? $ticket->user->name : ''}}</h5>
                    {{-- {{$ticket->user?->name}} versione abbreviata --}}

                    <div name="button-container" class="d-flex justify-content-center">
                      <a href="{{route('tickets.show', $ticket['id'])}}" class="btn btn-warning mt-2">Dettaglio</a>
                      <form id="delete-form-{{$ticket['id']}}" action="{{route('tickets.destroy', $ticket)}}" method="POST">
                        @csrf
                        @method('DELETE') 
                        <button id="deleteform" type="submit" class="btn btn-danger mt-2 mx-2">Cancella</button>
                      </form>   
                    </div>
                  </div>
            </div>
          @endforeach
    </div>

</x-main>