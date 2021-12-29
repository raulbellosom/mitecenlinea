<div class="bg-primary p-4 mb-4 mt-4 text-center text-light font-weight-bold text-h1 text-uppercase" >
    {{$modo}} Usuario
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

<div class="row d-flex justify-content-around">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control text-primary border-primary" name="telefono" 
        value="{{ isset($docente->telefono) ? $docente->telefono:old('telefono') }}" id="telefono">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control text-primary border-primary" name="direccion" 
        value="{{ isset($docente->direccion) ? $docente->direccion:old('direccion')}}" id="direccion">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-2">
        <label for="edad">Edad</label>
        <input type="number" class="form-control text-primary border-primary" name="edad" max="75" min="1" pattern="^[0-9]+"
        value="{{isset($docente->edad) ? $docente->edad:old('edad')}}" id="edad">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-2">
        <label for="genero">Genero</label>
        <select class="form-control text-primary border-primary" name="genero" id="genero">
            <option value="{{ isset($docente->genero) ? $docente->genero:old('genero') }}" hidden>Masculino</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
    </div>
</div>

<div class="row d-flex justify-content-around justify-content-sm-start">
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="curp">CURP</label>
        <input type="text" class="form-control text-primary border-primary" name="curp" 
        value="{{ isset($docente->curp) ? $docente->curp:old('curp') }}" id="curp">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="nss">NSS</label>
        <input type="text" class="form-control text-primary border-primary" name="nss" 
        value="{{ isset($docente->nss) ? $docente->nss:old('nss') }}" id="nss">
    </div>
    <div class="form-group col-12 col-sm-6 col-md-4">
        <label for="rfc">RFC</label>
        <input type="text" class="form-control text-primary border-primary" name="rfc" 
        value="{{ isset($docente->rfc) ? $docente->rfc:old('rfc') }}" id="rfc">
    </div>
</div>

<div class="mb-4 row">
    <div class="form-group col-12 col-sm-8">
        <label class="form-label" for="imagen">Imagen de perfil</label>
        <br>
        <input type="file" class="form-control text-primary border-primary" name="imagen" value="" id="imagen">
        @if(isset($docente->imagen))
        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$docente->imagen}}" width="150px" alt="imagenDocente">
        @endif
    </div>
</div>

<div class="form-group"  >
    <input type="hidden" class="form-control" name="user_id" 
    value="{{ $id }}" id="user_id">
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">

<a  class="btn btn-primary" href="{{url('docente/')}}">Regresar</a>