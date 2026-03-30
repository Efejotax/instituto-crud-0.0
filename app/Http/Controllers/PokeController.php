<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokeController extends Controller
{
    public function index()
    {
        // Ejemplo: obtener los primeros 20 Pokémon
        $response = Http::get('https://pokeapi.co/api/v2/pokemon', [
            'limit' => 20,
        ]);

        if (! $response->successful()) {
            // Manejo simple de error
            abort(502, 'Error al conectar con PokeAPI');
        }

        $pokemons = $response->json()['results']; // nombre y url de cada Pokémon

        return view('pokemon.index', compact('pokemons'));
    }

    // Si quieres un Pokémon concreto por nombre o id, podrías añadir otro métod:
    public function show(string $name)
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}");

        if (! $response->successful()) {
            abort(404, 'Pokémon no encontrado');
        }

        $pokemon = $response->json();

        return view('pokemon.show', compact('pokemon'));
    }

}
