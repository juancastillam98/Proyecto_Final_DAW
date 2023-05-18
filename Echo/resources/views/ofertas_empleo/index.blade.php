<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa</title>
</head>
<body>
    <h1>Listado de ofertas de empleo</h1>
    <table>
        <thead>
            <tr>
                <th>Puesto ID</th>
                <th>Empresa ID</th>
                <th>Vacantes</th>
                <th>Fecha Publicación</th>
                <th>Fecha Expiración</th>
                <th>Descripción</th>
                <th>Requisitos</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ofertas_empleo as $oferta)
                <tr>
                    <td>{{$oferta ->puesto_id}}</td>
                    <td>{{$oferta ->empresa_id}}</td>
                    <td>{{$oferta ->numpuestos}}</td>
                    <td>{{$oferta ->fecha_publicacion}}</td>
                    <td>{{$oferta ->fecha_cierre}}</td>
                    <td>{{$oferta ->descripcion}}</td>
                    <td>{{$oferta ->requisitos}}</td>
                    <td>{{$oferta ->salario}}</td>
                </tr>
            @endforeach
        </tbody>
    </table> 
</body>
</html>