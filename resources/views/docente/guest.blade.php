
@extends('layouts.light')  
    @section('content')
        <div class="bg-image" style="background-image: url({{ asset('../resources/img/trabajando.jpg') }});
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        min-height: 8rem;"
        >
            <div class="container"> 
                <div class="row justify-content-center" style="padding-top: 50px;">
                    <div class="col-md-8">
                        <div class="card " style="background-color: rgba(255, 255, 255, 0.5);">
                            <div class="card-header" style="background-color: rgba(255, 255, 255, 0.5);">
                                <h3 class="font-weight-bold text-uppercase text-center">{{ __('INSTITUTO TECNOLOGICO JOSÉ MARIO MOLINA PASQUEL Y HENRIQUEZ') }}</h3>
                                <h4 class="font-weight-bold text-uppercase text-center" style="color: darkorange">Campus Puerto Vallarta</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" style="padding-top: 20px">
                        <div class="card " style="background-color: rgba(255, 255, 255, 0.5);">
                            <div class="card-header" style="background-color: rgba(255, 255, 255, 0.5);"><h3 class="font-weight-bold text-uppercase text-center">{{ __('Sistema de Seguimiento a la Practica Administrativa y Docentes') }}</h3></div>
                                <div style="display: flex; flex-direction: row">
                                    <div class="card-body text-uppercase text-center">
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur officiis nobis assumenda repudiandae culpa possimus totam exercitationem deserunt voluptatem.</h5>
                                    </div>
                                    <div>
                                        <a  class="btn btn-primary" style="margin: 50px; padding:10 20 10 20" href="{{url('/login')}}">Identificarse</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection