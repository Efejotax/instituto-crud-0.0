<x-layouts.layout>
    <h1 class="text-accent flex justify-center text-5xl mb-10 mt-10 pt-4">Potencia usando 2 números: Base y exponente</h1>
    <div>
        <form action="/potenciar" method="POST" class="text-accent-content/30 myCard">
            @csrf
            <label for="base" class="bg-accent text-gray-800 p-5 border-4 border-cyan-600 text-2xl">Num1: Base</label>
            <input type="number" name="num1" id="num1" required class="bg-amber-400 text-black p-5 border-4" placeholder="Introduce un número">
            <br>
            <label for="exponente" class="bg-accent text-gray-800 p-5 border-4 border-cyan-600 text-2xl">Num2: Exponente</label>
            <input type="number" name="num2" id="num2" required class="bg-amber-400 text-black  p-5 border-4" placeholder="Introduce un número">
            <br>
            <button type="submit" class="text-gray-900 cursor-pointer boton block p-6 ml-4">Potenciar</button>
        </form>
        <br>
    </div>
    @if(isset($resultado))
        <h2 class="text-gray-300 text-4xl bg-amber-700 flex justify-center p-8">Resultado de la potencia: &nbsp; <span class="text-white text-4xl ">{{$resultado}}</span></h2>
    @endif
</x-layouts.layout>
