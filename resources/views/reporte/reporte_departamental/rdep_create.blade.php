@extends('layouts.light')  

@section('content')
<div class="container">
    <form action="{{url('/reporte_departamental')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('reporte.reporte_departamental.form_rdep',['modo'=>'Crear', 'id'=>Auth::user()->id])
</form>

</div>
@endsection