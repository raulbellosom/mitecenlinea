@extends('layouts.light')  

@section('content')
<div class="container">
    <form action="{{url('/reporte_diagnostico')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('reporte.reporte_diagnostico.form_diagnostico',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection