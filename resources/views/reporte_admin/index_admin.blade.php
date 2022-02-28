@extends('layouts.light')  
@section('content')

<div class="container">
        {{-- Codigo para recepcion de un mensaje --}}
            @if(Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        {{-- Codigo para recepcion de un mensaje --}}

    {{-- Barra de navegación  --}}
    <div class="pt-4">
        <nav class="navbar navbar-expand-xl navbar-white bg-white">
            <a class="navbar-brand mb-0 h1" href="{{url('administrativo/')}}">Panel de control</a>
            <button class="navbar-toggler bg-secondary " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse nav-pills" id="navbarNav">
              <div class="navbar-nav ">
                    <a href="{{route('admin_docentes')}}" class="nav-link text-dark  h6 mb-0" >Administrar Docentes</a>
                    <a href="{{route('admin_materias')}}" class="nav-link text-dark  h6 mb-0" >Administrar Materias</a>
                    <a href="{{route('admin_reportes')}}" class="nav-link text-dark h6 mb-0">Administrar Reportes</a>
                </div>
            </div>
          </nav>
    </div>
    {{-- Barra de navegación  --}}

    {{-- Acciones main --}}
        <div class="bg-light pt-4 pb-4 ">
            <div class="ml-3 mr-3 p-2 text-center text-white bg-primary">
                <h4>Subir Carga Docentes</h4>
            </div>
            <div class="p-4 m-4 border border-2 border-primary">
                <form action="{{url('/users')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label font-weight-bold">Selecciona el archivo .xlsx desde tu ordenador</label>
                        <input class="form-control col-12 col-lg-6" type="file" id="formFile" name="import_file">
                    </div>
                    <button class="btn btn-primary col-12 col-lg-6" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                            <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                        Importar Docentes
                    </button>
                </form>
            </div>

            <div class="ml-3 mr-3 p-2 text-center text-white bg-primary">
                <h4>Subir Carga de Materias</h4>
            </div>
                <div class="p-4 m-4 border border-2 border-primary">
                    <form action="{{url('/carga_materias')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label font-weight-bold">Selecciona el archivo .xlsx desde tu ordenador</label>
                            <input class="form-control col-12 col-lg-6" type="file" id="formFile" name="import_file">
                        </div>
                        <button class="btn btn-primary col-12 col-lg-6" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                            </svg>
                            Importar Materias
                        </button>
                    </form>
                </div>

                <div class="ml-3 mr-3 p-2 text-center text-white bg-primary">
                    <h4>Descargar Formatos</h4>
                </div>
                <div class="p-4 m-4 border border-2 border-primary">
                    <div class="mt-4">
                        <p class="font-weight-bold">Puedes descargar los formatos de carga en el siguiente botón</p>
                        <form action="{{url('https://drive.google.com/drive/folders/1mJsXkip1VccxMxuvoDjbsm5-EZ8asZOf?usp=sharing')}}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-success col-12 col-lg-6" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filetype-xlsx" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM7.86 14.841a1.13 1.13 0 0 0 .401.823c.13.108.29.192.479.252.19.061.411.091.665.091.338 0 .624-.053.858-.158.237-.105.416-.252.54-.44a1.17 1.17 0 0 0 .187-.656c0-.224-.045-.41-.135-.56a1.002 1.002 0 0 0-.375-.357 2.028 2.028 0 0 0-.565-.21l-.621-.144a.97.97 0 0 1-.405-.176.37.37 0 0 1-.143-.299c0-.156.061-.284.184-.384.125-.101.296-.152.513-.152.143 0 .266.023.37.068a.624.624 0 0 1 .245.181.56.56 0 0 1 .12.258h.75a1.093 1.093 0 0 0-.199-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.552.05-.777.15-.224.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.123.524.082.149.199.27.351.367.153.095.332.167.54.213l.618.144c.207.049.36.113.462.193a.387.387 0 0 1 .153.326.512.512 0 0 1-.085.29.558.558 0 0 1-.255.193c-.111.047-.25.07-.413.07-.117 0-.224-.013-.32-.04a.837.837 0 0 1-.249-.115.578.578 0 0 1-.255-.384h-.764Zm-3.726-2.909h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415H1.5l1.24-2.016-1.228-1.983h.931l.832 1.438h.036l.823-1.438Zm1.923 3.325h1.697v.674H5.266v-3.999h.791v3.325Zm7.636-3.325h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.438h.036l.823-1.438Z"/>
                                </svg>
                                Descargar Formatos
                            </button>
                        </form>
                    </div>
                </div>
        </div>
    {{-- Acciones main --}}


</div>
@endsection
