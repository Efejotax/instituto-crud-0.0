<x-layouts.layout>

<h1 class="text-emerald-950 text-2xl flex justify-center pt-6">Lista de poyectos desde BBDD</h1>

    <table class="table">
        <thead>
        <tr class="text-green-700">
            <th>ID</th>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Horas</th>
            <th>Fecha comienzo</th>
            <th>Fecha final</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr class="text-green-700">
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->hours}}</td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>
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
