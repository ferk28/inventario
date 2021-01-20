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

                            <form class="navbar-search navbar-search-light form-inline mr-sm-3" name="search_prod" id="search_prod">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="{{Lang::get('main.search')}}" type="text" name="search" id="search">
                                    </div>
                                    <div id="search_list"></div>
                                </div>
                                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </form>

                            <div class="col text-right">
                                <a href="{{url('inventories')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                            <div>
                                <button name="product_create" class="btn btn-sm btn-success">Nuevo</button>
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
        <!-- Script -->
        <script type="text/javascript">
            // jQuery wait till the page is fullt loaded
            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#search').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"{{ route('autocomplete') }}",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'country':query},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#search_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#search').val(value);
                    // after click is done, search results segment is made empty
                    $('#search_list').html("");
                });
            });
        </script>
        <script src="{!! asset('//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') !!}"></script>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
