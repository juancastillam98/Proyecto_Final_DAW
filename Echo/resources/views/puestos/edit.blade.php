<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Nuevo videojuego</title>
</head>

<body>

</body>

</html>

    <x-app-layout>{{-- x-app-layut importa el nav y el header--}}
        <x-slot name="header">
                <h1>Nuevo Puesto</h1>
    <div class="container">
        <!--El token @csrf es para proteger la información, el action route('videojuegos.store') es porque store es para insertar en la -->
        <form action="{{ route('puestos.update', ['puesto'=>$puesto->id])}}" method="POST">
            {{method_field('PUT')}}
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group my-2">
                        <label class="form-label" for="nombre">Nombre del puesto</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{$puesto->nombre}}">
                    </div>
                    <div class="form-group my-2">
                        <label class="form-label" for="descripcion">Descripción </label>
                        <textarea class="form-control" type="text" name="descripcion" id="descripcion">{{$puesto->descripcion}}</textarea>
                    </div>
        
                    <div class="d-inline">
                        <button class="btn btn-primary" type="submit" name="btnAnadir">Añadir</button>
                    </div>
                    <div class="d-inline">
                        <a class="btn btn-secondary my-5" href="./">Volver nuevo</a>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        </x-slot>
    </x-app-layout>