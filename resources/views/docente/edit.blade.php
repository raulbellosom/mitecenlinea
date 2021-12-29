@extends('layouts.light')

@section('content')
<div class="container">
<form action="{{url('/infoUser/'.$docente->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('docente.form',['modo'=>'Editar', 'id'=>Auth::user()->id])
</form>

</div>
@endsection