<x-main>
  
    <x-success />


    <div class="container-fluid my-2">
        <div class="col">
          @foreach ($articles as $article)
            <div class="card border-danger p-2 my-3" style="width: 97vw;">
              <h5 class="card-title text-center text-primary emphasis">{{$article['title']}}</h5>
                <div class="card-body">
                    <h5 class="card-title text-center text-success emphasis my-3">{{$article['category_id']}}</h5>
                    @foreach ($article->categories as $category)
                    <h5 class="card-title text-center text-danger emphasis my-3">{{$category->name}}</h5>
                    @endforeach
                    <h5 class="card-title text-center text-success emphasis my-3">{{$article['author']}}</h5>
                    <center><a href="{{route('news-detail',['id'=>$article['id']])}}" class="btn btn-danger mt-2">Dettaglio</a></center>
                    <center><a href="{{route('articles.edit', $article)}}" class="btn btn-secondary mt-2">Modifica</a></center>
                    <form class="d-inline" id="delete-form-{{$article['id']}}" action="{{route('articles.destroy', $article)}}" method="POST">
                      @csrf
                      @method('DELETE') 
                      <center><span>
                          <button type="submit" class="border-0">
                            <img id="deleteform" src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" width="25" height="25">
                          </button>
                      </span></center>
                  </form>         
                </div>
            </div>
          @endforeach
        
            <div class="title">
                {{$articles->links()}}
            </div>
        </div>
    </div>

</x-main>