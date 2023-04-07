<form wire:submit.prevent="store">
    <div class="row-6">
        <div class="col mx-auto">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            @endif
            </div>
            <div class="row g-2">
                <div class="class col-12">
                    <label for="name">Nome</label>
                    <input type="text" id="name" class="form-control" wire:model.lazy="user.name">
                    @error('user.name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="class col-12">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" wire:model.lazy="user.email">
                    @error('user.email') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="class col-12">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" wire:model.lazy="password">
                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-12">
                    <center><button class="btn btn-primary my-3 d-inline">Salva</button></center>
                </div>
            </div>
        </div>
    </div>
</form>