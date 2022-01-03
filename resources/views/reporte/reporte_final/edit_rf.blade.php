@extends('layouts.light')

@section('content')
<div class="container">
<form method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.reporte_final.form_rf_descripcion',['modo'=>'Editar'])
</form>

</div>
@endsection