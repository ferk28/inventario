@extends('home')
@section('subtitle','Inventario')
@section('dir','Inventario')
@section('action','Serie')




@section('content')
    <div class="container-fluid mt--6">
{{--         Page content --}}
    <div class="row">
        <div class="col-xl-8 center">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">

                        <div class="col">
                            <h3 class="mb-0">Series</h3>
                        </div>

                        <div class="col text-right">
                            <a href="" class="btn btn-sm btn-success">Añadir espacio</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Ver</th>
                            <th scope="col">ID</th>
                            <th scope="col">Serie</th>

                        </tr>
                        </thead>
                        <tbody>
                        @for($i=0; $i<5; $i++)
                        <tr>
                            <th scope="row">
                                <input type="text">
                            </th>
                            <td>

                            </td>
                            <td>
                                <button class="btn btn-default btn-move">
                                    <span class="fa fa-reorder"></span>
                                </button>
                            </td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
{{--                    {{$inventories->render()}}--}}
                </div>
            </div>
        </div>
    </div>
        <!-- Footer -->
        @include('home.footer')
    </div>
@endsection
