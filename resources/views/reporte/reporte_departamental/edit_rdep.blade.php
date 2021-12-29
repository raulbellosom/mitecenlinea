@extends('layouts.light')

@section('content')
<div class="container">
<form action="{{url('/reporte_departamental/'.$reporte->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.reporte_departamental.form_rdep',['modo'=>'Editar', 'id'=>Auth::user()->id])
</form>

</div>
@endsection