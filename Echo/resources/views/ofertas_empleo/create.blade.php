<x-app-layout>{{-- x-app-layut importa el nav y el header--}}
    <x-slot name="header">
        @php
           $id_empresa= request()->route('id');
        @endphp
        <form action="{{ route('ofertas_empleo.store') }}" method="POST">
            @csrf
                       
            {{--Puesto--}}
            <div class="grid gap-6 mb-6 md:grid-cols-2"> 
                
                <label for="puesto_id" class="block mb-2 text-l font-medium text-gray-900 dark:text-white">Selecciona un puesto de trabajo</label>   
                <div>
                    <input list="listado_de_puestos" name="puesto_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ej. Desarrollador Web">
                </div>               
                <datalist id ="listado_de_puestos">
                    @foreach ($puestos as $puesto)
                        <option value="{{ $puesto->nombre}}"></option>
                    @endforeach
                </datalist>   
            </div>
            <label for="">Nota: <strong> Solose admiten los puestos seleccionados </strong></label>
{{--
            <div class="form-group mb-3">
                <label class="form-label" for="compania_id">Compañia</label>
                <input type="text" class="form-control" name="puesto_id" id="puesto_id" list="puestos_list">
                <datalist id="puestos_list">
                    @foreach ($puestos as $puesto)
                        <option value="{{ $puesto->nombre}}"></option>
                    @endforeach
                </datalist>
                <input type="hidden" name="puesto_id" id="puesto_id_hidden">
            </div>
        --}}
            {{--Empresa Publicacion--}}
            <input type="hidden" name="empresa_id" value="{{$id_empresa}}">

            {{--Fecha Publicacion y cierre--}}
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="fecha_publicacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha publicación</label>
                    <input type="date" id="fecha_publicacion" name ="fecha_publicacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>
                <div>
                    <label for="fecha_cierre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                    <input type="date" id="fecha_cierre" name="fecha_cierre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe">
                </div>
            </div>
            {{--Numero de puestos y salario--}}
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div>
                    <label for="numpuestos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero puestos</label>
                    <input type="number" id="numpuestos" name="numpuestos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cuantos puestos se ofertan">
                </div>
                <div>
                    <label for="salario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salario</label>
                    <input type="text" id="salario" name="salario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ej: 999.99">
                </div>
                <div>
                    <label for="underline_select" class="sr-only">Tipo Salario</label>
                    <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Tipo salario</option>
                        <option value="neto">Neto</option>
                        <option value="bruto">Bruto</option>
                    </select>
                </div>
            </div>   
            
            {{--Descripcion--}}
            <div class="mb-6">
                <div>
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe en que consiste esta oferta de trabajo..."></textarea>
                </div>
            </div>
            {{--Requisitos--}}

             <div class="mb-6">
                <div>
                    <label for="requisitos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Requisitos</label>
                    <textarea id="requisitos" name="requisitos" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Especifica cuales son los requisitos para optar a esta solicitud"></textarea>
                </div>
             </div>               

            
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>    
        </form>

    </x-slot>
</x-app-layout>