<x-main>
    <div class="my-3">
        <center><button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Espandi/Nascondi
        </button></center>
    </div>
    
    <h4 class="text-center text-danger my-3"><u> Dettaglio Articolo</u></h4>
    <div class="container-d-lg-flex">
        <div class="col-12 d-inline-flex justify-content-evenly">
            <div class="card p-3" style="width: 22rem;">
                <center><img class ="img-fluid  my-2" src="{{Storage::url($article->image)}}" /></center>
              <div class="card-body">
                <h5 class="card-title">{{$article->description}}</h5>
                <center><a href="{{route('articles.index')}}" class="btn btn-danger mt-3">Indietro</a></center>
              </div>
            </div>
        </div>
    </div>

</x-main>