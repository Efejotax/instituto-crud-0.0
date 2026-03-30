<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokeApiService
{
    protected string $baseUrl = 'https://pokeapi.co/api/v2';

    public function listPokemon(int $limit = 20, int $offset = 0): array
    {
        $response = Http::get("{$this->baseUrl}/pokemon", [
            'limit' => $limit,
            'offset' => $offset,
        ]);

        $response->throw(); // lanza excepción si falla

        return $response->json()['results'];
    }

    public function getPokemon(string $name): array
    {
        $response = Http::get("{$this->baseUrl}/pokemon/{$name}");

        $response->throw();

        return $response->json();
    }
}
