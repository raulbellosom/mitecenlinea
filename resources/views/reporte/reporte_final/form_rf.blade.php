<div class="d-flex justify-content-between m-2">
    <a class="btn btn-outline-danger" href="{{url('reporte_final/')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
        Regresar
    </a>
    <button class="btn btn-outline-success" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
        </svg>
        {{$modo}} reporte
    </button>
</div>

        @if (count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach( $errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Titulo --}}
            <div class="bg-primary p-4 mb-1 mt-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
                {{$modo}} Reporte Final de Actividades
            </div>
        {{-- Titulo --}}

        {{-- Información General --}}
            <div class="mb-4 pb-4 bg-light">
                <div class="bg-primary p-4 mb-4 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Información General del Reporte
                </div>
                <div class="m-2 row justify-content-between justify-content-md-around ">
                    <div class="form-floating col-12 col-md-6 pb-2 ">
                        <input id="asignatura" class="form-control mr-2" name="asignatura" type="text" placeholder="Asignatura"
                            value="{{ isset($reporte->asignatura) ? $reporte->asignatura:old('asignatura') }}"
                        >                        
                        <label for="asignatura" class="pl-4">Asignatura</label>
                    </div>
                    <div class="form-floating col-12 col-md-6 pb-2">
                        <input id="semestre" class="form-control mr-2" name="semestre" type="text" placeholder="semestre" 
                            value="{{ isset($reporte->semestre) ? $reporte->semestre:old('semestre') }}" 
                        >
                        <label for="semestre" class="pl-4">Semestre</label>
                    </div>
                    <div class="form-floating col-12 col-md-6 pb-2">
                        <input id="grado" class="form-control mr-2" name="grado" type="number" placeholder="Grado" min="0" max="9" pattern="^[0-9]+"
                            value="{{ isset($reporte->grado) ? $reporte->grado:old('grado') }}"
                        >
                        <label for="grado" class="pl-4">Grado</label>
                    </div>
                    <div class="form-floating col-12 col-md-6 pb-2">
                        <input id="grupo" class="form-control mr-2" name="grupo" type="text" placeholder="Grupo"
                            value="{{ isset($reporte->grupo) ? $reporte->grupo:old('grupo') }}"
                        >
                        <label for="grupo" class="pl-4">Grupo</label> 
                    </div>
                    <div class="form-floating col-12 col-md-6 pb-2">
                        <select id="turno" class="form-control" name="turno"
                            value="{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}"
                        >
                            <option value="{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}" hidden>{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                        <label for="turno" class="pl-4">Turno</label> 
                    </div>
                    <div class="form-floating col-12 col-md-6 pb-2">
                        <input id="carrera" class="form-control mr-2" name="carrera" type="text" placeholder="carrera"
                            value="{{ isset($reporte->carrera) ? $reporte->carrera:old('carrera') }}"
                        >
                        <label for="carrera" class="pl-4">Carrera</label> 
                    </div>
                
                    <div class="mw-100 d-flex justify-content-around">
                        <div class="d-flex align-items-center">
                            <input class="form-control " type="hidden" name="nombre_reporte"
                            value="Reporte Final" id="nombre_reporte"
                            >
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control " type="hidden" name="status"
                            value="1" id="status"
                            >
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control " type="hidden" name="autor"
                            value="{{ $users->name}}" id="autor"
                            >
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control " type="hidden" name="user_id"
                            value="{{ $users->id}}" id="user_id"
                            >
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control" type="hidden" name="created_at" 
                            {{-- value="{{ date(DATE_COOKIE) }}" id="createAt"> --}}
                            {{date_default_timezone_set("America/Mexico_City")}}
                            value="{{ date('Y-m-d h:i:s') }}" id="created_at"
                            >
                        </div>
                    </div>
                </div>
            {{-- Información General --}}


        {{-- Botones  --}}
            <div class="m-2 d-flex justify-content-end justify-content-md-between  ">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_final/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                        Regresar
                    </a>
                </div>
                <div>
                    <button class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                            <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                        </svg>
                        {{$modo}} reporte
                    </button>
                </div>
            </div>
        {{-- Botones --}}

        
    </form>
    {{-- Fin Formulario Reporte --}}
</div>