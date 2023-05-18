<x-app-layout>{{-- x-app-layut importa el nav y el header--}}
    <x-slot name="header">
        <h1>Oferta Empleo {{ $puesto_id->id}}</h1>

        @dump($oferta_solicitudes)
                                    <table>
                                    <thead>
                                        <tr>
                                            <th>Puesto</th>
                                            <th>Ofertas</th>
                                            <th>Total Solicitudes</th>
                                            <th>Ver</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($oferta_solicitudes as $solicitudes)
                                            <tr>
                                                <td>{{$solicitudes ->puesto}}</td>
                                                <td>{{$solicitudes ->oferta}}</td>
                                                <td>{{$solicitudes ->total_solicitudes}}</td>     

                                               {{--  <td>{{$solicitudes ->id_oferta}}</td>   --}}            

                                                <td>
                                                    <form action="{{ route('ofertas_empleo.list_users_information', [
                                                        'oferta_id'=>$solicitudes->id_oferta,
                                                        'puesto_id'=>$puesto_id->id, 
                                                        'empresa_id'=>$empresa_id->id
                                                        ])}}" method="get">
                                                        <button class="btn btn-primary" type="submit">Ver Más</button>
                                                    </form> 
                                                 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
    </x-slot>
</x-app-layout>