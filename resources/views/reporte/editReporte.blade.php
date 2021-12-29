@extends('layouts.light')  

@section('content')
<div class="container">
<form action="{{url('/reporte/'.$reporte->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reporte.formReporte',['modo'=>'Editar', 'id'=>Auth::user()->id])
</form>

</div>
@endsection