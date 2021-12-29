@extends('layouts.light')

@section('content')
<div class="container">
<form method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.reporte_diagnostico.form_descripcion',['modo'=>'Editar'])
</form>

</div>
@endsection