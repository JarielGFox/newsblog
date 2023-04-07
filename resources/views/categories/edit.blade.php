<x-main>

    <div class="container py-4">
        <form action="{{route('categories.update', $category)}}" method="POST">
            @csrf

            @method('PUT')

          @if($errors->all())
            <div class="alert alert-danger mt-5">
                    @foreach ($errors->all() as $error)
                        <span>{{$error}}</span><br>
                    @endforeach  
            </div>
          @endif

          

          <div class="title mb-4">
            <h2>Modifica di Categoria</h2>
          </div>

    <div class="mb-3">
        <label class="form-label">Nome categoria</label>
        <input class="form-control @error ('category') is-invalid @enderror" type="text" placeholder="nome categoria" name="name" maxlength="75" value="{{old('name',$category->name)}}"/>
        @error('category') <span class="text-danger small">{{$message}}</span>@enderror
    </div>

    <div class="d-grid">
        <button class="btn btn-primary btn-lg" type="submit">Modifica</button>
      </div>
  
    </form>
  
</div>

</x-main>