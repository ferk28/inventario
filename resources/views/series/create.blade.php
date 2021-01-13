@extends('home')
@section('subtitle','Inventario')
@section('dir','Inventario')
@section('action','Serie')
@section('content')
    <div class="container-fluid mt--6">
        <!-- Page content -->

        <div class="row">
            <div class="col-xl-8 center">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">ID: {{$inventories->id}} / Modelo: {{$inventories->model}} </h3>
                                <h3 class="mb-3">Marca: {{$inventories->brand}} / Tipo: {{$inventories->type}}</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('inventories')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('series') }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="form-control-label">Ingrese las serie(s)</label>
                                    <input type="text" placeholder="Ingresar serial" class="form-control" name="serie"  id="serie" value="">
                                    <span class="text-danger"><small>{{ $errors->has('series') ?  $errors->first('series') : '' }}</small>  </span>
                                </div>
                                <div class="col-md-2" style="margin-top:40px;">
                                    <button type="button" id="addMore" class="btn btn-sm btn-primary">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- Projects table -->
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="1">Name</th>
                                                <th scope="col">Serie</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addRow" class="addRow">
                                        @for($i=0; $i<$seriesCount; ++$i)
                                            <tr class="delete_add_more_item" id="delete_add_more_item">
                                                <td>
                                                    <input type="text" class="form-control" name="serie[]" value="" placeholder="Serie">
                                                </td>

                                                <td>
                                                    <button class="removeaddmore btn btn-danger btn-sm">
                                                        <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
                                                    </button>
                                                </td>

                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success">Crear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

        <script id="document-template" type="text/x-handlebars-template">
            <tr class="delete_add_more_item" id="delete_add_more_item">
                <td>
                    <input type="text" class="form-control" name="serie[]" value="@{{ serie }}" placeholder="Serie">
                </td>
                <td>
                    <button class="removeaddmore btn btn-danger btn-sm">
                        <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
                    </button>
                </td>
            </tr>
        </script>
        <script type="text/javascript">

            $(document).on('click','#addMore',function(){

                $('.table').show();

                var serie = $("#serie").val();
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);

                var data = {
                    serie: serie
                }

                var html = template(data);
                $("#addRow").append(html)

            });

            $(document).on('click','.removeaddmore',function(event){
                $(this).closest('.delete_add_more_item').remove();
            });

        </script>



        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
