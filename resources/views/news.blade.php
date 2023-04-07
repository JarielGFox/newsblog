<x-main>
    
    <div class="container-fluid my-2">
        <div class="col">
          @foreach ($articles as $article)
            <div class="card border-danger p-2 my-3" style="width: 97vw;">
              <h5 class="card-title text-center text-primary emphasis">{{$article['title']}}</h5>
              <div class="card-body">
                <h5 class="card-title text-center text-success emphasis my-3">{{$article['author']}}</h5>
                <center><a href="{{route('news-detail',['id'=>$article['id']])}}" class="btn btn-danger mt-2">Dettaglio</a></center>
              </div>
            </div>
          @endforeach
        
          <div class="title">
            {{$articles->links()}}
          </div>

</x-main>