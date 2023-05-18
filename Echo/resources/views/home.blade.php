<x-app-layout>{{-- x-app-layut importa el nav y el header--}}

    <?php
    function hasConnection(){
        exec("ping -c 1 google.com", $output, $result);
        return ($result===0) ? TRUE : FALSE;
    }
    if( hasConnection()){
        echo "Hay conexión";
    }else{
        echo "No hay conexión";
    }

    $current_user =Auth::user()->id;
    echo "<br/> ".$current_user." - ". gettype($current_user)." <br/>";


    ?>

  <h1>Listado de ofertas de empleo dashboad</h1>
    <table>
        <thead>
            <tr>
                <th>Puesto</th>
                <th>Empresa</th>
                <th>Vacantes</th>
                <th>Fecha Publicación</th>
                <th>Fecha Expiración</th>
                <th>Requisitos</th>
                <th>Salario</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas_empleo as $oferta)
                <tr>
                    <td>{{$oferta ->puesto->nombre}}</td>
                    <td>{{$oferta ->empresa->nombre}}</td>
                    <td>{{$oferta ->numpuestos}}</td>
                    <td>{{$oferta ->fecha_publicacion}}</td>
                    <td>{{$oferta ->fecha_cierre}}</td>
                    <td>{{$oferta ->requisitos}}</td>
                    <td>{{$oferta ->salario}}</td>
                    <td> 
                        <form action="{{ route('solicitudes.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="oferta_id" value="{{$oferta ->id}}">
                            <button class="btn btn-primary" type="submit">Solicitar</button>
                        </form>
                    </td>
                </tr>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>