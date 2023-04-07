<div class="row">
    @foreach ($users as $user)
        <div class="d-inline text-success mb-5 text-bg-dark text-warning">Utente
            <div class="title text-primary">
                <label class="title text text-secondary">Nome Utente:</label>
                {{$user->name}}
            </div>

            <div class="title text-primary">
                <label class="title text-secondary">E Mail:</label>
                {{$user->email}}
            </div>
            <button class="btn btn-danger" wire:click="delete({{ $user->id }})">Cancella</button>   
            
            {{-- Cancellazione utenti con alert. Tocca fare metodo destroy nel controller --}}
            {{-- <form action="{{route('users.destroy', $user)}}" onsubmit="return confirm('Are you sure to delete the selected user?');" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn danger">Delete</button>
            </form> --}}

            <button class="btn btn-secondary my-2" wire:click="edit({{$user->id}})">Modifica</button>
        </div> 
    @endforeach


    {{-- <div class="title">
        METTI LE PAGINE PER GLI UTENTI
        {{$articles->links()}}
    </div> --}}
</div>
