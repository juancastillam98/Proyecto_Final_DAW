
<x-app-layout>{{-- x-app-layut importa el nav y el header--}}

        @php
            $usuarioActual=Auth::user();
        @endphp

        <div class="container mx-auto px-2 bg-color-fondo-300 color-texto-blanco">
           <h1 id="titulo_profile" class="text-4xl font-extrabold my-3">Mi perfil</h1>
                <div class="grid grid-cols-3 gap4 mt-10">
                    <div id="menu-izq" class="">
                        <div class="grid grid-rows-[200px_minmax(300px, 500px)_100px] gap-12">
                            <div class="flex justify-center">
                                @if (!$esCandidato)
                                    <h2 id="titulo_profile" class="text-3xl text-center font-extrabold my-3">Campo foto</h2>
                                @else
                                    @if (!$candidato_info->foto)
                                        <form id="foto-form" method="post" action="{{ route('candidatos.update_photo', ['candidato'=>$candidato_info->id]) }}" enctype="multipart/form-data">
                                            {{method_field('PUT')}}
                                            @csrf
                                            <div class="flex justify-center">
                                                {{-- <label for="foto" class="block mb-2 text-sm font-medium">Foto</label> --}}
                                                <input type="file" id="foto" name="foto" class="foto-input texto-input-centro rounded-full w-48 h-48 focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700" placeholder="foto">
                                            </div>
                                            <div class="flex justify-center mt-4">
                                                {{-- <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button> --}}
                                            </div>
                                        </form>
                                    @else
                                        <img  class ="rounded-full w-48 h-48" src="{{ asset('storage/img_users/' . $candidato_info->foto) }}" alt="Foto de perfil">

                                    @endif
                                @endif
                            </div>
                                {{--tabs user navigation menu--}}
                            <div class=" border-b rounded-lg bg-color-fondo-200 mt-8">
                                <ul class="flex flex-col flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg text-lg	" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Perfil</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 text-lg" id="dashboard-tab" data-tabs-target="#company" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Empresa</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 text-lg" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Solicitudes</button>
                                    </li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                    <div id="menu-derecha" class="col-span-2">
                        {{--tabs user navigation menu links--}}
                        <div id="myTabContent">
                            {{--Profile info--}}
                            <div class="hidden p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="bg-color-principal flex justify-center max-w-xs py-3 b-radius-xl mb-2">
                                        <h2 class="text-3xl">{{$usuarioActual->name}}</h2>
                                </div>
                                
                                @if (!$esCandidato)
                                    <section class="modal">
                                        <div class="modal-container">
                                            <form action="{{ route('candidatos.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        {{--Id del usuario actual  hay que pasarle el id usuario como input type hidden--}}
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id }}">
                                                        {{--FOTO --}}
                                                        <div class="mb-6">
                                                            <label for="foto" class="block mb-2 text-sm font-medium">Foto</label>
                                                            <input type="file" id="foto" name="foto" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="foto">
                                                        </div>

                                                        {{--Nombre--}}
                                                        <div class="mb-6">
                                                            <label for="nombre" class="block mb-2 text-sm font-medium  " >Nombre</label>
                                                            <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre" required>
                                                        </div>

                                                        {{--Primer apellido--}}
                                                            <div class="mb-6">
                                                            <label for="primer_apellido" class="block mb-2 text-sm font-medium    " >Primer Apellido</label>
                                                            <input type="text" id="primer_apellido" name="primer_apellido" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre" required>
                                                        </div>

                                                        {{--Segundo apellido--}}
                                                        <div class="mb-6">
                                                            <label for="segundo_apellido" class="block mb-2 text-sm font-medium    " >Segundo Apellido</label>
                                                            <input type="text" id="segundo_apellido" name="segundo_apellido" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre" required>
                                                        </div>
                                            
                                                        {{--Teléfono--}}
                                                        <div class="mb-6">
                                                            <label for="telefono" class="block mb-2 text-sm font-medium    " > Telefono</label>
                                                            <input type="text" id="telefono" name="telefono" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre" required>
                                                        </div>

                                                        {{--Dirección--}}
                                                        <div class="mb-6">
                                                            <label for="direccion" class="block mb-2 text-sm font-medium    " > Dirección</label>
                                                            <input type="text" id="direccion" name="direccion" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="nombre" required>
                                                        </div>

                                                        {{--Habilidades--}}
                                                        <div class="mb-6">
                                                            <label for="habilidades" class="block mb-2 text-sm font-medium    " >Ha‹bilidades</label>
                                                            <textarea id="habilidades" name="habilidades" rows="4" class="block p-2.5 w-full text-sm   bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                                                        </div>

                                                        {{--Experiencia laboral--}}
                                                        <div class="form-group my-2">
                                                            <label class="form-label" for="experiencia_laboral">Experiencia Laboral <span class="campo_obligatorio">*</span></label>
                                                            <textarea id="experiencia_laboral" name="experiencia_laboral" rows="4" class="block p-2.5 w-full text-sm   bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400   dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                                                        </div>

                                                        
                                                        <div class="d-inline">
                                                                <button type="submit" name="btnAnadir" class="btn-principal">Register new account</button>
                                                        </div>
                                                        <div class="d-inline">
                                                            <a class="btn btn-secondary my-5" href="./">Volver nuevo</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </section>
                                @else
                                    <div class="b-radius-xl bg-color-fondo-200 my-3 p-5">
                                        <h3 class="text-2xl mb-3">Información de contacto</h3>
                                        <div class="grid grid-cols-1 lg:grid-cols-2">
                                            <div class="flex items-center pr-0.5 py-1">
                                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 18.3333C21.3186 18.3333 22.6075 17.9423 23.7038 17.2098C24.8001 16.4773 25.6546 15.4361 26.1592 14.2179C26.6638 12.9997 26.7958 11.6593 26.5386 10.3661C26.2813 9.07286 25.6464 7.88497 24.7141 6.95262C23.7817 6.02027 22.5938 5.38534 21.3006 5.1281C20.0074 4.87087 18.667 5.00289 17.4488 5.50747C16.2306 6.01206 15.1894 6.86654 14.4569 7.96287C13.7243 9.0592 13.3333 10.3481 13.3333 11.6667C13.3333 13.4348 14.0357 15.1305 15.286 16.3807C16.5362 17.631 18.2319 18.3333 20 18.3333Z" fill="white"/>
                                                    <path d="M30 35C30.442 35 30.866 34.8244 31.1785 34.5119C31.4911 34.1993 31.6667 33.7754 31.6667 33.3334C31.6667 30.2392 30.4375 27.2717 28.2496 25.0838C26.0617 22.8959 23.0942 21.6667 20 21.6667C16.9058 21.6667 13.9384 22.8959 11.7504 25.0838C9.56251 27.2717 8.33334 30.2392 8.33334 33.3334C8.33334 33.7754 8.50894 34.1993 8.8215 34.5119C9.13406 34.8244 9.55798 35 10 35H30Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">{{$candidato_info->nombre}}</span>
                                            </div>
                                            <div class="flex items-center pr-0.5 py-1">
                                                <svg width="35" height="40" viewBox="0 0 41 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M31.8779 7.21179H8.38891C7.05398 7.21179 5.77373 7.78165 4.82979 8.796C3.88586 9.81036 3.35556 11.1861 3.35556 12.6206V30.6501C3.35556 32.0846 3.88586 33.4603 4.82979 34.4747C5.77373 35.4891 7.05398 36.0589 8.38891 36.0589H31.8779C33.2128 36.0589 34.4931 35.4891 35.437 34.4747C36.3809 33.4603 36.9112 32.0846 36.9112 30.6501V12.6206C36.9112 11.1861 36.3809 9.81036 35.437 8.796C34.4931 7.78165 33.2128 7.21179 31.8779 7.21179V7.21179ZM30.7538 10.8177L20.1334 19.3817L9.51302 10.8177H30.7538ZM31.8779 32.453H8.38891C7.94393 32.453 7.51718 32.2631 7.20254 31.9249C6.88789 31.5868 6.71113 31.1282 6.71113 30.6501V13.0714L19.1267 23.0777C19.4171 23.3118 19.7704 23.4383 20.1334 23.4383C20.4964 23.4383 20.8496 23.3118 21.1401 23.0777L33.5557 13.0714V30.6501C33.5557 31.1282 33.3789 31.5868 33.0642 31.9249C32.7496 32.2631 32.3229 32.453 31.8779 32.453Z" fill="white"/>
                                                </svg> 
                                                <span class="ml-3">{{$usuarioActual->email}}</span>
                                            </div>
                                            <div class="flex items-center pr-0.5 py-1">
                                                <span class="ml-3">{{$candidato_info->primer_apellido}}</span>
                                            </div>
                                            <div class="flex items-center pr-0.5 py-1">
                                                <span class="ml-3">{{$candidato_info->segundo_apellido}}</span>
                                            </div>
                                            <div class="flex items-center pr-0.5 py-1">
                                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18 22.0166L20.8167 20.8833L22 17.9833L19.1833 19.1166L18 22.0166Z" fill="white"/>
                                                    <path d="M20 3.33331C16.7036 3.33331 13.4813 4.3108 10.7405 6.14215C7.99966 7.97351 5.86346 10.5765 4.60199 13.6219C3.34053 16.6674 3.01048 20.0185 3.65357 23.2515C4.29665 26.4845 5.884 29.4542 8.21487 31.7851C10.5457 34.116 13.5155 35.7033 16.7485 36.3464C19.9815 36.9895 23.3326 36.6594 26.378 35.398C29.4235 34.1365 32.0265 32.0003 33.8578 29.2595C35.6892 26.5187 36.6667 23.2963 36.6667 20C36.6667 17.8113 36.2356 15.644 35.398 13.6219C34.5604 11.5998 33.3327 9.76251 31.7851 8.21487C30.2375 6.66722 28.4001 5.43957 26.378 4.60199C24.356 3.76441 22.1887 3.33331 20 3.33331ZM26.55 15.7L23.6333 22.8C23.5495 23.0063 23.4252 23.1936 23.2678 23.3511C23.1103 23.5085 22.9229 23.6328 22.7167 23.7166L15.7 26.55C15.4777 26.6387 15.239 26.6785 15 26.6666C14.7783 26.6636 14.5594 26.6163 14.3563 26.5276C14.1531 26.4388 13.9696 26.3105 13.8167 26.15H13.7333C13.539 25.9243 13.4086 25.6507 13.3559 25.3576C13.3031 25.0645 13.3299 24.7626 13.4333 24.4833L16.35 17.3833C16.4338 17.177 16.5581 16.9896 16.7155 16.8322C16.873 16.6748 17.0604 16.5505 17.2667 16.4666L24.2833 13.6333C24.5953 13.5102 24.9373 13.4841 25.2643 13.5585C25.5914 13.6328 25.8885 13.8041 26.1167 14.05C26.3308 14.2605 26.4842 14.5249 26.5604 14.8153C26.6367 15.1058 26.6331 15.4114 26.55 15.7Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">{{$candidato_info->direccion}}</span>
                                            </div>
                                            <div class="flex items-center pr-0.5 py-1">
                                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M29 36.6667C22.1955 36.6578 15.6722 33.9508 10.8607 29.1393C6.04915 24.3278 3.34216 17.8045 3.33334 11C3.33334 8.96666 4.14108 7.01661 5.57886 5.57884C7.01664 4.14106 8.96668 3.33332 11 3.33332C11.4306 3.33004 11.8604 3.36912 12.2833 3.44999C12.6922 3.51049 13.0941 3.61097 13.4833 3.74999C13.7571 3.84604 14.001 4.01188 14.191 4.23111C14.381 4.45034 14.5105 4.71537 14.5667 4.99999L16.85 15C16.9116 15.2714 16.9041 15.554 16.8285 15.8218C16.7528 16.0896 16.6112 16.3342 16.4167 16.5333C16.2 16.7667 16.1833 16.7833 14.1333 17.85C15.775 21.4514 18.6553 24.3436 22.25 26C23.3333 23.9333 23.35 23.9167 23.5833 23.7C23.7824 23.5055 24.027 23.3639 24.2949 23.2882C24.5627 23.2125 24.8452 23.2051 25.1167 23.2667L35.1167 25.55C35.3922 25.6139 35.6469 25.7469 35.8568 25.9364C36.0668 26.1259 36.225 26.3658 36.3167 26.6333C36.4573 27.0289 36.5633 27.436 36.6333 27.85C36.7004 28.2689 36.7339 28.6924 36.7333 29.1167C36.7026 31.1413 35.8722 33.0716 34.4233 34.4861C32.9744 35.9006 31.0248 36.6845 29 36.6667Z" fill="white"/>
                                                </svg>
                                               <span class="ml-3">{{$candidato_info->telefono}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="b-radius-xl bg-color-fondo-200 my-3 p-5">
                                        <div>
                                                <h3 class="text-2xl mb-3">Experiencia Laboral</h3>
                                            <textarea name="candidato_experiencia_laboral" id="candidato_experiencia_laboral" class="b-radius-xl color-texto-negro ">{{$candidato_info->experiencia_laboral}}</textarea>
                                        </div>
                                    </div>
                                    <div class="b-radius-xl bg-color-fondo-200 my-3 p-5">
                                        <div>
                                            <h3 class="text-2xl mb-3">Habilidades Laboral</h3>
                                            <textarea name="candidato_habilidades" id="candidato_habilidades"  class="b-radius-xl color-texto-negro ">{{$candidato_info->habilidades}}</textarea>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{--Profile company info--}}
                            <div class="hidden p-4 rounded-lg bg-color-fondo-200" id="company" role="tabpanel" aria-labelledby="dashboard-tab">
                                @if (!$tieneEmpresa)       
                                    <a href="{{route('empresas.create')}}">Crear empresa</a>
                                @else
                                        {{--Información de la empresa--}}
                                        <h2 class="text-4xl font-bold  ">{{$empresa_info->nombre}} id={{$empresa_info->id}}</h2>

                                        {{--$usuarioActual->empresa->oferta_empleo--}}
                                        <form action="{{ route('ofertas_empleo.create', ['id'=>$usuarioActual->empresa->id])}}" method="get">
                                            <button class="btn btn-primary" type="submit">Crear oferta</button>
                                        </form>  

                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Puesto</th>
                                                    <th>Ofertas Publicada</th>
                                                    <th>Acción</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($puestos as $oferta_puesto)
                                                    <tr>
                                    
                                                        <td>{{$oferta_puesto ->nombre}}</td>
                                                        <td>{{$oferta_puesto ->total_ofertas}}</td>
                                                    
                                                        <td>
                                                            <!--se le pasa como parámetros el Id puesto y el id de la compañía-->
                                                            <form action="{{ route('ofertas_empleo.show', ['ofertas_empleo'=>$oferta_puesto->id, 'empresa_id'=>$empresa_info->id])}}" method="get">
                                                                <button class="btn btn-primary" type="submit">Ver Más</button>
                                                            </form>
                                                        </td>                                         
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                @endif
                            </div>
                                {{-- user request--}}
                            <div class="hidden p-4 rounded-lg bg-color-fondo-200" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                @if ($esCandidato)
                                    @if ($usuarioActual->candidato->solicitudes==null)       
                                        <p>El usuario no ha realizado ninguna solicitud</p>
                                    @else
                                        <p>Mis solicitudes</p>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Empresa</th>
                                                        <th>Puesto</th>
                                                        <th>Fecha Solicitud</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($empresas as $empresa)
                                                        <tr>
                                                            <td>{{$empresa ->nombre}}</td>
                                                            <td>{{$empresa ->puestos}}</td>
                                                            <td>{{$empresa ->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                    @endif
                                @else
                                    <p>Tiene que completar tu perfil para poder solicitar ofertas</p>
                                @endif

                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>

</x-app-layout>