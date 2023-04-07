<x-main>

    <div class="container py-4">
        <form action="{{route('categories.store')}}" method="POST">
            @csrf

          @if($errors->all())
            <div class="alert alert-danger mt-5">
                    @foreach ($errors->all() as $error)
                        <span>{{$error}}</span><br>
                    @endforeach  
            </div>
          @endif

          <x-success />

          <div class="title mb-4">
            <h2>Creazione di Categoria</h2>
          </div>

    <div class="mb-3">
        <label class="form-label">Nome categoria</label>
        <input class="form-control @error ('category') is-invalid @enderror" type="text" placeholder="nome categoria" name="name" maxlength="75" value="{{old('category')}}"/>
        @error('category') <span class="text-danger small">{{$message}}</span>@enderror
    </div>

    <div class="d-grid">
        <button class="btn btn-primary btn-lg" type="submit">Invia</button>
      </div>
  
    </form>

    <div class="container-md my-3">
        <center> <a class="btn btn-secondary" href="{{route('categories.index')}}" role="button">Visualizza categorie</a></center>
    </div>

    <div class="container-md my-3">
        <center> <a class="btn btn-success" href="{{route('articles.create')}}" role="button">Torna a creazione articoli</a></center>
    </div>

   </div>


</x-main>