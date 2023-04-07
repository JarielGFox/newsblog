<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use \App\Mail\NewTicket;

class TicketController extends Controller
{

    private $tickets;

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::All();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->user_id = auth()->user()->id; // prendiamo l'user autenticato
        $ticket->category = $request->category;
        $ticket->message = $request->message;
        $ticket->status = 'open';
        $ticket->archived = 0;


        if ($request->hasFile('image') && $request->file('image')->isValid()) { // verifichiamo se l'immagine sia valida

            $picName = $request->file('image')->getClientOriginalName(); // convertiamo nome immagine con quello del titolo
            $picFormat = $request->file('image')->extension(); // ci assicuriamo che l'immagine mantenga la sua estensione
            $ticket->image = $request->file('image')->storeAs('public/img', $picName . '.' . $picFormat); // specifichiamo il percorso di storage dell'immagine
        }

        $ticket->save();

        // Qui invio la mail, vicino Mail, possiamo usare il metodo to() per scegliere a chi inviare la mail, magari ricavandolo dinamicamente.

        // Mail::send(new NewTicket($ticket->title, $ticket->message)); 

        return redirect()->route('tickets.create')->with(['success' => 'Ticket inserito correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {


        // // Retrieve the ticket with the given ID from the database
        // $ticket = Ticket::findOrFail($id);

        // Pass the ticket data to the view
        return view('tickets.show', compact('ticket'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Ticket $ticket)
    // {

    //     return view('tickets.edit', compact('ticket'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Ticket $ticket)
    // {
    //     $ticket->fill($request->all())->save();

    //     return redirect()->route('tickets.index')->with(['success' => 'Ticket modificato']);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with(['success' => 'Ticket cancellato']);
    }
}
