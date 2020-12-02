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
                                            <label class="form-control-label">Nombre de la marca<span class="text-muted">(Obligatorio)</span></label>
                                            <input name="brand" type="text" class="form-control @if($errors->has('brand')) border-danger @endif" placeholder="LG, Apple, Alcatel, ASUS, Acer, DElL, HP etc... " value="{{old('brand')}}" autofocus>
                                            <span class="text-danger"><small>{{ $errors->first('brand')}}</small></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group1">
                                            <label class="form-control-label">Tipo<span class="text-muted">(Obligatorio)</span></label>
                                            <input name="type" type="text" class="form-control @if($errors->has('type')) border-danger @endif" placeholder="Computadora, laptop, celular etc..." value="{{old('type')}}">
                                            <span class="text-danger"><small>{{ $errors->first('type')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Start Table-->
{{--                            <div class="form-group">
                                <label class="form-control-label">Serial</label>
                                <input name="serial" type="text"  class="form-control @if($errors->has('serial')) border-danger @endif" placeholder="S/N - Serial" value="{{old('serial')}}">
                                <span class="text-danger"><small>{{ $errors->first('serial')}}</small></span>
                            </div>--}}

                            <div class="input-group mb-3" id="row">
                                <input type="text" class="form-control" placeholder="Serial del producto" aria-label="Recipient's username" name="addmore[0][serial]">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary ni ni-fat-add" type="button" name="add" id="add"></button>
                                </div>
                            </div>

                            <!--End Table-->

                            <div class="form-group1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Modelo<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="text" name="model" class="form-control @if($errors->has('model')) border-danger @endif" placeholder="Modelo del producto" value="{{old('model')}}">
                                            <span class="text-danger"><small>{{ $errors->first('model')}}</small></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group1">
                                            <label class="form-control-label">Color</label>
                                            <input type="text" name="color" class="form-control @if($errors->has('color')) border-danger @endif" placeholder="Color" value="{{old('color')}}">
                                            <span class="text-danger"><small>{{ $errors->first('color')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Precio<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="number" name="value" class="form-control @if($errors->has('value')) border-danger @endif" placeholder="00.00" value="{{old('value')}}">
                                            <span clasas="text-danger"><small>{{ $errors->first('value')}}</small></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group1">
                                            <label class="form-control-label">Características<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="text" name="feature" class="form-control @if($errors->has('feature')) border-danger @endif" placeholder="RAM, Disco duro, Procesador... " value="{{old('feature')}}">
                                            <span class="text-danger"><small>{{ $errors->first('feature')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Descripción</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Escríbe aquí tu descripción del artículo..."></textarea>
                                <span class="text-danger"><small>{{ $errors->first('description')}}</small></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

            var i = 0;

            $("#add").click(function(){

                ++i;

                $("#dynamicTable").append('<div class="input-group mb-3" id="row"><input type="text" class="form-control" placeholder="Serial del producto" aria-label="Recipient\'s username" name="addmore[0][serial]"><div class="input-group-append"><button class="btn btn-outline-primary ni ni-fat-delete remove-tr" type="button"></button></div></div>');

            });
            $(document).on('click', '.remove-tr', function(){

                $(this).parents('tr').remove();
            });
        </script>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
