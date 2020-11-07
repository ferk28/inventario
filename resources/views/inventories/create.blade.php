@extends('home')
@section('subtitle','Inventario')
@section('dir','Inventario')
@section('action','Nuevo')
@section('content')
    <div class="container-fluid mt--6">
        <!-- Page content -->
        <div class="row">
            <div class="col-xl-8 center">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Crear nuevo producto</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('inventories')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('inventories') }}" method="POST">
                            @csrf
                            <div class="form-group1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="brand" autofocus>Nombre de la marca<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="text" class="form-control" placeholder="Marca del producto" @if($errors->has('name')) border-danger @endif value="{{old('name')}}" autofocus>
                                            <span class="text-danger"><small>{{ $errors->first('brand')}}</small></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group1">
                                            <label class="form-control-label" for="input-email">Tipo<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="email" id="input-email" class="form-control" placeholder="Computadora, laptop, celular etc.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="name">Serial<span class="text-muted">(Obligatorio)</span></label>
                                <input name="name" class="form-control @if($errors->has('name')) border-danger @endif" placeholder="S/N - Serial" type="text" value="{{old('name')}}">
                                <span class="text-danger"><small>{{ $errors->first('name')}}</small></span>
                            </div>
                            <div class="form-group1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Modelo</label>
                                            <input type="text" id="input-username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group1">
                                            <label class="form-control-label" for="input-email">Color</label>
                                            <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Precio</label>
                                            <input type="text" id="input-username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group1">
                                            <label class="form-control-label" for="input-email">Características</label>
                                            <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Descripción</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escríbe aquí tu descripción del artículo..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
