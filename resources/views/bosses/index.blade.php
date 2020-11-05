@extends('home')
@section('subtitle','Jefes de área')
@section('dir','Patrones')
@section('content')

    <div class="container-fluid mt--6">
        <!-- Page content -->
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Guardado!</strong>{{session('message')}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session('message-alert'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><strong>Alerta!</strong>{{session('message-alert')}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-8 center">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">

                            <div class="col">
                                <h3 class="mb-0">Jefes</h3>
                            </div>

                            <div class="col text-right">
                                <a href="{{url('bosses/create')}}" class="btn btn-sm btn-success">Crear nueva jefe</a>
                            </div>
                        </div>
                    </div>
{{--
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Extensión</th>
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($areas as $area)
                                <tr>
                                    <th scope="row">
                                        {{$area->name}}
                                    </th>
                                    <td>
                                        {{$area->phone}}
                                    </td>
                                    <td>
                                        {{$area->extension}}
                                    </td>
                                    <td>
                                        <form action="{{ url('/areas/'.$area->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-primary ni ni-settings-gear-65" href="{{ url('/areas/'.$area->id.'/edit') }}"></a>
                                            <button class="btn btn-sm btn-danger ni ni-fat-delete" type="submit" onclick="return confirm('¿Seguro que deseas eliminar de tu corazon? ');"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
--}}
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
