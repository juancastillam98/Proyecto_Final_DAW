<x-app-layout>{{-- x-app-layut importa el nav y el header--}}
    <x-slot name="header">
        <h1>Darse de alta</h1>
        <form action="{{ route('candidatos.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group my-2">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre">
                    </div>
           
                    <div class="form-group my-2">
                        <label class="form-label" for="telefono">Telefono: </label>
                        <input class="form-control" type="text" name="telefono" id="telefono">
                    </div>
                    <div class="form-group my-2">
                        <label class="form-label" for="email">Email: </label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="form-group my-2">
                        <label class="form-label" for="direccion">Dirección: </label>
                        <input class="form-control" type="text" name="direccion" id="direccion">
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
    </x-slot>
</x-app-layout>