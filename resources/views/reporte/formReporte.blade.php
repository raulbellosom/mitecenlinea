
<h1>{{$modo}} Reporte</h1>

@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    
@endif
<div class="form-group">
    <label for="nombre">Tipo de Reporte</label>
    <input type="text" class="form-control" name="tipoReporte" 
    value="{{ isset($reporte->tipoReporte) ? $reporte->tipoReporte:old('tipoReporte') }}" id="tipoReporte">
</div>
<div class="form-group">
    <label for="apellidoPaterno">Carrera</label>
    <input type="text" class="form-control" name="carrera" 
    value="{{ isset($reporte->carrera) ? $reporte->carrera:old('carrera')}}" id="carrera">
</div>
<div class="form-group">
    <label for="apellidoMaterno">Asignatura</label>
    <input type="text" class="form-control" name="asignatura" 
    value="{{isset($reporte->asignatura) ? $reporte->asignatura:old('asignatura')}}" id="asignatura">
</div>
<div class="form-group">
    <label for="correo">Grado</label>
    <input type="text" class="form-control" name="grado" 
    value="{{ isset($reporte->grado) ? $reporte->grado:old('grado') }}" id="grado">
</div>
<div class="form-group">
    <label for="telefono">Grupo</label>
    <input type="tel" class="form-control" name="grupo" 
    value="{{ isset($reporte->grupo) ? $reporte->grupo:old('grupo') }}" id="grupo">
</div>
<div class="form-group">
    <label for="telefono">Turno</label>
    <input type="tel" class="form-control" name="turno" 
    value="{{ isset($reporte->turno) ? $reporte->turno:old('turno') }}" id="turno">
</div>

<div class="form-group"  >
    <input class="form-control" type="hidden" name="iddocente" 
    value="{{ $id }}" id="iddocente">
</div>
<div class="form-group"  >
    
    <input class="form-control" type="hidden" name="created_at" 
    {{-- value="{{ date(DATE_COOKIE) }}" id="createAt"> --}}
    {{date_default_timezone_set("America/Mexico_City")}}
    value="{{ date('Y-m-d h:i:s') }}" id="created_at"
    >
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a  class="btn btn-primary" href="{{url('docente/')}}">Regresar</a>