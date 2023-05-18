<x-app-layout>
    <table>
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Nombre</th>
                                            <th>Acción</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($oferta_solicitudes as $oferta_solicitud)
                                            <tr>
                            
                                                <td>{{$oferta_solicitud ->email}}</td>
                                                <td>{{$oferta_solicitud ->nombre}}</td>
                                              
                                                 <td>
                                                    ver
                                                </td>                                         
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
</x-app-layout>
