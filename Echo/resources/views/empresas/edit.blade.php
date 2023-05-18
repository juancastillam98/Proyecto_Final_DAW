<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Editar empresa</h1>
        <form action="{{ route('empresas.update', ['empresa'=>$empresa->id])}}"method="POST">
                              
            {{method_field("PUT")}}
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group my-2">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre"  value="{{$empresa->nombre}}">
                    </div>
           
                    <div class="form-group my-2">
                        <label class="form-label" for="telefono">Telefono: </label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="{{$empresa->telefono}}">
                    </div>
                    <div class="form-group my-2">
                        <label class="form-label" for="email">Email: </label>
                        <input class="form-control" type="email" name="email" id="email" value="{{$empresa->email}}">
                    </div>
                    <div class="form-group my-2">
                        <label class="form-label" for="direccion">Dirección: </label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="{{$empresa->direccion}}">
                    </div>
                    <div class="d-inline">
                        <button class="btn btn-primary" type="submit" name="btnAnadir">Guardar</button>
                    </div>
                    <div class="d-inline">
                        <a class="btn btn-secondary my-5" href="./">Volver nuevo</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>