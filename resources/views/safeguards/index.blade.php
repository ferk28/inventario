@extends('home')
@section('subtitle','Responsivas')
@section('dir','Responsivas')
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
        <div class="col-xl-12 center">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">

                        <div class="col">
                            <h3 class="mb-0">Empleados</h3>
                        </div>

                        <div class="col text-right">
                            <a href="{{url('safeguards/create')}}" class="btn btn-sm btn-success">Crear nueva responsiva</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">PDF</th>
                            <th scope="col">Nombre empleado</th>
                            <th scope="col">Área</th>
                            <th scope="col">Jefe de área</th>
                            <th scope="col">Tipo de producto</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Serial</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($safeguards as $safeguard)
                            <tr>
                                <th scope="row">
                                    <a class="btn btn-sm btn-outline-secondary ni ni-paper-diploma" href="{{url('safeguards/pdf/'.$safeguard->id)}}" ></a>
                                </th>
                                <th scope="row">
                                    {{$safeguard->employee->name}}
                                </th>
                                <td>
                                    {{$safeguard->employee->boss->area->name}}
                                </td>
                                <td>
                                    {{$safeguard->employee->boss->name}}
                                </td>
                                <td>
                                    {{$safeguard->inventory->type}}
                                </td>
                                <td>
                                    {{$safeguard->inventory->model}}
                                </td>
                                <td>
                                    {{$safeguard->inventory->serial}}
                                </td>
                                <td>
                                    <form action="{{ url('/safeguards/'.$safeguard->id) }}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-primary ni ni-settings-gear-65" href="{{ url('/safeguards/'.$safeguard->id.'/edit') }}"></a>
                                        <button class="btn btn-sm btn-danger ni ni-fat-delete" type="submit" onclick="return confirm('¿Seguro que deseas eliminar de tu corazon? ');"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('home.footer')
</div>
@endsection
