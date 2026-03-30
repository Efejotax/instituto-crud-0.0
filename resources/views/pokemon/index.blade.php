<x-layouts.layout>
<h1 class="text-emerald-950 text-2xl flex justify-center pt-6">Listado de Pokémon</h1>

    <div class="flex justify-center p-16">
<ul class="">
    @foreach ($pokemons as $pokemon)
        <li class="text-gray-900">
            {{ ucfirst($pokemon['name']) }}
            {{-- Enlazamos a la ruta show si la tienes creada --}}
            @if (Route::has('pokemon.show'))
                - <a class="" href="{{ route('pokemon.show', $pokemon['name']) }}">Ver detalles</a>
            @endif
        </li>
    @endforeach
</ul>
    </div>
</x-layouts.layout>
