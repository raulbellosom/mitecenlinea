@extends('layouts.light')  

@section('content')
<div class="container">
    <form action="{{url('/reporte_final')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('reporte.reporte_final.form_rf',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection