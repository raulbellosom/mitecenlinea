@extends('layouts.light')  

@section('content')
<div class="container">
    <form action="{{url('/reporte_avance_academico')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('reporte.reporte_avance_academico.form_raa',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection