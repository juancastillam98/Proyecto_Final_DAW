<x-app-layout>{{-- x-app-layut importa el nav y el header--}}
    <x-slot name="header">
        <h1>Listado de Puestos</h1>
        <a href="{{ route("puestos.create") }}" class=" btn btn-primary">Añadir un nuevo puesto</a>
        <table>
            <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acción</th>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                    <tr>
                        <td>{{$puesto ->nombre}}</td>
                        <td>{{$puesto ->descripcion}}</td>
                        <td> 
                            <form action="{{ route('puestos.show', ['puesto'=>$puesto->id])}}" method="get">
                                <button class="btn btn-primary" type="submit">Ver</button>
                            </form>
                        </td>
                        <td> 
                            <form action="{{ route('puestos.destroy', ['puesto'=>$puesto->id])}}" method="post">
                                @csrf
                                {{method_field("DELETE")}}
                                <button class="btn btn-danger" type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
