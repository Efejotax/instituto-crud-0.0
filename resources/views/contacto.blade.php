<x-layouts.layout>
    <h1 class="bg-accent text-4xl flex justify-center p-8">Contacto</h1>
    <!-- resources/views/contacto.blade.php -->
    <form action="{{ route('contacto') }}" method="POST" class="max-w-md mx-auto p-4 bg-white shadow-md rounded-lg">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Contacta con nosotros</h2>

        <div class="mb-4">
            <label class="block text-gray-700">Nombre</label>
            <input type="text" name="nombre" class="w-full mt-2 p-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full mt-2 p-2 border rounded-md" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Mensaje</label>
            <textarea name="mensaje" class="w-full mt-2 p-2 border rounded-md text-olive-800" rows="4" required placeholder="escribe tu mensaje"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
            Enviar
        </button>
    </form>

</x-layouts.layout>
