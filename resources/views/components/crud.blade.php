<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@props([
    'resource'=>"",
    'campos'=>[],
    'filas'=>[],
    'page'=>$_GET['page']??1
])

<a href="{{route("$resource.create")}}"
   class="btn btn-primary mb-4 shadow-md hover:shadow-lg transition">
    Añadir {{ strtoupper($resource) }}
</a>

<div class="flex justify-center">
    <div class="overflow-x-auto w-full max-w-[95vw] shadow-lg rounded-xl border border-gray-300 bg-white">

        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-200 text-gray-800 border-b">
            <tr class="text-base">
                @foreach($campos as $campo)
                    <th class="px-4 py-3 font-semibold text-left whitespace-nowrap">
                        {{ $campo }}
                    </th>
                @endforeach
                <th colspan="3" class="px-4 py-3 font-semibold text-center">
                    Acciones
                </th>
            </tr>
            </thead>

            <tbody class="text-gray-900">
            @foreach($filas as $fila)
                <tr class="border-b hover:bg-gray-100 transition">

                    @foreach($campos as $atributo => $valor)
                        <td class="px-4 py-2 whitespace-nowrap">
                            {{ $fila->{$atributo} }}
                        </td>
                    @endforeach

                    {{-- BORRAR --}}
                    <td class="px-4 py-2 text-center">
                        <form action="{{route("$resource.destroy",$fila->id)}}?page={{$page}}" method="POST"
                        onsubmit="return confirmarDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-sm text-white">
                                Borrar
                            </button>
                        </form>

                    </td>

                    {{-- EDITAR --}}
                    <td class="px-4 py-2 text-center">
                        <a href="{{route("$resource.edit", $fila->id)}}?page={{$page}}"
                           class="btn btn-info btn-sm text-white">
                            Editar
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $filas->links() }}
        </div>
    </div>
</div>

<script>
    function confirmarDelete(e){
        e.preventDefault();

        Swal.fire({
            title: "¿Seguro que quieres borrar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, borrar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log("Enviando formulario…");
                e.target.submit();
                //button.closest('form').submit()
            }
        });
        return false;
    }
</script>
