<x-main>

    <div class="container py-4">
        <form action="{{route('store-article')}}" method="POST" enctype="multipart/form-data">
          @csrf

          @if($errors->all())
            <div class="alert alert-danger mt-5">
                    @foreach ($errors->all() as $error)
                        <span>{{$error}}</span><br>
                    @endforeach  
            </div>
          @endif

          @if (session('success'))
          <div class="text-success mb-3">
            {{session('success')}}
          </div>
          @endif

          <div class="title mb-4">
            <h2>Articoli a Raffica</h2>
          </div>

          <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input class="form-control @error ('title') is-invalid @enderror" type="text" placeholder="titolo articolo" name="title" maxlength="150" value="{{old('title')}}"/>
            @error('title') <span class="text-danger small">{{$message}}</span>@enderror
          </div>
      
          <!--  -->
          <div class="mb-3">
            <label class="form-label">Seleziona Categoria:</label>
            <div>
            @foreach($categories as $category)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
                @if (old('categories'))
                  @if(in_array($category->id, old('categories')))
                    checked
                  @endif
                @endif>
                <label class="form-check-label">
                  {{ $category->name }}
                </label>
              </div>
            @endforeach     
          </div>  
          </div>
        <!--  -->
          <div class="mb-3">
            <label class="form-label">Autore</label>
            <input class="form-control  @error ('author') is-invalid @enderror" type="text" placeholder="autore" name="author" maxlength="75" value="{{old('author')}}"/>
            @error('author') <span class="text-danger small">{{$message}}</span>@enderror
          </div>
          <!-- -->
          <div class="mb-3">
            <label class="form-label" >Descrizione</label>
            <textarea class="form-control @error ('description') is-invalid @enderror" type="text" placeholder="scrivi articolo" style="height: 10rem;" name="description" maxlength="5000" value="{{old('description')}}"></textarea>
            @error('description') <span class="text-danger small">{{$message}}</span>@enderror
          </div>
          <!--  -->
          <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" id="image">
          </div>
      
          <!--  -->
          <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Invia</button>
          </div>
      
        </form>
      
        <div class="container-md my-3">
         <center> <a class="btn btn-success" href="{{route('categories.create')}}" role="button">Crea Categorie</a></center>
        </div>
    </div>


</x-main>