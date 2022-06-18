@extends('layouts.light')

@section('content')
<div class="container">
<form action="{{url('/reporte_final/'.$rf->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.reporte_final.form_rf_descripcion',['modo'=>'Editar', 'id'=>Auth::user()->id])
</form>

</div>
@endsection