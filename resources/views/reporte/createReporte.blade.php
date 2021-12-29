@extends('layouts.light')  

@section('content')
<div class="container">
<form action="{{url('/reporte')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('reporte.formReporte',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection