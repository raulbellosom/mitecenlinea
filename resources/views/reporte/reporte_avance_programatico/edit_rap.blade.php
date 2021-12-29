@extends('layouts.light')

@section('content')
<div class="container">
<form method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.reporte_avance_programatico.form_rap_descripcion',['modo'=>'Editar'])
</form>

</div>
@endsection