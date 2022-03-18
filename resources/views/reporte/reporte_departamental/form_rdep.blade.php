<div class="d-flex justify-content-between p-4 bg-light">
    <a class="btn btn-outline-danger" href="{{url('reporte_departamental/')}}">
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
            <div class="bg-primary p-4 mb-1 text-center text-light font-weight-bold text-h1 text-uppercase" >
                {{$modo}} Reporte Departamental
            </div>
        {{-- Titulo --}}

        {{-- Información General --}}
            <div class=" bg-light">
                <div class="bg-primary p-4 mb-0 col-12 text-center text-light font-weight-bold text-h1 text-uppercase">
                    Información General del Reporte
                </div>
                <div class="row p-4">
                    <div class="form-floating col-12 col-lg-6 pb-3">
                        <select class="form-control" id="asignatura" name="asignatura">
                            <option selected>Elije una asignatura...</option>
                                @foreach ($datos as $dato)
                                    <option value="{{$dato->id}}"> {{$dato->materia}} - {{$dato->grado}}{{$dato->grupo}} - {{$dato->turno}} - {{$dato->carrera}} </option>
                                @endforeach
                            </select>
                        <label for="asignatura" class="pl-4">Asignatura</label> 
                    </div>
                    <div class="form-floating col-12 col-lg-6 pb-3 ">
                        <input id="semestre" class="form-control" name="semestre" type="text" placeholder="Semestre"
                            value="{{ isset($reporte->semestre) ? $reporte->semestre:old('semestre') }}"
                        >
                        <label for="semestre" class="pl-4">Semestre</label> 
                    </div>
                    {{-- <div class="form-floating col-6 pb-2">
                        <input id="carrera" class="form-control" name="carrera" type="text" placeholder="carrera"
                            value="{{ isset($reporte->carrera) ? $reporte->carrera:old('carrera') }}"
                        >
                        <label for="carrera" class="pl-4">Carrera</label> 
                    </div>
                    <div class="form-floating col-6 pb-2">
                        <input id="grado" class="form-control" name="grado" type="number" placeholder="Grado" min="0" max="9" pattern="^[0-9]+"
                            value="{{ isset($reporte->grado) ? $reporte->grado:old('grado') }}"
                        >
                        <label for="grado" class="pl-4">Grado</label>
                    </div>
                    <div class="form-floating col-6 pb-2">
                        <input id="grupo" class="form-control" name="grupo" type="text" placeholder="Grupo"
                            value="{{ isset($reporte->grupo) ? $reporte->grupo:old('grupo') }}"
                        >
                        <label for="grupo" class="pl-4">Grupo</label> 
                    </div>
                    <div class="form-floating col-6 pb-2">
                        <select id="turno" class="form-control" name="turno"
                            value="{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}"
                        >
                            <option value="{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}" hidden>{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                        <label for="turno" class="pl-4">Turno</label> 
                    </div> --}}
                {{-- Elementos ocultos --}}
                <div class="mw-100 d-flex justify-content-around">
                    <div class="d-flex align-items-center">
                        <input class="form-control " type="hidden" name="nombre_reporte"
                        value="Reporte Departamental" id="nombre_reporte"
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
                {{-- Elementos ocultos --}}
            </div>
        {{-- Información General --}}

        {{-- Descripción Del reporte --}}
        <div class=" bg-light">
            <div class="bg-primary p-4 mb-0 col-12 text-center text-light font-weight-bold text-h1 text-uppercase">
                Descripción del Reporte
            </div>
            <div class="row p-4">
                
                <div class="form-floating col-12 col-md-6 pb-2">
                    <input id="total_alumnos_lista" class="form-control" name="total_alumnos_lista" type="number" placeholder="Total de alumnos en Lista" min="1" 
                    value="{{ isset($reporte->total_alumnos_lista) ? $reporte->total_alumnos_lista:old('total_alumnos_lista') }}" >
                    <label for="total_alumnos_lista" class="pl-4">Numero Total de Alumnos en Lista</label>
                </div>
                <div class="form-floating col-12 col-md-6 pb-2">
                    <input id="total_alumnos_examen" class="form-control" name="total_alumnos_examen" type="number" placeholder="Alumnos que aplicaron el examen" min="1" 
                    value="{{ isset($reporte->total_alumnos_examen) ? $reporte->total_alumnos_examen:old('total_alumnos_examen') }}" >
                    <label for="total_alumnos_examen" class="pl-4">No. de alumnos que aplicaron el examen </label>
                </div>
                <div class="form-floating col-12 col-md-6 pb-2">
                    <input id="unidad_evaluada" class="form-control" name="unidad_evaluada" type="number" placeholder="Unidad evaluada" min="1" pattern="^[0-9]+" 
                    value="{{ isset($reporte->unidad_evaluada) ? $reporte->unidad_evaluada:old('unidad_evaluada') }}" >
                    <label for="unidad_evaluada" class="pl-4">Unidad Evaluada</label>
                </div>
                <div class="form-floating col-12 col-md-6 pb-2">
                    <input id="fecha_aplicacion_examen" class="form-control" name="fecha_aplicacion_examen" type="date" placeholder="Fecha aplicación del examen" 
                    value="{{ isset($reporte->fecha_aplicacion_examen) ? $reporte->fecha_aplicacion_examen:old('fecha_aplicacion_examen') }}" >
                    <label for="fecha_aplicacion_examen" class="pl-4">Fecha de Aplicación del Examen</label>
                </div>
                <div class="form-floating col-12 col-md-6 pb-2">
                    <input id="prom_alumnos_aprobados" class="form-control" name="prom_alumnos_aprobados" type="number" placeholder="Promedio alumnos aprobados" min="1" pattern="^[0-9]+" 
                    value="{{ isset($reporte->prom_alumnos_aprobados) ? $reporte->prom_alumnos_aprobados:old('prom_alumnos_aprobados') }}" >
                    <label for="prom_alumnos_aprobados" class="pl-4">Promedio Alumnos Aprobados</label>
                </div>
                <div class="form-floating col-12 col-md-6 pb-2">
                    <input id="promedio_general" class="form-control" name="promedio_general" type="number" placeholder="Promedio general" min="1" pattern="^[0-9]+" 
                    value="{{ isset($reporte->promedio_general) ? $reporte->promedio_general:old('promedio_general') }}" >
                    <label for="promedio_general" class="pl-4">Promedio General del Grupo</label>
                </div>
            </div>
            
        </div>
        {{-- Descripción del reporte --}}

        {{-- Comentarios --}}
        <div class="mb-4 pb-4 bg-light ">
            <div class="bg-primary p-4 col-12 text-center text-light font-weight-bold text-h1 text-uppercase">
                Comentarios
            </div>
            <div class="pl-4 pr-4 pt-3">
                <div class="form-floating mb-2">
                    <textarea class="form-control mr-sm-2" id="comen_generales" name="comen_generales" placeholder="Comentarios Generales" style="height: 100px"></textarea>
                    <label for="comen_generales">Comentarios Generales</label>
                </div>
                <div class="form-floating mb-2">
                    <textarea class="form-control mr-sm-2" id="comen_particulares" name="comen_particulares" placeholder="Casos Particulares"  style="height: 100px"></textarea>
                    <label for="comen_particulares">Casos Particulares</label>
                </div>
            </div>
        </div>   
        {{-- Comentarios --}}

        {{-- Botones  --}}
            <div class="m-2 pb-4 d-flex justify-content-end justify-content-md-between  ">
                <div class="mr-3">
                    <a class="btn btn-outline-danger" href="{{url('reporte_departamental/')}}">
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