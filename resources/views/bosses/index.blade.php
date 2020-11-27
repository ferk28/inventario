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
                                <a href="{{url('bosses/create')}}" class="btn btn-sm btn-success">Crear nuevo jefe</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Area</th>
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bosses as $boss)
                                <tr>
                                    <th scope="row">
                                        {{$boss->name}}
                                    </th>
                                    <td>
                                        {{$boss->area->name}}

                                    </td>
                                    <td>
                                        <form action="{{ url('/bosses/'.$boss->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-primary ni ni-settings-gear-65" href="{{ url('/bosses/'.$boss->id.'/edit') }}"></a>
                                            <button class="btn btn-sm btn-danger ni ni-fat-delete" type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo de tu corazon y de nuestros registros?');"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{$bosses->render()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
