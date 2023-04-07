<x-main>

    <x-success />

    @foreach($categories as $category)
    <div class="container-md">
        <div class="modal-title my-3">{{$category['name']}} 
            <span><a href="{{route('categories.edit', $category)}}"><img src="https://cdn-icons-png.flaticon.com/512/5996/5996831.png" width="25" height="25"></a></span> 
            <form class="d-inline" id="delete-form-{{$category['id']}}" action="{{route('categories.destroy', $category)}}" method="POST">
                @csrf
                @method('DELETE') 
                <span>
                    <a href="#" id="deleteform" onclick="event.preventDefault(); document.getElementById('delete-form-{{$category['id']}}').submit();">
                        <img src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" width="25" height="25">
                    </a>
                </span> 
            </form>           
        </div>
    </div>    
    @endforeach

    <div class="container-md my-3">
        <center> <a class="btn btn-success" href="{{route('categories.create')}}" role="button">Crea Categorie</a></center>
    </div>    


    <div class="title text-center text-danger mb-4">
        <h2><u>Lista Articoli e categorie collegate</u></h2>
    </div>

    @foreach ($categories as $category)
        @foreach ($category->articles as $article)
        @if ($article->user_id === auth()->user()->id)
        <div class="container-md">
            <div class="modal-title text-center my-3"><span class="text-primary">CATEGORIA: {{$category['name']}} |</span> <span class="text-success">TITOLO:{{$article['title']}}</span> </div>
        </div>
        @endif            
        @endforeach
    @endforeach



</x-main>