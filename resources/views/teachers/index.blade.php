<x-layouts.layout>
    <x-crud
        resource="teachers"
        :filas="$teachers"
        :campos="['name' => 'Nombre',
                  'surname' => 'Apellido',
                  'address' => 'Dirección',
                  'email' => 'Correo',
                  'phone' => 'Teléfono',
                  'birthday' => 'fecha nac',
                  'department' => 'departamento'
                  ]" />
</x-layouts.layout>
<table>
    <tr>
        <th>Nombre</th>
        .....
    </tr>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{$teacher->name}}</td>
            ....
        </tr>

    @endforeach
</table>
