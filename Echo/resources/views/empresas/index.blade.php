<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa</title>
</head>
<body>
    <h1>Listado de empresas</h1>
    <a href="{{route('empresas.create')}}">Nueva empresa</a>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Operación</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{$empresa->nombre}}</td>
                    <td>{{$empresa->telefono}}</td>
                    <td>{{$empresa->email}}</td>
                    <td>{{$empresa->direccion}}</td>
                      <td> 
                        <form action="{{ route('empresas.show', ['empresa'=>$empresa->id])}}" method="get">
                            <button class="btn btn-primary" type="submit">Ver</button>
                        </form>
                    </td>
                    <td> 
                        <form action="{{ route('empresas.destroy', ['empresa'=>$empresa->id])}}" method="post">
                            @csrf
                            {{method_field("DELETE")}}
                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    @include('layouts.footer')
</body>
</html>