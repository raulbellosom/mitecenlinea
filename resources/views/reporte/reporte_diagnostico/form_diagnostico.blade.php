<div class="d-flex justify-content-between m-2">
    <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
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
        {{$modo}} Reporte Diagnostico
    </div>
        {{-- Titulo --}}

        {{-- Información General --}}
<div class="mb-4 pb-4 bg-light">
    <div class="bg-primary p-4 mb-4 text-center text-light font-weight-bold text-h1 text-uppercase">
        Información General
    </div>
    <div class="m-2 row justify-content-between justify-content-md-around ">
        <div class="form-floating col-12 col-md-12 pb-3">
            <select class="form-control" id="asignatura" name="asignatura">
                <option selected>Elije una asignatura...</option>
                    @foreach ($datos as $dato)
                        <option value="{{$dato->id}}"> {{$dato->materia}} - {{$dato->grado}}{{$dato->grupo}} - {{$dato->turno}} - {{$dato->carrera}} </option>
                    @endforeach
                </select>
            <label for="asignatura" class="pl-4">Asignatura</label> 
        </div>


        <div class="form-floating col-12 col-md-6 pb-3">
            <select id="tipo_evaluacion" class="form-control mr-2" name="tipo_evaluacion"
            value="{{ isset($reporte_diagnostico->tipo_evaluacion) ? $reporte_diagnostico->tipo_evaluacion:old('tipo_evaluacion') }}"
            >
                <option value="Oral" selected>Oral</option>
                <option value="Escrita">Escrita</option>
                <option value="Oral y Escrita">Oral y Escrita</option>
            </select>
            <label for="tipo_evaluacion" class="pl-4">Tipo evaluación</label> 
        </div>
        <div class="form-floating col-12 col-md-6 pb-3">
            <input id="cantidad_alumnos" class="form-control mr-2" name="cantidad_alumnos" type="number" placeholder="Número de alumnos" min="1" pattern="^[0-9]+"
                value="{{ isset($reporte_diagnostico->cantidad_alumnos) ? $reporte_diagnostico->cantidad_alumnos:old('cantidad_alumnos') }}" 
            >
            <label for="cantidad_alumnos" class="pl-4">Alumnos evaluados</label>
        </div>

        
        <div class="mw-100 d-flex justify-content-around">
            <div class="d-flex align-items-center">
                <input class="form-control " type="hidden" name="nombre_reporte"
                value="Reporte Diagnostico" id="nombre_reporte"
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
                {{-- value="{{ date(DATE_COOKIE) }}" id="createAt"> codigo sagrado --}}
                {{date_default_timezone_set("America/Mexico_City")}}
                value="{{ date('Y-m-d h:i:s') }}" id="created_at"
                >
            </div>
        </div>
    </div>


        {{-- Botones  --}}
    <div class="m-4 d-flex justify-content-end justify-content-md-between  ">
        <div class="mr-3">
            <a class="btn btn-outline-danger" href="{{url('reporte_diagnostico/')}}">
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

    {{-- Fin Formulario Reporte --}}
</div>