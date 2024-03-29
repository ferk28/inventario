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
                            <div class="col text-right">
                                <a href="{{url('inventories')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                            <div>
                                <button name="product_create" class="btn btn-sm btn-success">Nuevo</button>
                            </div>
                        </div>
                    </div>
                    <form method="POST">
                        @csrf
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">Buscar</h5>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="input-group input-group-lg input-group-flush">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" name="id">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button"><span class="fas fa-search"></span> Buscar</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- List group -->
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect2">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card-body">
                        <form action="{{ url('inventories') }}" method="POST">
                            @csrf
                            <div class="form-group1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombre de la marca<span class="text-muted">(Obligatorio)</span></label>
                                            <input name="brand" type="text" class="form-control @if($errors->has('brand')) border-danger @endif" placeholder="LG, Apple, Alcatel, ASUS, Acer, DELL, HP etc... " value="{{old('brand')}}" autofocus>
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
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label class="form-control-label" for="basic-url">Serial</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1">{{-- {{$inventories->serial == 0 ? 'checked' : ''}} --}}
                                                <label class="custom-control-label" for="customCheck1">Producto serializado</label>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-control-label">Cantidad</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control @if($errors->has('')) border-danger @endif" placeholder="Cantidad" value="{{old('')}}">
                                            <span class="text-danger"><small>{{ $errors->first('')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End Table-->


                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label class="form-control-label">Unidad<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="text" name="unity" class="form-control @if($errors->has('unity')) border-danger @endif" placeholder="Pieza,Caja, etc" value="{{old('unity')}}">
                                            <span class="text-danger"><small>{{ $errors->first('unity')}}</small></span>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-control-label">Color</label>
                                            <input type="text" name="color" class="form-control @if($errors->has('color')) border-danger @endif" placeholder="Color" value="{{old('color')}}">
                                            <span class="text-danger"><small>{{ $errors->first('color')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label class="form-control-label">Precio<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="number" name="value" class="form-control @if($errors->has('value')) border-danger @endif" placeholder="00.00" value="{{old('value')}}">
                                            <span class="text-danger"><small>{{ $errors->first('value')}}</small></span>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-control-label">Características<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="text" name="feature" class="form-control @if($errors->has('feature')) border-danger @endif" placeholder="RAM, Disco duro, Procesador... " value="{{old('feature')}}">
                                            <span class="text-danger"><small>{{ $errors->first('feature')}}</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-sm">
                                            <label class="form-control-label">Modelo<span class="text-muted">(Obligatorio)</span></label>
                                            <input type="text" name="model" class="form-control @if($errors->has('model')) border-danger @endif" placeholder="Modelo del producto" value="{{old('model')}}">
                                            <span class="text-danger"><small>{{ $errors->first('model')}}</small></span>
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-control-label">Medida</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Metros</span>
                                                    </div>
                                                    <input type="text" name="size" class="form-control @if($errors->has('size')) border-danger @endif" placeholder="Medida del producto" value="{{old('size')}}">
                                                    <span class="text-danger"><small>{{ $errors->first('size')}}</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group1">
                                <label class="form-control-label">Descripción</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Escríbe aquí tu descripción del artículo..."></textarea>
                                <span class="text-danger"><small>{{ $errors->first('description')}}</small></span>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
@section('scripts')
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />--}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $("#product_title").change(function(){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/productdetails') }}",
                method: 'get',
                data: {
                    id: jQuery('#product_title').val()
                },
                success: function(result){
                    jQuery('#product_price').html(result.product_price);
                    jQuery('#product_quantity').html(result.product_quantity);

                }});

        });
    });
</script>
    <script>
        $("button").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/search/",
                data: {
                    id: $(this).val(), // < note use of 'this' here
                    access_token: $("#access_token").val()
                },
                success: function(result) {
                    alert('ok');
                },
                error: function(result) {
                    alert('error');
                }
            });
        });
    </script>
@endsection
