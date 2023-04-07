<x-main>

    <x-success />

    <div class="title text-center text-primary bg-gradient mb-4">
        <h2><u>Crea il tuo ticket</u></h2>
    </div>

<div class="container-sm mt-3">
    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{route('tickets.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @error('title') <span class="small text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="category">Categoria</label>
                        <select name="category" class="form-select">
                            <option value="Errore generico">Errore generico</option>
                            <option value="Malfunzionamento">Malfunzionamento</option>
                            <option value="Visualizzazione">Visualizzazione</option>
                            <option value="Registrazione">Registrazione</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="message">Messaggio</label>
                        <textarea type="text" name="message" id="message" class="form-control" rows="4" cols="50"></textarea>
                        @error('message') <span class="small text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="image">Screenshot Errore</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col-12">
                        <center><button type="submit" class="btn btn-success bg-gradient my-2">Invia Ticket</button></center>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>

</x-main>