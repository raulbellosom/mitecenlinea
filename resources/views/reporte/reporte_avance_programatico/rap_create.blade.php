@extends('layouts.light')  

@section('content')
<div class="container">
    <form action="{{url('/reporte_avance_programatico')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('reporte.reporte_avance_programatico.form_rap',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection