@extends('home')
@section('subtitle','Inventario')
@section('dir','Inventario')
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
                                <h3 class="mb-0">Inventario</h3>
                            </div>

                            <div class="col text-right">
                                <a href="{{url('inventories/create')}}" class="btn btn-sm btn-success">Crear nuevo producto</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre de la marca</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Características</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inventories as $inventory)
                                <tr>
                                    <th scope="row">
                                        <form action="{{ url('/inventories/'.$inventory->id) }}">
                                            <a class="btn btn-sm btn-group-justified ni ni-bullet-list-67" href=""></a>
                                        </form>
                                    </th>
                                    <th scope="row">
                                        {{$inventory->brand}}
                                    </th>
                                    <td>
                                        {{$inventory->serial}}
                                    </td>
                                    <td>
                                        {{$inventory->type}}
                                    </td>
                                    <td>
                                        {{$inventory->model}}
                                    </td>
                                    <td>
                                        {{$inventory->color}}
                                    </td>
                                    <td>
                                        {{$inventory->value}}
                                    </td>
                                    <td>
                                        {{$inventory->feature}}
                                    </td>
                                    <td>
                                        {{$inventory->description}}
                                    </td>
                                    <td>
                                        <form action="{{ url('/inventories/'.$inventory->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-primary ni ni-settings-gear-65" href="{{ url('/inventories/'.$inventory->id.'/edit') }}"></a>
                                            <button class="btn btn-sm btn-danger ni ni-fat-delete" type="submit" onclick="return confirm('¿Seguro que deseas eliminar de tu corazon? ');"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        {{$inventories->render()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
