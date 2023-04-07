<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Mail\InfoMail;
use App\Models\Article;
use App\Models\Property;
use App\Models\Stat;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Category;

class PageController extends Controller
{

    public function welcome()
    {

        $articles = Article::All();
        $articles = Article::inRandomOrder()->get();
        $categories = Category::All();


        return view('welcome', ['articles' => $articles], compact('categories'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            "nome" => $request->nome,
            "telefono" => $request->telefono,
            "mail" => $request->mail,
            "messaggio" => $request->messaggio
        ];


        Mail::to('info@email.it')->send(new InfoMail($data));

        return redirect()->route('thank-you');
    }

    public function thankYou()
    {
        return view('grazie');
    }

    public function accountManagement()
    {

        return view('auth.usermanager');
    }

    public function create()
    {

        $categories = Category::orderBy('name', 'asc')->get();

        return view('articles.create', compact('categories'));
    }

    public function index()
    {
        $articles = Article::where('user_id', auth()->user()->id)->paginate(5);
        $categories = Category::All();

        return view('articles.index', ['articles' => $articles], compact('categories'));

        // return view('news', compact('articles')); metodo alternativo per ottenere i campi del DB
    }

    public function newsDetail($id)
    {

        $article = Article::findOrFail($id);

        $articles = Article::all();

        // foreach($articles as $article) {
        //     if($article['id']==$id) {
        //         $data = [
        //         'title'=>'Dettaglio Articoli',
        //         'articles' => $articles
        //         ];
        //         return view('newsdetail', compact('data'));
        //     }

        // }

        return view('newsdetail', compact('article'));
    }

    // public function store(StoreArticleRequest $request) {

    //     $article = new Article();
    //     $article->title = $request->title;
    //     $article->category = $request->category;
    //     $article->description = $request->description;
    //     $article->author = $request->author;

    //     $article->save();

    //     return redirect()->route('type-article')->with(['success' => 'Articolo inserito correttamente']);

    // }

    public function store(StoreArticleRequest $request)
    {

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'user_id' => auth()->user()->id
        ]);

        $article->categories()->attach($request->categories);

        if ($request->hasFile('image') && $request->file('image')->isValid()) { // verifichiamo se l'immagine sia valida

            $picName = $request->file('image')->getClientOriginalName(); // manteniamo nome immagine uguale a quello del client
            $picFormat = $request->file('image')->extension(); // ci assicuriamo che l'immagine mantenga la sua estensione
            $article->image = $request->file('image')->storeAs('/public/images', $picName . '.' . $picFormat); // specifichiamo il percorso di storage dell'immagine

            $article->save();
        }

        return redirect()->route('articles.create')->with(['success' => 'Articolo inserito correttamente']); // redirect dell'operazione compiuta
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        if ($article->user_id !== auth()->user()->id) {
            abort(403);
        }

        return view('articles.edit', compact('categories', 'article'));
    }

    public function update(Request $request, Article $article)
    {

        if ($article->user_id !== auth()->user()->id) {
            abort(403);
        }

        $article->fill($request->all())->save();

        $article->categories()->detach();

        $article->categories()->attach($request->categories);

        if ($request->hasFile('image') && $request->file('image')->isValid()) { // verifichiamo se l'immagine sia valida

            $picName = $request->file('image')->getClientOriginalName(); // convertiamo nome immagine con quello del titolo
            $picFormat = $request->file('image')->extension(); // ci assicuriamo che l'immagine mantenga la sua estensione
            $article->image = $request->file('image')->storeAs('public/images', $picName . '.' . $picFormat); // specifichiamo il percorso di storage dell'immagine


        }

        $article->save();

        return redirect()->route('articles.index')->with(['success' => 'Articolo modificato']);
    }




    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        if ($article->user_id !== auth()->user()->id) {
            abort(403);
        }

        return redirect()->route('articles.index')->with(['success' => 'Articolo cancellato']);
    }
}
