@extends('home')
@section('subtitle','Responsivas')
@section('dir','Responsivas')
@section('action','Editar')
@section('content')
    <div class="container-fluid mt--6">
        <!-- Page content -->
        <div class="row">
            <div class="col-xl-8 center">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Editar responsiva</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('safeguards')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('safeguards/'.$safeguard->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <label class="form-control-label" for="employee_id">Nombre del reponsable<span class="text-muted">(Obligatorio)</span></label>
                            <div class="form-group">
                                <select class="form-control @if($errors->has('employee_id')) border-danger @endif" name="employee_id" id="employee_id">
                                    @foreach($employees as $employee)
                                        <option value="{{$employee['id']}}">{{$employee['name']}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"><small>{{ $errors->first('employee_id')}}</small></span>
                            </div>

                            <label class="form-control-label" for="inventory_id">Detalles del producto<span class="text-muted">(Obligatorio)</span></label>
                            <div class="form-group">
                                <select class="form-control @if($errors->has('inventory_id')) border-danger @endif" name="inventory_id" id="inventory_id">
                                    @foreach($inventories as $inventory)
                                        <option value="{{$inventory['id']}}">Tipo: {{$inventory['type']}} \ Serial: {{$inventory['serial']}} \ Modelo: {{$inventory['model']}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"><small>{{ $errors->first('inventory_id')}}</small></span>
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
