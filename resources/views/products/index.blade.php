<x-layouts.layout>

<h1 class="text-emerald-950 text-2xl flex justify-center pt-6">Lista de productos desde BBDD</h1>

    <table class="table">
        <thead>
        <tr class="text-green-700">
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="text-green-700">
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
           {{--   <td>
                   <a href="{{route('products.show', $product->id)}}">Ver</a>
                   <a href="{{route('products.edit', $producto->id)}}">Editar</a>
                   <form action="{{route('products.destroy', $product->id)}}" method="POST">
                       @csrf
                       @method('DELETE')
                       <button type="submit">Eliminar</button>
                   </form>
               </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>

</x-layouts.layout>
