<x-app-layout>{{-- x-app-layut importa el nav y el header--}}
    <x-slot name="header">
        <div class="contanier">
          <h1>Inforación del puesto {{$puesto->nombre}}</h1>
          <p>Nombre: {{ $puesto ->nombre}}</p>
          <p>Descripción: {{ $puesto ->descripcion}}</p>

          <form action="{{ route('puestos.edit', ['puesto'=>$puesto->id])}}" method="GET">
            <button class="btn btn-primary" type="submit">Editar</button>
          </form>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </x-slot>
</x-app-layout>
