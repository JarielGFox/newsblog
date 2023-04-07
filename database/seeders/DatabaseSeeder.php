<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Requests\StoreTicketRequest;
use Illuminate\Database\Seeder;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->tickets();
    }

    private function tickets() 
    {

        Ticket::create([
            'title' => 'Articolo non salvato',
            'category' => 'Errore tecnico',
            'status' => 'open',
            'message' => 'Non riesco a salvare gli articoli',
            'archived' => 0
        ]);

        Ticket::create([
            'title' => 'Accesso fallito a gestione',
            'category' => 'Errore tecnico',
            'status' => 'open',
            'message' => 'Accesso non possibile a gestione utenti',
            'archived' => 0
        ]);

        Ticket::create([
            'title' => 'Articolo non cancellato',
            'category' => 'Malfunzionamento',
            'status' => 'closed',
            'message' => 'Non riesco a cancellare gli articoli',
            'archived' => 0
        ]);

        Ticket::create([
            'title' => 'Articolo non modificato',
            'category' => 'Malfunzionamento',
            'status' => 'closed',
            'message' => 'Non riesco ad editare gli articoli',
            'archived' => 0
        ]);

    }
}
