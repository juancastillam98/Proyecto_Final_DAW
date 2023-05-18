<x-app-layout>{{-- x-app-layut importa el nav y el header--}}
    <x-slot name="header">
        <div class="container">
            <!--El token @csrf es para proteger la información, el action route('videojuegos.store') es porque store es para insertar en la -->
            <form action="{{ route('puestos.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group my-2">
                            <label class="form-label" for="nombre">Nombre del puesto</label>
                            <input class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label" for="descripcion">Descripción </label>
                            <textarea class="form-control" type="text" name="descripcion" id="descripcion"></textarea>
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
    </x-slot>
</x-app-layout>